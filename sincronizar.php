<?php
/*
 * Autor: Ariel Lara
 * Fecha: 2025-09-07
 * Descripción: Controlador para manejar las solicitudes de sincronización de datos.
 */
require_once __DIR__ . '/src/comunes/Respuesta.php';
require_once __DIR__ . '/conexion/conexion.php';
require_once __DIR__ . '/src/SincronizarDoscar/SincronizarManager.php';

class ControladorSincronizacion
{
    private $conexion;
    private $cargarDoscarManager;
    private $respuesta;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
        $this->cargarDoscarManager = new SincronizarManager($conexion);
        $this->respuesta = new Respuesta();
    }

    public function procesarRequest()
    {
        header('Content-Type: application/json; charset=UTF-8');
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: DENY');
        header('X-XSS-Protection: 1; mode=block');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(["success" => false, "mensaje" => "Método no permitido"]);
            exit;
        }
        $headers = getallheaders();
        $apiKey = $headers['X-API-KEY'] ?? $headers['X-Api-Key'] ?? null;
        $ApiKeyBase = $this->cargarDoscarManager->consultarApiKey();

        if ($apiKey !== $ApiKeyBase->getDatos()) {
            http_response_code(401);
            echo json_encode(["success" => false, "mensaje" => "Acceso no autorizado"]);
            exit;
        }

        $raw_data = file_get_contents("php://input");
        $data = json_decode($raw_data, true);
        usleep(500000); 

        if (is_array($data)) {
            http_response_code(400);
            echo json_encode(["success" => false, "mensaje" => "JSON inválido"]);
            exit;
        }

        try {
            $this->procesarOperacion($data);
        } catch (Exception $e) {
            $this->respuesta->setSuccess(false);
            $this->respuesta->setMensaje("Error en el servidor: " . $e->getMessage());
        }

        echo $this->respuesta->toJson();
    }

    private function procesarOperacion($data)
    {
        $respuestaGuardarDoscar = $this->cargarDoscarManager->guardarDatos($data);
        
        if ($respuestaGuardarDoscar->getSuccess()) {
            $this->respuesta->setSuccess(true);
            $this->respuesta->setMensaje("Sincronización completada exitosamente.");
        } else {
            $this->respuesta->setSuccess(false);
            $this->respuesta->setMensaje("Error durante la sincronización: " . $this->respuesta->getMensaje());

        }
    }
}

$controlador = new ControladorSincronizacion($conexion);
$controlador->procesarRequest();
