<?php
include __DIR__ . "/../../conexion/conexion.php";


class SincronizarRepository
{
    private $conexion;

    public function __construct()
    {
        global $conexion;
        $this->conexion = $conexion;
    }
    public function guardarArticulos(array $articulos): bool
    {
        // Como siempre recibís un solo artículo dentro de un array
        $articulo = $articulos[0];

        $columnas = array_keys($articulo);
        $placeholders = implode(",", array_fill(0, count($columnas), "?"));
        $updates = implode(",", array_map(fn($col) => "$col=VALUES($col)", $columnas));

        $sql = "INSERT INTO articulos (" . implode(",", $columnas) . ")
            VALUES ($placeholders)
            ON DUPLICATE KEY UPDATE $updates";

        $stmt = $this->conexion->prepare($sql);

        $tipos = "";
        $valores = [];
        foreach ($articulo as $valor) {
            if (is_int($valor)) {
                $tipos .= "i";
            } elseif (is_float($valor) || is_double($valor)) {
                $tipos .= "d";
            } else {
                $tipos .= "s";
            }
            $valores[] = $valor;
        }

        $stmt->bind_param($tipos, ...$valores);
        $stmt->execute();
        $stmt->close();

        $this->conexion->commit();
        return true;
    }

    public function guardarArticulosCompuestos(array $articulosCompuesto): bool
    {
        $articuloCompuesto = $articulosCompuesto[0];

        $columnas = array_keys($articuloCompuesto);
        $placeholders = implode(",", array_fill(0, count($columnas), "?"));
        $updates = implode(",", array_map(fn($col) => "$col=VALUES($col)", $columnas));

        $sql = "INSERT INTO articulos_compuestos (" . implode(",", $columnas) . ")
            VALUES ($placeholders)
            ON DUPLICATE KEY UPDATE $updates";

        $stmt = $this->conexion->prepare($sql);

        $tipos = "";
        $valores = [];
        foreach ($articuloCompuesto as $valor) {
            if (is_int($valor)) {
                $tipos .= "i";
            } elseif (is_float($valor) || is_double($valor)) {
                $tipos .= "d";
            } else {
                $tipos .= "s";
            }
            $valores[] = $valor;
        }

        $stmt->bind_param($tipos, ...$valores);
        $stmt->execute();
        $stmt->close();

        $this->conexion->commit();
        return true;
    }
    public function guardarCajas(array $cajas): bool
    {
        $caja = $cajas[0];

        $columnas = array_keys($caja);
        $placeholders = implode(",", array_fill(0, count($columnas), "?"));
        $updates = implode(",", array_map(fn($col) => "$col=VALUES($col)", $columnas));

        $sql = "INSERT INTO cajas (" . implode(",", $columnas) . ")
            VALUES ($placeholders)
            ON DUPLICATE KEY UPDATE $updates";

        $stmt = $this->conexion->prepare($sql);

        $tipos = "";
        $valores = [];
        foreach ($caja as $valor) {
            if (is_int($valor)) {
                $tipos .= "i";
            } elseif (is_float($valor) || is_double($valor)) {
                $tipos .= "d";
            } else {
                $tipos .= "s";
            }
            $valores[] = $valor;
        }

        $stmt->bind_param($tipos, ...$valores);
        $stmt->execute();
        $stmt->close();

        $this->conexion->commit();
        return true;
    }

    public function guardarCamareros($camarero)
    {
        $camarero = $camarero[0];

        $columnas = array_keys($camarero);
        $placeholders = implode(",", array_fill(0, count($columnas), "?"));
        $updates = implode(",", array_map(fn($col) => "$col=VALUES($col)", $columnas));

        $sql = "INSERT INTO camareros (" . implode(",", $columnas) . ")
            VALUES ($placeholders)
            ON DUPLICATE KEY UPDATE $updates";

        $stmt = $this->conexion->prepare($sql);

        $tipos = "";
        $valores = [];
        foreach ($camarero as $valor) {
            if (is_int($valor)) {
                $tipos .= "i";
            } elseif (is_float($valor) || is_double($valor)) {
                $tipos .= "d";
            } else {
                $tipos .= "s";
            }
            $valores[] = $valor;
        }

        $stmt->bind_param($tipos, ...$valores);
        $stmt->execute();
        $stmt->close();

        $this->conexion->commit();
        return true;
    }

