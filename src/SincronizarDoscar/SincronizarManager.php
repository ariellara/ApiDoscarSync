<?php
/* * Clase SincronizarManager
 * Maneja la lógica de negocio para la sincronización de datos.
 * Autor: Ariel Lara 
 * Fecha: 2025-09-19
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'SincronizarRepository.php';
require_once __DIR__ . '/../comunes/Respuesta.php';
require_once __DIR__ . '/../log/LoggerEvento.php';
require_once __DIR__ . '/../../conexion/conexion.php';
require_once 'NormalizarDatos.php';


class SincronizarManager
{
    private $repositorio;
    private LoggerEvento $logger;
    private mysqli $conexion;
    private NormalizarDatos $normalizador;

    public function __construct(mysqli $conexion)
    {
        $this->repositorio = new SincronizarRepository();
        $this->logger = new LoggerEvento($conexion);
        $this->conexion = $conexion;
        $this->normalizador = new NormalizarDatos();
    }

    public function guardarDatos($data): Respuesta
    {
        $respuesta = new Respuesta();
        try {
            $datos = json_decode($data, true);
            $guardarArticulos = $this->guardarArticulos($datos["articulos"]);
            $guardarArticulosCompuestos = $this->guardarArticulosCompuestos($datos["articulosCompuestos"]);
            $guardarCajas = $this->guardarCajas($datos["cajas"]);
            $guardarCamareros = $this->guardarCamareros($datos["camareros"]);
            $guardarClientes = $this->guardarClientes($datos["clientes"]);
            $guardarDatosEmpresa = $this->guardarDatosEmpresa($datos["datosEmpresa"]);
            $guardarFamilias = $this->guardarFamilias($datos["familias"]);
            $guardarFormasPago = $this->guardarFormasPago($datos["formasPago"]);
            $guargarlogControlModificaciones = $this->guardarLogControlModificaciones($datos["logControlModificaciones"]);
            $guardarProveedores = $this->guardarProveedores($datos["proveedores"]);
            $guardarTiposImpuestos = $this->guardarTiposImpuestos($datos["tiposDeImpuestos"]);
            $guardarGastos = $this->guardarGastos($datos["gastos"]);
            $guardarCabeceraFacturasVenta = $this->guardarCabeceraFacturasVenta($datos["cabeceraFacturaVenta"]);
            $guardarCabeceraTicketsVenta = $this->guardarCabeceraTicketsVenta($datos["cabeceraTicketsVenta"]);
            $guardarHistoricocierreCajas = $this->guardarHistoricoCierreCajas($datos["historicoCierresCaja"]);
            $guardarLineasFacturasVenta = $this->guardarLineasFacturasVenta($datos["lineasFacturaVenta"]);
            $guardarLineasTicketsVenta = $this->guardarLineasTicketsVenta($datos["lineasTicketsVenta"]);
            $guardarLogOperaciones = $this->guardarLogOperaciones($datos["logOperaciones"]);
            $guardarLogUsuarios = $this->guardarLogUsuarios($datos["logUsuarios"]);
            $guardarMezas = $this->guardarMesas($datos["mesas"]);




            $respuesta->setSuccess(true);
            $respuesta->setMensaje("Proceso de sincronizacion terminado correctamente.");
            $this->logger->guardar("Guardar Datos", "SincronizarManager", "SYSTEM");
        } catch (Exception $e) {
            $this->conexion->rollback();
            $respuesta->setSuccess(false);
            $respuesta->setMensaje("Error al guardar los datos: " . $e->getMessage());
            $this->logger->guardar("Error al Guardar Datos: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
        }
        return $respuesta;
    }
    private function guardarMesas($mesas)
    {
        foreach ($mesas as $mesa) {
            try {
                $mesaNormalizada = $this->normalizador->normalizarMesas($mesa);
                $this->repositorio->guardarMesas([$mesaNormalizada]);
            } catch (Exception $e) {
                $codigo = $mesa['Codigo'] ?? 'N/A';
                $nombre = $mesa['Nombre'] ?? 'N/A';
                $this->logger->guardar("Error al guardar mesa [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Mesas guardadas correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }
    private function guardarLogUsuarios($log)
    {
        foreach ($log as $entrada) {
            try {
                $normalizar = $this->normalizador->normalizarLogUsuarios($entrada);
                $this->repositorio->guardarLogUsuarios([$normalizar]);
            } catch (Exception $e) {
                $this->logger->guardar("Error al guardar log de usuarios: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Log de usuarios guardado correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }
    private function guardarLogOperaciones($log)
    {
        foreach ($log as $entrada) {
            try {
                $normalizar = $this->normalizador->normalizarLogOperacion($entrada);
                $this->repositorio->guardarLogOperaciones([$normalizar]);
            } catch (Exception $e) {
                $this->logger->guardar("Error al guardar log de operaciones: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Log de operaciones guardado correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }

    private function guardarLineasTicketsVenta($lineas)
    {
        foreach ($lineas as $linea) {
            try {
                $lineaNormalizada = $this->normalizador->normalizarLineaTicketVenta($linea);
                $this->repositorio->guardarLineasTicketsVenta([$lineaNormalizada]);
            } catch (Exception $e) {
                $codigo = $linea['Numero'] ?? 'N/A';
                $nombre = $linea['Descripcion'] ?? 'N/A';
                $this->logger->guardar("Error al guardar línea de ticket de venta [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Líneas de tickets de venta guardadas correctamente.", "SincronizarManager", "SYSTEM");
        return true;

    }
    private function guardarLineasFacturasVenta($lineas)
    {
        foreach ($lineas as $linea) {
            try {
                $lineaNormalizada = $this->normalizador->normalizarLineasFacturaVenta($linea);
                $this->repositorio->guardarLineasFacturasVenta([$lineaNormalizada]);
            } catch (Exception $e) {
                $codigo = $linea['Numero'] ?? 'N/A';
                $nombre = $linea['Descripcion'] ?? 'N/A';
                $this->logger->guardar("Error al guardar línea de factura de venta [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Líneas de facturas de venta guardadas correctamente.", "SincronizarManager", "SYSTEM");
        return true;

    }
    private function guardarHistoricoCierreCajas($cierres)
    {
        foreach ($cierres as $cierre) {
            try {
                $cierreNormalizado = $this->normalizador->normalizarHistoricoCierresCaja($cierre);
                $this->repositorio->guardarHistoricoCierreCajas([$cierreNormalizado]);
            } catch (Exception $e) {
                $codigo = $cierre['Numero'] ?? 'N/A';
                $nombre = $cierre['Caja'] ?? 'N/A';
                $this->logger->guardar("Error al guardar histórico de cierre de caja [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Históricos de cierre de cajas guardados correctamente.", "SincronizarManager", "SYSTEM");
        return true;

    }
    private function guardarCabeceraTicketsVenta($cabeceras)
    {
        foreach ($cabeceras as $cabecera) {
            try {
                $cabeceraNormalizada = $this->normalizador->normalizarCabeceraTicketsVenta($cabecera);
                $this->repositorio->guardarCabeceraTicketsVenta([$cabeceraNormalizada]);
            } catch (Exception $e) {
                $codigo = $cabecera['Numero'] ?? 'N/A';
                $nombre = $cabecera['Cliente'] ?? 'N/A';
                $this->logger->guardar("Error al guardar cabecera de ticket de venta [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Cabeceras de tickets de venta guardadas correctamente.", "SincronizarManager", "SYSTEM");
        return true;

    }
    private function guardarCabeceraFacturasVenta($cabeceras)
    {
        foreach ($cabeceras as $cabecera) {
            try {
                $cabeceraNormalizada = $this->normalizador->normalizarCabeceraFacturaVenta($cabecera);
                $this->repositorio->guardarCabeceraFacturasVenta([$cabeceraNormalizada]);
            } catch (Exception $e) {
                $codigo = $cabecera['numero'] ?? 'N/A';
                $nombre = $cabecera['razon_social'] ?? 'N/A';
                $this->logger->guardar("Error al guardar cabecera de factura de venta [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Cabeceras de facturas de venta guardadas correctamente.", "SincronizarManager", "SYSTEM");
        return true;

    }

    private function guardarGastos($gastos)
    {
        foreach ($gastos as $gasto) {
            try {
                $gastoNormalizado = $this->normalizador->normalizarGasto($gasto);
                $this->repositorio->guardarGastos([$gastoNormalizado]);
            } catch (Exception $e) {
                $codigo = $gasto['numero_gasto'] ?? 'N/A';
                $nombre = $gasto['casusante'] ?? 'N/A';
                $this->logger->guardar("Error al guardar gasto [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Gastos guardados correctamente.", "SincronizarManager", "SYSTEM");
        return true;

    }
    private function guardarTiposImpuestos($tiposImpuestos)
    {
        foreach ($tiposImpuestos as $tipoImpuesto) {
            try {
                $tipoImpuestoNormalizado = $this->normalizador->normalizarTipoImpuesto($tipoImpuesto);
                $this->repositorio->guardarTiposImpuestos([$tipoImpuestoNormalizado]);
            } catch (Exception $e) {
                $codigo = $tipoImpuesto['codigo'] ?? 'N/A';
                $nombre = $tipoImpuesto['nombre'] ?? 'N/A';
                $this->logger->guardar("Error al guardar tipo de impuesto [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Tipos de impuestos guardados correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }

    private function guardarProveedores($proveedores)
    {
        foreach ($proveedores as $proveedor) {
            try {
                $proveedorNormalizado = $this->normalizador->normalizarProveedor($proveedor);
                $this->repositorio->guardarProveedores([$proveedorNormalizado]);
            } catch (Exception $e) {
                $codigo = $proveedor['codigo'] ?? 'N/A';
                $nombre = $proveedor['razon_social'] ?? 'N/A';
                $this->logger->guardar("Error al guardar proveedor [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Proveedores guardados correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }
    private function guardarLogControlModificaciones($log)
    {
        foreach ($log as $entrada) {
            try {
                $normalizar = $this->normalizador->normalizarLogControl($entrada);
                $this->repositorio->guardarLogControlModificaciones($normalizar);
            } catch (Exception $e) {
                $this->logger->guardar("Error al guardar log de control de modificaciones: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Log de control de modificaciones guardado correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }

    private function guardarFormasPago($formasPago)
    {
        foreach ($formasPago as $formaPago) {
            try {
                $formaPagoNormalizada = $this->normalizador->normalizarFormaPago($formaPago);
                $this->repositorio->guardarFormasPago([$formaPagoNormalizada]);
            } catch (Exception $e) {
                $codigo = $formaPago['codigo'] ?? 'N/A';
                $nombre = $formaPago['nombre'] ?? 'N/A';
                $this->logger->guardar("Error al guardar forma de pago [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Formas de pago guardadas correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }

    private function guardarFamilias($familias)
    {
        foreach ($familias as $familia) {
            try {
                $familiaNormalizada = $this->normalizador->normalizarFamilia($familia);
                $this->repositorio->guardarFamilias([$familiaNormalizada]);
            } catch (Exception $e) {
                $codigo = $familia['codigo'] ?? 'N/A';
                $nombre = $familia['nombre'] ?? 'N/A';
                $this->logger->guardar("Error al guardar familia [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Familias guardadas correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }
    private function guardarDatosEmpresa($datosEmpresa)
    {
        try {
            $datosEmpresaNormalizados = $this->normalizador->normalizarDatosEmpresa($datosEmpresa[0]);
            $this->repositorio->guardarDatosEmpresa([$datosEmpresaNormalizados]);
        } catch (Exception $e) {
            $this->logger->guardar("Error al guardar datos de la empresa: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
        }
        $this->logger->guardar("Datos de la empresa guardados correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }
    private function guardarClientes($clientes)
    {
        foreach ($clientes as $cliente) {
            try {
                $clienteNormalizado = $this->normalizador->normalizarCliente($cliente);
                $this->repositorio->guardarClientes([$clienteNormalizado]);
            } catch (Exception $e) {
                $codigo = $cliente['codigo'] ?? 'N/A';
                $nombre = $cliente['razon_social'] ?? 'N/A';
                $this->logger->guardar("Error al guardar cliente [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Clientes guardados correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }


    private function guardarCamareros($camareros)
    {
        foreach ($camareros as $camarero) {
            try {
                $camareroNormalizado = $this->normalizador->normalizarCamarero($camarero);
                $this->repositorio->guardarCamareros([$camareroNormalizado]);
            } catch (Exception $e) {
                $codigo = $camarero['codigo'] ?? 'N/A';
                $nombre = $camarero['nombre'] ?? 'N/A';
                $this->logger->guardar("Error al guardar camarero [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Camareros guardados correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }
    private function guardarCajas($cajas)
    {
        foreach ($cajas as $caja) {
            try {
                $cajaNormalizada = $this->normalizador->normalizarCaja($caja);
                $this->repositorio->guardarCajas([$cajaNormalizada]);
            } catch (Exception $e) {
                $codigo = $caja['codigo'] ?? 'N/A';
                $nombre = $caja['nombre'] ?? 'N/A';
                $this->logger->guardar("Error al guardar caja [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Cajas guardadas correctamente.", "SincronizarManager", "SYSTEM");
        return true;
    }

    private function guardarArticulos($articulos): bool
    {
        foreach ($articulos as $articulo) {

            try {
                $articuloNormalizado = $this->normalizador->normalizarArticulo($articulo);
                $this->repositorio->guardarArticulos([$articuloNormalizado]);

            } catch (Exception $e) {
                $codigo = $articulo['referencia'] ?? 'N/A';
                $nombre = $articulo['descripcion'] ?? 'N/A';
                $this->logger->guardar("Error al guardar artículo [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Artículos guardados correctamente.", "SincronizarManager", "SYSTEM");
        return true;

    }
    private function guardarArticulosCompuestos($articulosCompuestos): bool
    {
        foreach ($articulosCompuestos as $articuloCompuesto) {
            try {
                $this->repositorio->guardarArticulosCompuestos([$articuloCompuesto]);
            } catch (Exception $e) {
                $codigo = $articuloCompuesto['Referencia'] ?? 'N/A';
                $nombre = $articuloCompuesto['Descripcion'] ?? 'N/A';
                $this->logger->guardar("Error al guardar artículo compuesto [{$codigo} - {$nombre}]: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
            }
        }
        $this->logger->guardar("Artículos compuestos guardados correctamente.", "SincronizarManager", "SYSTEM");
        return true;

    }

    public function consultarApiKey(): Respuesta
    {
        $respuesta = new Respuesta();
        try {
            $apiKey = $this->repositorio->consultarApiKey();
            if ($apiKey) {
                $respuesta->setSuccess(true);
                $respuesta->setMensaje("API Key consultada correctamente.");
                $respuesta->setDatos($apiKey);
            } else {
                $respuesta->setSuccess(false);
                $respuesta->setMensaje("No se encontró la API Key.");
            }
        } catch (Exception $e) {
            $respuesta->setSuccess(false);
            $respuesta->setMensaje("Error al consultar la API Key: " . $e->getMessage());
            $this->logger->guardar("Error al consultar la API Key: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
        }
        return $respuesta;

    }





}
