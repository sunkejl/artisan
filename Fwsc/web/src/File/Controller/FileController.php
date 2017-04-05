<?php
/**
 * 去composer里注册
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/23
 * Time: 18:01
 */
namespace File\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FileController
{
    public function indexAction(Request $request)
    {
        $response = new Response();
        if ($request->getMethod() == "POST") {
            $uploadDir = __DIR__."/../../../storage/upload/";

//          enctype="multipart/form-data" 的时候 php://input 是无效的。
            $input = file_get_contents("php://input");
            var_dump($input);

            $in = fopen("php://input", "rb");
            var_dump(feof($in));
            while (!feof($in)) {
                echo fread($in, 128);
            }


            var_dump($_FILES);
            if (!isset($_FILES['file'])) {
                throw  new \Exception("no file", 101);
            }
            $file = $_FILES['file'];
            switch ($file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    throw  new \Exception(UPLOAD_ERR_INI_SIZE, 1);
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    throw new \Exception(UPLOAD_ERR_FORM_SIZE, 2);
                    break;
                default:
                    break;
            }
            if (!in_array($file['type'], ["image/png"])) {
                throw new \Exception("not png", 102);
            }
            $tarDir = $uploadDir.time().$file['name'];
            move_uploaded_file($file['tmp_name'], $uploadDir.time().$file['name']);
            echo $tarDir;

        }
        $html = include __DIR__."/../View/file.php";
        $response->setContent($html);

        return $response;
    }

    public function fileOpenAction()
    {
        $fp = fopen(__DIR__."/demo.md", 'r');
        $line = "";
        while (!feof($fp)) {
            $line .= fgetc($fp);
        }
        echo $line;

//        linux 所有的IO都是文件
//        PHP   所有的IO都是流
//        popen 和 proc_open 都能和进程交互
        $fp = popen("ls -l /", "r");
        while (!feof($fp)) {
            echo fgetc($fp);
        }
        pclose($fp);

        $fin = fopen(__DIR__."/readFrom", "r");
        $fout = fopen(__DIR__."/writeTo", "w");
        $desc = [$fin, $fout];
//      PHP执行readFrom 输出写入writeTo
        $res = proc_open("php", $desc, $popes);
        if ($res) {
            proc_close($res);
        }


        exit;
    }

    public function fileLockAction()
    {
        $time = time();
        $newFile = __DIR__."/".$time;
        fopen($newFile, 'w+');#w 不存在就创建文件
        rename($newFile,$newFile."md");#移动 重命名文件
        var_dump(unlink($newFile."md"));# 删除文件
        exit;

        $fp=tmpfile();#创建临时文件
        fwrite($fp,"temp data");
        fclose($fp); #自动关闭
        exit;

//        命令行才有用
//        for($i = 0; $i <= 25; $i += 1){
//            echo $i;
//            flush();
//            sleep(1);
//        }
        ob_start();
        $fp = fopen(__DIR__."/file", "a+");
        var_dump(flock($fp, LOCK_EX));
        echo "排它锁<hr>";
        ob_flush();
        ob_start();
        $time = date("Y-m-d h:i:s");
        fputs($fp, $time, FILE_APPEND);
        sleep(3);
        flock($fp, LOCK_UN);
        fclose($fp);
        echo "释放完毕";
        exit;
    }

}