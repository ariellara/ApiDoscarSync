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

  



}
