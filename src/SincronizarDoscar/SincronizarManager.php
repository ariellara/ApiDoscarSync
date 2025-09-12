<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'SincronizarRepository.php';
require_once __DIR__ . '/../comunes/Respuesta.php';
require_once __DIR__ . '/../log/LoggerEvento.php';
require_once __DIR__ . '/../../conexion/conexion.php';


class SincronizarManager
{
    private $repositorio;
    private LoggerEvento $logger;
    private mysqli $conexion;
  
    public function __construct(mysqli $conexion)
    {
        $this->repositorio = new SincronizarRepository();
        $this->logger = new LoggerEvento($conexion);
        $this->conexion = $conexion; 
    }

    public function guardarDatos(): Respuesta
    {
        $respuesta = new Respuesta();
        try {
           

            // Aquí iría la lógica para guardar los datos en la base de datos
            // Por ejemplo:
            // $this->repositorio->guardarDatos($datos);

          
            $respuesta->setSuccess(true);
            $respuesta->setMensaje("Datos guardados correctamente.");
            $this->logger->guardar("Guardar Datos", "SincronizarManager", "SYSTEM");
        } catch (Exception $e) {
            $this->conexion->rollback();
            $respuesta->setSuccess(false);
            $respuesta->setMensaje("Error al guardar los datos: " . $e->getMessage());
            $this->logger->guardar("Error al Guardar Datos: " . $e->getMessage(), "SincronizarManager", "SYSTEM");
        }
        return $respuesta;
    }

   
 
}
