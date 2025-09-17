<?php

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
        return true;

    }





}
