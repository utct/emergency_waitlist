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

    if (isset($_POST['name']) && isset($_POST['code'])) {
        $name = $_POST['name'];
        $code = $_POST['code'];
        $severity = rand(1, 3); 

        if (!empty($name) && !empty($code)) {
            $stmt = $pdo->prepare('INSERT INTO patients (name, code, severity) VALUES (:name, :code, :severity)');
            $stmt->execute(['name' => $name, 'code' => $code, 'severity' => $severity]);
            
            echo json_encode(['message' => 'Patient added successfully', 'severity' => $severity]);
        } else {
            echo json_encode(['error' => 'Missing required fields']);
        }
    } else {
        echo json_encode(['error' => 'Invalid input']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
