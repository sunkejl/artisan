<?php
/**
 * 去composer里注册
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/23
 * Time: 18:01
 */
namespace Mysqli\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MysqliController
{
    public function indexAction(Request $request)
    {
        $connect = mysqli_connect("localhost", "root", "", "test");
        if (!$connect) {
            die("connect mysql failed".mysqli_connect_error());
        }else{
            printf(mysqli_get_client_info($connect));
        }
        $result=$connect->query("SELECT * FROM `stu`");
        //获取数据行三种方式
        //mysqli_fetch_row
        //mysqli_fetch_assoc
        //mysqli_fetch_object
        while($row=$result->fetch_row()){
            $arr[]=$row;
        }
        var_dump($arr);

//        预处理 绑定输入变量
//                type sii
//        i	corresponding variable has type integer
//        d	corresponding variable has type double
//        s	corresponding variable has type string
//        b	corresponding variable is a blob and will be sent in packets
        $stmt=$connect->prepare("INSERT INTO `stu` (`name`,`age`,`gender`) VALUES (?,?,?)");
        $stmt->bind_param('sii',$name,$age,$gender);
        $name="abc";
        $age=rand(0,20);
        $gender=rand(0,1);
        $stmt->execute();

        $name="efg";
        $age=rand(0,20);
        $gender=rand(0,1);
        $stmt->execute();

//        预处理 绑定输入变量





        //预处理 绑定输出变量
        $response = new Response();

        return $response;
    }

}