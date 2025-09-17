<?php

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
            "Altramuces" => "altramuces"
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



}