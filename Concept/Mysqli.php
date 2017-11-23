<?php
/**
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/5
 * Time: 21:42
 */
#d$mysqli = mysqli_connect("localhost", "root", "", "test");
$mysqli =new mysqli("localhost", "root", "", "test");
#$result = $mysqli->query("select * from stu");
#$result = $result->fetch_row();
#var_dump($result);
$stmt = mysqli_prepare($mysqli, "insert into stu (name,age,gender)VALUES (?,?,?)");
#id需要设置为auto_increment alter table stu modify id int(10)   auto_increment;

mysqli_stmt_bind_param($stmt, "sss", $name, $age, $gender);
$name = 123;
$age = 12;
$gender = 1;
mysqli_stmt_execute($stmt);
