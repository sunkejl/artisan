<?php
    namespace Sunken\Help;

    /**
     * Created by PhpStorm.
     * User: hc
     * Date: 16/4/27
     * Time: 下午10:01
     */

    class Help
    {

        /**
         * Help constructor.
         */
        public function __construct()
        {

        }

        /**
         * @return int
         */
        public static function test()
        {

            return 123;
        }


        /**
         * @param $url
         * @param bool $encode
         * @return mixed
         */
        public static function useCurl($url, $encode = false)
        {
            $header = [
                "Content-Type:application/x-www-form-urlencoded",
                "X-Forwarded-For:255.255.255.255",
            ];
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
            curl_setopt($ch, CURLOPT_USERAGENT,
                "Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4");
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);

            return $result;
        }

        /**
         * @param $url
         * @param $post_data
         * @return mixed
         */
        public static function useCurlPost($url, $post_data)
        {
            $header = [
                "Content-Type:application/x-www-form-urlencoded",
                "X-Forwarded-For:255.255.255.255",
            ];
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
            curl_setopt($ch, CURLOPT_POST, 4);//post提交方式
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($ch, CURLOPT_USERAGENT, "M");
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);

            return $result;
        }


        /**
         * @param $url
         * @param $auth
         * @return mixed
         */
        public static function useCurlPut($url, $auth)
        {       //$auth为一段字符串
            $header = [
                "Content-Type:application/x-www-form-urlencoded",
                "X-Forwarded-For:255.255.255.255",
                "Authorization: base {$auth}"
            ];
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_USERAGENT, "M");
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 1);
            $result = curl_exec($ch);
            curl_close($ch);

            return $result;
        }

        /**
         * @return string
         */
        public static function getIp()
        {
            if ( ! empty($_SERVER[ "HTTP_CLIENT_IP" ]) && preg_match('/\d+.\d+.\d+.\d+/',
                    $_SERVER[ "HTTP_CLIENT_IP" ])
            ) {
                return $_SERVER[ "HTTP_CLIENT_IP" ];
            } else {
                if ( ! empty($_SERVER[ "HTTP_X_FORWARDED_FOR" ]) && preg_match('/\d+.\d+.\d+.\d+/',
                        $_SERVER[ "HTTP_X_FORWARDED_FOR" ])
                ) {
                    return $_SERVER[ "HTTP_X_FORWARDED_FOR" ];
                } else {
                    if ( ! empty($_SERVER[ "REMOTE_ADDR" ]) && preg_match('/\d+.\d+.\d+.\d+/',
                            $_SERVER[ "REMOTE_ADDR" ])
                    ) {
                        return $_SERVER[ "REMOTE_ADDR" ];
                    } else {
                        return "255.255.255.255";
                    }
                }
            }
        }

        /**
         * @return string
         */
        public static function getUrl()
        {
            return "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        }

        /**
         * @return mixed
         */
        public static function getUA()
        {
            return $_SERVER[ 'HTTP_USER_AGENT' ];
        }

        /**
         * @return bool
         */
        public static function xdebug()
        {
            echo xdebug_time_index();
            var_dump(xdebug_memory_usage());
            var_dump(xdebug_peak_memory_usage());

            return true;
        }

    }
