<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type"); 

$host = 'localhost';
$db = 'hospital_triage';
$user = 'postgres';
$pass = 'utku'; 
$dsn = "pgsql:host=$host;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $id = $_POST['id'];
    $status = $_POST['status'];
    
    $stmt = $pdo->prepare('UPDATE patients SET status = :status WHERE id = :id');
    $stmt->execute(['status' => $status, 'id' => $id]);
    
    echo json_encode(['message' => 'Patient status updated successfully']);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
