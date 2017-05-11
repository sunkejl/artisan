<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 18:01
 */
require "settings.php";
try {
    $pdo = new PDO(
        sprintf(
            'mysql:host=%s;dbname=%s;port=%s;charset=%s',
            $settings['host'],
            $settings['name'],
            $settings['port'],
            $settings['charset']
        ),
        $settings['username'],
        $settings['password']
    );
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

echo "success";
$id = 3;
$sql = 'SELECT * FROM tb1 WHERE `name` = :id';
$id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id, PDO::PARAM_INT);
$statement->execute();
//$row = $statement->fetch(PDO::FETCH_ASSOC);
#$statement->debugDumpParams();
var_dump( $statement->fetch(PDO::FETCH_ASSOC));
var_dump( $statement->fetch(PDO::FETCH_ASSOC));
