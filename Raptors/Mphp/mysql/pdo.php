<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 15:08
 */
$pdo = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', '');
$statement = $pdo->query("SELECT * FROM tb1");
$row = $statement->fetch(PDO::FETCH_ASSOC);
var_dump($row);


$stmt = $pdo->prepare('SELECT * FROM tb1 WHERE id = :id');
$id = filter_input(INPUT_GET, 'id',
    FILTER_SANITIZE_NUMBER_INT); // <-- filter your data first (see [Data Filtering](#data_filtering)), especially important for INSERT, UPDATE, etc.
$stmt->bindParam(':id', $id, PDO::PARAM_INT); // <-- Automatically sanitized for SQL by PDO
$stmt->execute();
$stmt = null;//关闭连接