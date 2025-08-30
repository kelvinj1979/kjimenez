<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Enviar los datos como JSON
header('Content-Type: application/json');

require_once "../controllers/portfolio.controller.php";
require_once "../models/portfolio.model.php";

$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$count = isset($_GET['count']) ? intval($_GET['count']) : 10;

// Obtener proyectos desde el controlador
$projects = ControllerPortfolio::ctrShowProject($start, $count);

// Formatear los datos para enviarlos como JSON
$datos = [];
foreach ($projects as $value) {
    $info = json_decode($value["project_info"], true);
    $proyecto = [
        "id" => $value["project_id"],
        "title" => $value["project_name"],
        "description" => $value["overview"],
        "image" => $value["project_img"],
        "tags" => json_decode($value["tags"], true) ?? [],
        "technologies" => json_decode($value["technologies"], true) ?? [],
        "liveUrl" => $value["live_demo"],
        "githubUrl" => $value["view_code"],
        "completedDate" => $info[0]["completedDate"] ?? "",
        "teamSize" => $info[0]["teamSize"] ?? "",
        "status" => $info[0]["status"] ?? "",
        "features" => json_decode($value["key_features"], true) ?? [],
        "challenge" => $value["challenges_solutions"]
    ];
    $datos[] = $proyecto;
}


echo json_encode($datos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); 

//header('Content-Type: application/json');

// Simula datos para probar
/* $projects = [
    [
        "id" => 1,
        "title" => "Project 1",
        "description" => "Description of project 1",
        "image" => "path/to/image1.jpg",
        "tags" => ["web", "design"],
        "technologies" => ["HTML", "CSS", "JavaScript"],
        "liveUrl" => "https://example.com",
        "githubUrl" => "https://github.com/example",
    ],
];

echo json_encode($projects); */