    public function guardarClientes($clientes)
    {
        $cliente = $clientes[0];

        $columnas = array_keys($cliente);
        $placeholders = implode(",", array_fill(0, count($columnas), "?"));
        $updates = implode(",", array_map(fn($col) => "$col=VALUES($col)", $columnas));

        $sql = "INSERT INTO clientes (" . implode(",", $columnas) . ")
            VALUES ($placeholders)
            ON DUPLICATE KEY UPDATE $updates";

        $stmt = $this->conexion->prepare($sql);

        $tipos = "";
        $valores = [];
        foreach ($cliente as $valor) {
            if (is_int($valor)) {
                $tipos .= "i";
            } elseif (is_float($valor) || is_double($valor)) {
                $tipos .= "d";
            } else {
                $tipos .= "s";
            }
            $valores[] = $valor;
        }

        $stmt->bind_param($tipos, ...$valores);
        $stmt->execute();
        $stmt->close();

        $this->conexion->commit();
        return true;
    }

    public function guardarDatosEmpresa(array $datosEmpresa): bool
    {
        $datoEmpresa = $datosEmpresa[0];

        $columnas = array_keys($datoEmpresa);
        $placeholders = implode(",", array_fill(0, count($columnas), "?"));
        $updates = implode(",", array_map(fn($col) => "$col=VALUES($col)", $columnas));

        $sql = "INSERT INTO datos_empresa (" . implode(",", $columnas) . ")
            VALUES ($placeholders)
            ON DUPLICATE KEY UPDATE $updates";

        $stmt = $this->conexion->prepare($sql);

        $tipos = "";
        $valores = [];
        foreach ($datoEmpresa as $valor) {
            if (is_int($valor)) {
                $tipos .= "i";
            } elseif (is_float($valor) || is_double($valor)) {
                $tipos .= "d";
            } else {
                $tipos .= "s";
            }
            $valores[] = $valor;
        }

        $stmt->bind_param($tipos, ...$valores);
        $stmt->execute();
        $stmt->close();

        $this->conexion->commit();
        return true;
    }
    public function guardarFamilias($familia)
    {
        $familia = $familia[0];

        $columnas = array_keys($familia);
        $placeholders = implode(",", array_fill(0, count($columnas), "?"));
        $updates = implode(",", array_map(fn($col) => "$col=VALUES($col)", $columnas));

        $sql = "INSERT INTO familias (" . implode(",", $columnas) . ")
            VALUES ($placeholders)
            ON DUPLICATE KEY UPDATE $updates";

        $stmt = $this->conexion->prepare($sql);
        $tipos = "";
        $valores = [];
        foreach ($familia as $valor) {
            if (is_int($valor)) {
                $tipos .= "i";
            } elseif (is_float($valor) || is_double($valor)) {
                $tipos .= "d";
            } else {
                $tipos .= "s";
            }
            $valores[] = $valor;
        }

        $stmt->bind_param($tipos, ...$valores);
        $stmt->execute();
        $stmt->close();

        $this->conexion->commit();
        return true;
    }
    public function guardarFormasPago($formaPago)
    {
        $formaPago = $formaPago[0];

        $columnas = array_keys($formaPago);
        $placeholders = implode(",", array_fill(0, count($columnas), "?"));
        $updates = implode(",", array_map(fn($col) => "$col=VALUES($col)", $columnas));

        $sql = "INSERT INTO formas_de_pago (" . implode(",", $columnas) . ")
            VALUES ($placeholders)
            ON DUPLICATE KEY UPDATE $updates";

        $stmt = $this->conexion->prepare($sql);

        $tipos = "";
        $valores = [];
        foreach ($formaPago as $valor) {
            if (is_int($valor)) {
                $tipos .= "i";
            } elseif (is_float($valor) || is_double($valor)) {
                $tipos .= "d";
            } else {
                $tipos .= "s";
            }
            $valores[] = $valor;
        }

        $stmt->bind_param($tipos, ...$valores);
        $stmt->execute();
        $stmt->close();

        $this->conexion->commit();
        return true;
    }









}
