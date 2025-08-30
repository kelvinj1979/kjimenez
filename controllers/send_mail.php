<?php

header('Content-Type: application/json');

// Verifica si el archivo existe antes de incluirlo
if (!file_exists('email.controller.php')) {
    echo json_encode(['status' => 'error', 'message' => 'File "email.controller.php" not found.']);
    exit;
}

// Incluye el archivo que contiene la clase ControllerEmail
require_once '../controllers/email.controller.php';

// Verifica que la clase exista
if (!class_exists('ControllerEmail')) {
    echo json_encode(['status' => 'error', 'message' => 'Class "ControllerEmail" not found.']);
    exit;
}

// Llama al método de la clase
$response = ControllerEmail::ctrSendEmail();

if ($response === "ok") {
    echo json_encode(['status' => 'success', 'message' => 'Email sent successfully.']);
} elseif (strpos($response, 'error:') !== false) {
    echo json_encode(['status' => 'error', 'message' => $response]);
} elseif ($response === "error.sintaxis") {
    echo json_encode(['status' => 'error', 'message' => 'Invalid characters in the message.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Unexpected error occurred.']);
}