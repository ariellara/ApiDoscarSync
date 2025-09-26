<?php
/* * Normalizar datos de entrada para que coincidan con las columnas de la base de datos.
 * Autor: Ariel Lara
 * Fecha: 2025-09-19
 */

class NormalizarDatos
{
    public function normalizarCliente(array $cliente): array
    {

        $mapa = [
            "Codigo" => "codigo",
            "Razon Social" => "razon_social",
            "Titular" => "titular",
            "Domicilio" => "domicilio",
            "Codigo Postal" => "codigo_postal",
            "Poblacion" => "poblacion",
            "Provincia" => "provincia",
            "Pais" => "pais",
            "Telefono 1" => "telefono_1",
            "Telefono 2" => "telefono_2",
            "Fax" => "fax",
            "E-Mail" => "email",
            "NIF" => "nif",
            "Web" => "web",
            "Zona" => "zona",
            "Persona Contacto" => "persona_contacto",
            "Telefono Contacto" => "telefono_contacto",
            "Representante" => "representante",
            "Archivo Imagen" => "archivo_imagen",
            "Observaciones" => "observaciones",
            "Tarifa" => "tarifa",
            "Tabla Descuento" => "tabla_descuento",
            "Descuento PP" => "descuento_pp",
            "Impuestos" => "impuestos",
            "Copias" => "copias",
            "Forma de Pago" => "forma_de_pago",
            "Dia Pago 1" => "dia_pago_1",
            "Dia Pago 2" => "dia_pago_2",
            "Banco" => "banco",
            "Domicilio Banco" => "domicilio_banco",
            "Codigo Postal Banco" => "codigo_postal_banco",
            "Poblacion Banco" => "poblacion_banco",
            "Provincia Banco" => "provincia_banco",
            "Pais Banco" => "pais_banco",
            "Entidad" => "entidad",
            "Sucursal" => "sucursal",
            "DC" => "dc",
            "Cuenta" => "cuenta",
            "Portes" => "portes",
            "Domicilio Envio" => "domicilio_envio",
            "Codigo Postal Envio" => "codigo_postal_envio",
            "Poblacion Envio" => "poblacion_envio",
            "Provincia Envio" => "provincia_envio",
            "Pais Envio" => "pais_envio",
            "Antiguedad" => "antiguedad",
            "Riesgo" => "riesgo",
            "Aviso" => "aviso",
            "Propina" => "propina",
            "Publicidad" => "publicidad",
            "IBAN" => "iban",
            "BIC" => "bic",
            "FechaFirma" => "fecha_firma",
            "evento1Nombre" => "evento1_nombre",
            "evento2Nombre" => "evento2_nombre",
            "evento3Nombre" => "evento3_nombre",
            "evento1Fecha" => "evento1_fecha",
            "evento2Fecha" => "evento2_fecha",
            "evento3Fecha" => "evento3_fecha",
            "tCredito" => "t_credito",
            "fidelizacion" => "fidelizacion"
        ];

        $normalizado = [];
        foreach ($cliente as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower(str_replace(" ", "_", $clave));
            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarCamarero(array $camarero): array
    {
        $mapa = [
            "Codigo" => "codigo",
            "Nombre" => "nombre",
            "Domicilio" => "domicilio",
            "Codigo Postal" => "codigo_postal",
            "Poblacion" => "poblacion",
            "Provincia" => "provincia",
            "Pais" => "pais",
            "Telefono 1" => "telefono_1",
            "Telefono 2" => "telefono_2",
            "Fax" => "fax",
            "E-Mail" => "email",
            "NIF" => "nif",
            "Afiliacion" => "afiliacion",
            "Precio Hora" => "precio_hora",
            "Registro" => "registro",
            "Antiguedad" => "antiguedad",
            "Banco" => "banco",
            "Domicilio Banco" => "domicilio_banco",
            "Codigo Postal Banco" => "codigo_postal_banco",
            "Poblacion Banco" => "poblacion_banco",
            "Provincia Banco" => "provincia_banco",
            "Pais Banco" => "pais_banco",
            "Entidad" => "entidad",
            "Sucursal" => "sucursal",
            "DC" => "dc",
            "Cuenta" => "cuenta",
            "Archivo Imagen" => "archivo_imagen",
            "Observaciones" => "observaciones",
            "No Mostrar en Tickets" => "no_mostrar_en_tickets",
            "Contra" => "contra",
            "IBAN" => "iban",
            "EliminarLinea" => "eliminar_linea",
            "CambiarDescripcion" => "cambiar_descripcion",
            "CambiarCantidad" => "cambiar_cantidad",
            "CambiarPrecio" => "cambiar_precio",
            "EliminarTicket" => "eliminar_ticket",
            "UsarNavegacion" => "usar_navegacion",
            "Abono" => "abono",
            "Destacado" => "destacado",
            "BlocTarifa" => "bloc_tarifa",
            "rediff" => "rediff",
            "BlocIngreso" => "bloc_ingreso",
            "BloquearAplazados" => "bloquear_aplazados",
            "BloqCajon" => "bloq_cajon"
        ];

        $normalizado = [];
        foreach ($camarero as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower(str_replace(" ", "_", $clave));
            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarCaja(array $caja): array
    {
        $mapa = [
            "Codigo" => "codigo",
            "Nombre" => "nombre",
            "Ubicacion" => "ubicacion",
            "Observaciones" => "observaciones",
            "Saldo Inicial" => "saldo_inicial",
        ];

        $normalizado = [];
        foreach ($caja as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower(str_replace(" ", "_", $clave));
            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }

    public function normalizarArticulo(array $articulo): array
    {
        $mapa = [
            "Referencia" => "referencia",
            "Descripcion" => "descripcion",
            "Familia" => "familia",
            "Tipo Impuesto" => "tipo_impuesto",
            "Proveedor 1" => "proveedor_1",
            "Proveedor 2" => "proveedor_2",
            "Proveedor 3" => "proveedor_3",
            "Descripcion Corta" => "descripcion_corta",
            "No Actualizar Stock" => "no_actualizar_stock",
            "Ubicacion" => "ubicacion",
            "Stock" => "stock",
            "Stock Minimo" => "stock_minimo",
            "Stock Maximo" => "stock_maximo",
            "Stock Optimo" => "stock_optimo",
            "Minimo Vender" => "minimo_vender",
            "Minimo Comprar" => "minimo_comprar",
            "Referencia Proveedor" => "referencia_proveedor",
            "No Avisar Stock" => "no_avisar_stock",
            "PVP 1" => "pvp_1",
            "PVP 2" => "pvp_2",
            "PVP 3" => "pvp_3",
            "PVP 4" => "pvp_4",
            "PVP 5" => "pvp_5",
            "PVP 6" => "pvp_6",
            "PVP 7" => "pvp_7",
            "PVP 8" => "pvp_8",
            "PVP 9" => "pvp_9",
            "Observaciones" => "observaciones",
            "Archivo Imagen" => "archivo_imagen",
            "Oferta" => "oferta",
            "Medida" => "medida",
            "Unidad Medida" => "unidad_medida",
            "Peso" => "peso",
            "Tabla Descuento" => "tabla_descuento",
            "Fecha Alta" => "fecha_alta",
            "Fecha Caducidad" => "fecha_caducidad",
            "Dias Garantia" => "dias_garantia",
            "Unidades Bulto" => "unidades_bulto",
            "Precio Medio Compra" => "precio_medio_compra",
            "Ultimo Precio Compra" => "ultimo_precio_compra",
            "Beneficio PVP 1" => "beneficio_pvp_1",
            "Beneficio PVP 2" => "beneficio_pvp_2",
            "Beneficio PVP 3" => "beneficio_pvp_3",
            "Beneficio PVP 4" => "beneficio_pvp_4",
            "Beneficio PVP 5" => "beneficio_pvp_5",
            "Beneficio PVP 6" => "beneficio_pvp_6",
            "Beneficio PVP 7" => "beneficio_pvp_7",
            "Beneficio PVP 8" => "beneficio_pvp_8",
            "Beneficio PVP 9" => "beneficio_pvp_9",
            "Compuesto" => "compuesto",
            "Preguntar Precio" => "preguntar_precio",
            "No Segunda Impresora" => "no_segunda_impresora",
            "Referencia Proveedor 2" => "referencia_proveedor_2",
            "Referencia Proveedor 3" => "referencia_proveedor_3",
            "Precio Compra Proveedor" => "precio_compra_proveedor",
            "Precio Compra Proveedor 2" => "precio_compra_proveedor_2",
            "Precio Compra Proveedor 3" => "precio_compra_proveedor_3",
            "Descripcion Centrada" => "descripcion_centrada",
            "Subrayado" => "subrayado",
            "Cursiva" => "cursiva",
            "Negrita" => "negrita",
            "Tamaño" => "tamano",
            "Fuente" => "fuente",
            "Color Texto" => "color_texto",
            "Color Fondo" => "color_fondo",
            "Articulo Bascula" => "articulo_bascula",
            "impresora" => "impresora",
            "Orden" => "orden",
            "ventaLocal" => "venta_local",
            "subidaweb" => "subida_web",
            "modificadoWeb" => "modificado_web",
            "descripcionWeb" => "descripcion_web",
            "descripcionCortaWeb" => "descripcion_corta_web",
            "noImpFinal" => "no_imp_final",
            "gluten" => "gluten",
            "Pescado" => "pescado",
            "Huevos" => "huevos",
            "Frutos" => "frutos",
            "Cacahuetes" => "cacahuetes",
            "Soja" => "soja",
            "Sesamo" => "sesamo",
            "Lacteos" => "lacteos",
            "Apio" => "apio",
            "Crustaceos" => "crustaceos",
            "Mostaza" => "mostaza",
            "Moluscos" => "moluscos",
            "Azufre" => "azufre",
            "Altramuces" => "altramuces",
            "TipoDocumento" => "tipodocumento",
            "PaisAlfa2" => "paisalfa2",
            "tipoExcenta" => "tipoexenta"
        ];

        $normalizado = [];
        foreach ($articulo as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower($clave);
            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarDatosEmpresa(array $datosEmpresa): array
    {
        $mapa = [
            "Codigo" => "codigo",
            "Nombre" => "nombre",
            "Razon Social" => "razon_social",
            "Año" => "anio",
            "Actividad" => "actividad",
            "Domicilio" => "domicilio",
            "Codigo Postal" => "codigo_postal",
            "Poblacion" => "poblacion",
            "Provincia" => "provincia",
            "Pais" => "pais",
            "Telefono 1" => "telefono_1",
            "Telefono 2" => "telefono_2",
            "Fax" => "fax",
            "E-Mail" => "email",
            "NIF" => "nif",
            "Web" => "web",
            "Afiliacion" => "afiliacion",
            "Registro Mercantil" => "registro_mercantil",
            "Observaciones" => "observaciones",
            "Dual" => "dual_flag",
            "Decimales Pesetas" => "decimales_pesetas",
            "Decimales Euros" => "decimales_euros",
            "Decimales Cantidades" => "decimales_cantidades",
            "Decimales Descuento" => "decimales_descuento",
            "Avisar Riesgo" => "avisar_riesgo",
            "Actualizar PVP" => "actualizar_pvp",
            "Archivo Imagen" => "archivo_imagen",
            "Caja Recibos" => "caja_recibos",
            "Caja Pagos" => "caja_pagos",
            "Estado" => "estado",
            "Cliente Nulo" => "cliente_nulo",
            "Cliente Tickets" => "cliente_tickets",
            "Moneda Principal" => "moneda_principal",
            "Cliente Tarjeta" => "cliente_tarjeta",
            "Contraseña" => "contrasena",
            "Carpeta Imagenes" => "carpeta_imagenes",
            "Licencia" => "licencia",
            "Importe minimo Fac Simpl" => "importe_minimo_fac_simpl",
            "Importe minimo Fac" => "importe_minimo_fac",
            "NombreF" => "nombref",
            "1apellido" => "primer_apellido",
            "2apellido" => "segundo_apellido"
        ];

        $normalizado = [];
        foreach ($datosEmpresa as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower(str_replace(" ", "_", $clave));
            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarFamilia(array $familia): array
    {
        $mapa = [
            "Codigo" => "codigo",
            "Nombre" => "nombre",
            "Observaciones" => "observaciones",
            "No Mostrar en Tickets" => "no_mostrar_en_tickets",
            "Combinados" => "combinados",
            "Archivo Imagen" => "archivo_imagen",
            "Sumar Importes" => "sumar_importes",
            "Descripcion Centrada" => "descripcion_centrada",
            "Subrayado" => "subrayado",
            "Cursiva" => "cursiva",
            "Negrita" => "negrita",
            "Tamaño" => "tamano",
            "Fuente" => "fuente",
            "Color Texto" => "color_texto",
            "Color Fondo" => "color_fondo",
            "Orden" => "orden"
        ];

        $normalizado = [];
        foreach ($familia as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower(str_replace(" ", "_", $clave));
            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarFormaPago(array $formaPago): array
    {
        $mapa = [
            "Codigo" => "codigo",
            "Numero Pagos" => "numero_pagos",
            "Nombre" => "nombre",
            "Dias Pago 1" => "dias_pago_1",
            "Porcentaje Pago 1" => "porcentaje_pago_1",
            "Dias Pago 2" => "dias_pago_2",
            "Porcentaje Pago 2" => "porcentaje_pago_2",
            "Dias Pago 3" => "dias_pago_3",
            "Porcentaje Pago 3" => "porcentaje_pago_3",
            "Dias Pago 4" => "dias_pago_4",
            "Porcentaje Pago 4" => "porcentaje_pago_4",
            "Dias Pago 5" => "dias_pago_5",
            "Porcentaje Pago 5" => "porcentaje_pago_5",
            "Dias Pago 6" => "dias_pago_6",
            "Porcentaje Pago 6" => "porcentaje_pago_6",
            "Dias Pago 7" => "dias_pago_7",
            "Porcentaje Pago 7" => "porcentaje_pago_7",
            "Dias Pago 8" => "dias_pago_8",
            "Porcentaje Pago 8" => "porcentaje_pago_8",
            "Dias Pago 9" => "dias_pago_9",
            "Porcentaje Pago 9" => "porcentaje_pago_9",
            "Dias Pago 10" => "dias_pago_10",
            "Porcentaje Pago 10" => "porcentaje_pago_10",
            "Dias Pago 11" => "dias_pago_11",
            "Porcentaje Pago 11" => "porcentaje_pago_11",
            "Dias Pago 12" => "dias_pago_12",
            "Porcentaje Pago 12" => "porcentaje_pago_12",
            "Mostrar en TPV" => "mostrar_en_tpv"
        ];

        $normalizado = [];
        foreach ($formaPago as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower(str_replace(" ", "_", $clave));
            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarLogControl(array $log): array
    {
        $mapa = [
            "ID" => "ID",
            "Usuario" => "Usuario",
            "Fecha" => "Fecha",
            "Evento" => "Evento",
            "accion" => "accion",
            "Observaciones" => "Observaciones"
        ];

        $normalizado = [];
        foreach ($log as $clave => $valor) {
            $columna = $mapa[$clave] ?? $clave;
            $normalizado[$columna] = $valor;
        }
        unset($normalizado["ID"]);
        return $normalizado;
    }
    public function normalizarProveedor(array $proveedor): array
    {
        $mapa = [
            "Codigo" => "codigo",
            "Razon Social" => "razon_social",
            "Tipo Proveedor" => "tipo_proveedor",
            "Titular" => "titular",
            "Domicilio" => "domicilio",
            "Codigo Postal" => "codigo_postal",
            "Poblacion" => "poblacion",
            "Provincia" => "provincia",
            "Pais" => "pais",
            "Telefono 1" => "telefono1",
            "Telefono 2" => "telefono2",
            "Fax" => "fax",
            "E-Mail" => "email",
            "NIF" => "nif",
            "Web" => "web",
            "Codigo Cliente" => "codigo_cliente",
            "Persona Contacto" => "persona_contacto",
            "Telefono Contacto" => "telefono_contacto",
            "Archivo Imagen" => "archivo_imagen",
            "Observaciones" => "observaciones",
            "Tabla Descuento" => "tabla_descuento",
            "Descuento PP" => "descuento_pp",
            "Impuestos" => "impuestos",
            "Forma de Pago" => "forma_pago",
            "Dia Pago 1" => "dia_pago_1",
            "Dia Pago 2" => "dia_pago_2",
            "Banco" => "banco",
            "Domicilio Banco" => "domicilio_banco",
            "Codigo Postal Banco" => "codigo_postal_banco",
            "Poblacion Banco" => "poblacion_banco",
            "Provincia Banco" => "provincia_banco",
            "Pais Banco" => "pais_banco",
            "Entidad" => "entidad",
            "Sucursal" => "sucursal",
            "DC" => "dc",
            "Cuenta" => "cuenta",
            "Portes" => "portes",
            "Domicilio Envio" => "domicilio_envio",
            "Codigo Postal Envio" => "codigo_postal_envio",
            "Poblacion Envio" => "poblacion_envio",
            "Provincia Envio" => "provincia_envio",
            "Pais Envio" => "pais_envio",
            "Antiguedad" => "antiguedad",
            "Riesgo" => "riesgo",
            "Aviso" => "aviso",
            "IBAN" => "iban"
        ];

        $normalizado = [];
        foreach ($proveedor as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower(str_replace(" ", "_", $clave));
            $normalizado[$columna] = $valor;
        }
        return $normalizado;
    }
    public function normalizarTipoImpuesto(array $tipoImpuesto): array
    {
        $mapa = [
            "Codigo" => "codigo",
            "Nombre" => "nombre",
            "IVA" => "iva",
            "Recargo" => "recargo",
            "Observaciones" => "observaciones"
        ];

        $normalizado = [];
        foreach ($tipoImpuesto as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower(str_replace(" ", "_", $clave));
            if (is_string($valor) && is_numeric($valor)) {
                if (strpos($valor, ".") !== false) {
                    $valor = (float) $valor;
                } else {
                    $valor = (int) $valor;
                }
            }
            if ($valor === "null" || $valor === null) {
                $valor = null;
            }

            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }

    public function normalizarGasto(array $gasto): array
    {
        $mapa = [
            "Numero Gasto" => "numero_gasto",
            "Fecha" => "fecha",
            "Importe" => "importe",
            "Caja" => "caja",
            "Causante" => "causante",
            "Descripcion" => "descripcion",
            "Observaciones" => "observaciones",
            "Moneda" => "moneda",
            "Facturado" => "facturado",
            "Historico" => "historico",
        ];

        $normalizado = [];

        foreach ($gasto as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower(str_replace(" ", "_", $clave));
            switch ($columna) {
                case 'numero_gasto':
                case 'caja':
                case 'moneda':
                case 'facturado':
                case 'historico':
                    $valor = (int) $valor;
                    break;
                case 'importe':
                    $valor = (float) $valor;
                    break;
                case 'descripcion':
                case 'observaciones':
                case 'causante':
                    $valor = trim($valor) !== '' ? $valor : null;
                    break;
                case 'fecha':
                    $valor = $valor ?: null;
                    break;
            }

            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }

    public function normalizarCabeceraFacturaVenta(array $factura): array
    {
        $mapa = [
            "Numero" => "numero",
            "Fecha" => "fecha",
            "Cliente" => "cliente",
            "Observaciones" => "observaciones",
            "Representante" => "representante",
            "Comision" => "comision",
            "Aplicar Comision" => "aplicar_comision",
            "Forma de Pago" => "forma_pago",
            "Fecha Caducidad" => "fecha_caducidad",
            "Realizado por" => "realizado_por",
            "Facturado" => "facturado",
            "Documento" => "documento",
            "Razon Social" => "razon_social",
            "Domicilio" => "domicilio",
            "Codigo Postal" => "codigo_postal",
            "Poblacion" => "poblacion",
            "Provincia" => "provincia",
            "Pais" => "pais",
            "Telefono" => "telefono",
            "Notas" => "notas",
            "Transportista" => "transportista",
            "Tipo Portes" => "tipo_portes",
            "Descuento PP" => "descuento_pp",
            "Gastos" => "gastos",
            "Portes" => "portes",
            "Cierre Caja" => "cierre_caja",
            "Moneda" => "moneda",
            "ExpedienteFace" => "expediente_face",
            "OperacionFace" => "operacion_face",
            "EntidadPublica" => "entidad_publica",
            "OficinaContable" => "oficina_contable",
            "OrganoGestor" => "organo_gestor",
            "UnidadTramitadora" => "unidad_tramitadora",
            "Organoproponente" => "organo_proponente",
            "Subido" => "subido",
            "TBAI" => "tbai",
            "SerieFacturaAnterior" => "serie_factura_anterior",
            "NumFacturaAnterior" => "num_factura_anterior",
            "FechaExpedicionFacturaAnterior" => "fecha_expedicion_factura_anterior",
            "SignatureValueFirmaFacturaAnterior" => "signature_value_firma_factura_anterior",
            "QrLabel" => "qr_label",
            "QrContenido" => "qr_contenido",
            "SignatureValue" => "signature_value",
            "NumFacturaTBAI" => "num_factura_tbai",
            "SerieE" => "serie_e",
            "NumeroE" => "numero_e",
            "Emitida" => "emitida",
            "Rectificativa" => "rectificativa",
            "Anulada" => "anulada",
            "InversionSujetoPasivo" => "inversion_sujeto_pasivo",
            "estadoTBAI" => "estado_tbai",
            "PathestadoTBAI" => "path_estado_tbai",
            "faceActPeriod" => "face_act_period",
            "facePeriodIni" => "face_period_ini",
            "facePeriodFin" => "face_period_fin",
            "faceAdditionalInformation" => "face_additional_information",
            "tipoExenta" => "tipo_exenta",
            "IBANFace" => "iban_face"
        ];

        $normalizado = [];

        foreach ($factura as $clave => $valor) {

            $claveNormalizada = $clave;
            if (isset($mapa[$claveNormalizada])) {
                $columna = $mapa[$claveNormalizada];
            } else {
                $columna = strtolower(str_replace(" ", "_", $clave));
            }
            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }

    public function normalizarCabeceraTicketsVenta(array $datos): array
    {
        $mapa = [
            "Numero" => "numero",
            "Fecha" => "fecha",
            "Hora" => "hora",
            "Cliente" => "cliente",
            "Caja" => "caja",
            "Camarero" => "camarero",
            "Mesa" => "mesa",
            "Cuenta" => "cuenta",
            "Entrega" => "entrega",
            "Facturado" => "facturado",
            "Documento" => "documento",
            "Observaciones" => "observaciones",
            "Descuento PP" => "descuento_pp",
            "Moneda" => "moneda",
            "Aplazado" => "aplazado",
            "Forma de Pago" => "forma_de_pago",
            "Personas" => "personas",
            "Notas" => "notas",
            "Porcentaje Propina" => "porcentaje_propina",
            "Importe Propina" => "importe_propina",
            "FormaPago1" => "formapago1",
            "FormaPago2" => "formapago2",
            "FormaPago3" => "formapago3",
            "Entrega1" => "entrega1",
            "Entrega2" => "entrega2",
            "Entrega3" => "entrega3",
            "idEvento" => "idevento",
            "Historico" => "historico",
            "flag" => "flag",
            "subido" => "subido",
            "tbai" => "tbai",
            "SerieFacturaAnterior" => "serie_factura_anterior",
            "NumFacturaAnterior" => "num_factura_anterior",
            "FechaExpedicionFacturaAnterior" => "fecha_expedicion_factura_anterior",
            "SignatureValueFirmaFacturaAnterior" => "signature_value_firma_factura_anterior",
            "QrLabel" => "qr_label",
            "QrContenido" => "qr_contenido",
            "SignatureValue" => "signature_value",
            "NumFacturaTBAI" => "num_factura_tbai",
            "SerieE" => "serie_e",
            "NumeroE" => "numero_e",
            "Emitida" => "emitida",
            "Rectificativa" => "rectificativa",
            "estadoTBAI" => "estado_tbai",
            "PathestadoTBAI" => "path_estado_tbai",
            "tipoExenta" => "tipo_exenta"
        ];

        $normalizado = [];

        foreach ($datos as $clave => $valor) {
            $claveMapeada = str_replace([' ', '_'], '', strtolower($clave));
            $encontrado = false;

            foreach ($mapa as $key => $val) {
                $keyMapa = str_replace([' ', '_'], '', strtolower($key));
                if ($claveMapeada === $keyMapa) {
                    $normalizado[$val] = $valor;
                    $encontrado = true;
                    break;
                }
            }

            if (!$encontrado) {
                $normalizado[strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $clave))] = $valor;
            }
        }

        return $normalizado;
    }
    public function normalizarHistoricoCierresCaja(array $data): array
    {
        $mapa = [
            "Numero" => "numero",
            "Caja" => "caja",
            "Fecha" => "fecha",
            "Suma Tickets Efectivo" => "suma_tickets_efectivo",
            "Suma Tickets Tarjeta" => "suma_tickets_tarjeta",
            "Suma Recibos Clientes" => "suma_recibos_clientes",
            "Suma Ingresos" => "suma_ingresos",
            "Suma Pagos Proveed" => "suma_pagos_proveed",
            "Suma Pagos Repre" => "suma_pagos_repre",
            "Suma Pagos Camareros" => "suma_pagos_camareros",
            "Suma Gastos" => "suma_gastos",
            "Cobros N Venta" => "cobros_n_venta",
            "Pagos N Compra" => "pagos_n_compra",
            "Saldo Inicial Caja" => "saldo_inicial_caja",
            "Total" => "total",
            "Importe caja" => "importe_caja",
            "Camarero" => "camarero",
            "Ticket Inicial Efectivo" => "ticket_inicial_efectivo",
            "Ticket Final Efectivo" => "ticket_final_efectivo",
            "Ticket Inicial Tarjeta" => "ticket_inicial_tarjeta",
            "Ticket Final Tarjeta" => "ticket_final_tarjeta",
            "N Tickets Incluidos Efectivo" => "n_tickets_incluidos_efectivo",
            "N Tickets Incluidos Tarjeta" => "n_tickets_incluidos_tarjeta",
        ];

        $normalizado = [];

        foreach ($data as $clave => $valor) {
            if (isset($mapa[$clave])) {
                $columna = $mapa[$clave];
                $normalizado[$columna] = $valor;
            } else {
                $columna = strtolower(str_replace(' ', '_', $clave));
                $normalizado[$columna] = $valor;
            }
        }

        return $normalizado;
    }
    public function normalizarLineasFacturaVenta(array $linea): array
    {
        $mapa = [
            "Numero" => "numero",
            "Linea" => "linea",
            "Articulo" => "articulo",
            "Descripcion" => "descripcion",
            "Coste" => "coste",
            "Talla" => "talla",
            "Color" => "color",
            "Cantidad" => "cantidad",
            "Precio" => "precio",
            "Descuento" => "descuento",
            "IVA" => "iva",
            "RE" => "re"
        ];

        $normalizado = [];

        foreach ($linea as $clave => $valor) {
            if (isset($mapa[$clave])) {
                $columna = $mapa[$clave];
            } else {
                $columna = strtolower(str_replace(' ', '_', $clave));
            }

            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarLineaTicketVenta(array $linea): array
    {
        $mapa = [
            "Numero" => "numero",
            "Linea" => "linea",
            "Articulo" => "articulo",
            "Descripcion" => "descripcion",
            "Coste" => "coste",
            "Talla" => "talla",
            "Color" => "color",
            "Cantidad" => "cantidad",
            "Precio" => "precio",
            "Descuento" => "descuento",
            "IVA" => "iva",
            "RE" => "re",
            "Impreso2" => "impreso2",
            "CantidadImpresa2" => "cantidad_impresa2",
            "Detalle" => "detalle",
            "id_invitacion" => "id_invitacion"
        ];

        $normalizado = [];

        foreach ($linea as $clave => $valor) {
            if (isset($mapa[$clave])) {
                $columna = $mapa[$clave];
            } else {
                $columna = strtolower(str_replace(" ", "_", $clave));
            }

            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarLogOperacion(array $log): array
    {
        $mapa = [
            "Numero" => "numero",
            "fechaHora" => "fecha_hora",
            "Terminal" => "terminal",
            "uid" => "uid",
            "Dispositivo" => "dispositivo",
            "Camarero" => "camarero",
            "OperReg" => "oper_reg",
            "Evento" => "evento",
            "Operacion" => "operacion",
            "Descripcion" => "descripcion",
            "json" => "json"
        ];

        $normalizado = [];

        foreach ($log as $clave => $valor) {
            if (isset($mapa[$clave])) {
                $columna = $mapa[$clave];
            } else {
                $columna = strtolower(str_replace(" ", "_", $clave));
            }

            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarLogUsuarios(array $data): array
    {
        $mapa = [
            "Id" => "id",
            "Fecha" => "fecha",
            "Hora" => "hora",
            "Operacion" => "operacion",
            "Camarero" => "camarero",
            "Ticket" => "ticket",
            "Referencia" => "referencia",
            "Descripcion" => "descripcion",
            "Cantidad" => "cantidad",
            "PVP" => "pvp",
            "Modificado" => "modificado",
            "Total" => "total"
        ];

        $normalizado = [];

        foreach ($data as $clave => $valor) {
            $claveNormalizada = $clave;
            if (isset($mapa[$claveNormalizada])) {
                $columna = $mapa[$claveNormalizada];
            } else {
                $columna = strtolower(str_replace(' ', '_', $clave));
            }
            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarMesas(array $mesa): array
    {
        $mapa = [
            "Codigo" => "codigo",
            "Nombre" => "nombre",
            "Ubicacion" => "ubicacion",
            "Observaciones" => "observaciones",
            "Precios" => "precios",
            "Personas" => "personas",
            "Archivo Imagen" => "archivo_imagen",
            "Horizontal" => "horizontal",
            "Vertical" => "vertical",
            "Salon" => "salon",
            "Archivo Imagen Ocupado" => "archivo_imagen_ocupado",
            "alias" => "alias"
        ];

        $normalizado = [];

        foreach ($mesa as $clave => $valor) {
            if (isset($mapa[$clave])) {
                $columna = $mapa[$clave];
            } else {
                $columna = strtolower(str_replace(" ", "_", $clave));
            }
            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarPagoCamareros(array $pago): array
    {
        $mapa = [
            "Banco" => "banco",
            "Domicilio Banco" => "domicilio_banco",
            "Codigo Postal Banco" => "codigo_postal_banco",
            "Poblacion Banco" => "poblacion_banco",
            "Provincia Banco" => "provincia_banco",
            "Pais Banco" => "pais_banco",
            "Entidad" => "entidad",
            "Sucursal" => "sucursal",
            "DC" => "dc",
            "Cuenta" => "cuenta",
            "Observaciones" => "observaciones",
            "Moneda" => "moneda",
            "Facturado" => "facturado",
            "Historico" => "historico",
            "IBAN" => "iban"
        ];

        $normalizado = [];

        foreach ($pago as $clave => $valor) {
            if (isset($mapa[$clave])) {
                $columna = $mapa[$clave];
            } else {
                $columna = strtolower(str_replace(" ", "_", $clave));
            }
            if ($valor === "") {
                $valor = null;
            } elseif (is_numeric($valor)) {
                $valor = strpos($valor, '.') !== false ? (float) $valor : (int) $valor;
            }

            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarPagoProveedor(array $pago): array
    {
        $mapa = [
            "Banco" => "banco",
            "Domicilio Banco" => "domicilio_banco",
            "Codigo Postal Banco" => "codigo_postal_banco",
            "Poblacion Banco" => "poblacion_banco",
            "Provincia Banco" => "provincia_banco",
            "Pais Banco" => "pais_banco",
            "Entidad" => "entidad",
            "Sucursal" => "sucursal",
            "DC" => "dc",
            "Cuenta" => "cuenta",
            "Observaciones" => "observaciones",
            "Moneda" => "moneda",
            "Facturado" => "facturado",
            "Historico" => "historico",
            "IBAN" => "iban",
            "Numero Pago" => "numero_pago",
            "Importe" => "importe",
            "Proveedor" => "proveedor",
            "Caja" => "caja",
            "Lugar Libramiento" => "lugar_libramiento",
            "Factura" => "factura",
            "Orden" => "orden",
            "Fecha Libramiento" => "fecha_libramiento",
            "Vencimiento" => "vencimiento",
            "Estado" => "estado",
            "Descripcion" => "descripcion",
            "Clausulas" => "clausulas"
        ];

        $normalizado = [];

        foreach ($pago as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower(str_replace(" ", "_", $clave));
            if ($valor === "") {
                $valor = null;
            } elseif (is_numeric($valor)) {
                $valor = strpos($valor, '.') !== false ? (float) $valor : (int) $valor;
            }

            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }
    public function normalizarReciboCliente(array $recibo): array
    {
        $mapa = [
            "Numero Recibo" => "numero_recibo",
            "Importe" => "importe",
            "Cliente" => "cliente",
            "Caja" => "caja",
            "Lugar Libramiento" => "lugar_libramiento",
            "Factura" => "factura",
            "Orden" => "orden",
            "Fecha Libramiento" => "fecha_libramiento",
            "Vencimiento" => "vencimiento",
            "Estado" => "estado",
            "Descripcion" => "descripcion",
            "Clausulas" => "clausulas",
            "Banco" => "banco",
            "Domicilio Banco" => "domicilio_banco",
            "Codigo Postal Banco" => "codigo_postal_banco",
            "Poblacion Banco" => "poblacion_banco",
            "Provincia Banco" => "provincia_banco",
            "Pais Banco" => "pais_banco",
            "Entidad" => "entidad",
            "Sucursal" => "sucursal",
            "DC" => "dc",
            "Cuenta" => "cuenta",
            "Observaciones" => "observaciones",
            "Moneda" => "moneda",
            "Facturado" => "facturado",
            "Historico" => "historico",
            "IBAN" => "iban"
        ];

        $normalizado = [];

        foreach ($recibo as $clave => $valor) {
            $columna = $mapa[$clave] ?? strtolower(str_replace(" ", "_", $clave));

            if ($valor === "") {
                $valor = null;
            } elseif (is_numeric($valor)) {
                $valor = strpos($valor, '.') !== false ? (float) $valor : (int) $valor;
            }

            $normalizado[$columna] = $valor;
        }

        return $normalizado;
    }

















}