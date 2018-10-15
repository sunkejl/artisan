<?php
require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
use Symfony\Component\DomCrawler\Crawler;


$html = file_get_contents("http://www.bwlc.net/bulletin/prevslto.html");

$crawler = new Crawler($html);

$c = $crawler->filter('html > body > div > div')->eq(2)->filter("div > table > tr")->eq(1)->filter("td");
$id = $c->eq(0)->html();
$b = $c->eq(1)->html();
$r = $c->eq(2)->html();
$arr = compact("id", "b", "r");
$json = json_encode($arr);
$origin = <<<TEXT
03 09 15 22 24 33 01
03 09 15 23 24 33 16
03 09 15 23 24 33 02
03 08 10 23 24 33 08
01 03 15 25 26 33 05

03 06 18 21 26 27 12
04 06 09 15 18 23 07
02 04 18 28 29 32 04
01 05 08 18 19 32 06
04 05 07 23 25 32 03
TEXT;

$text = $json . "<br>" . $origin;
$h = new SinaMail();
$r = $h->send($text);
echo $r . PHP_EOL;
echo date("Y-m-d H:i:s", time()) . PHP_EOL;


class BreakMail
{
    function send($text)
    {
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.boqii.com', 25))
            ->setUsername('**@**.com')
            ->setPassword('***');

// Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
        // Create a message
        $message = (new Swift_Message('abc'))
            ->setFrom(['***@***.com'])
            ->setTo(['***@***.com'])
            ->setBody("abc $text;User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36");

// Send the message
        $result = $mailer->send($message);
        return $result;
    }
}

class SinaMail
{
    public function send($text)
    {
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.sina.cn', 25))
            ->setUsername('&&&@***.cn')
            ->setPassword('****');

// Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
        $time = time();

// Create a message
        $message = (new Swift_Message('good luck'))
            ->setFrom(['&&&&@***.cn' => "sina"])
            ->setTo(['&&&@****.com' => "sk"])
            ->setBody("good luck:$text");

// Send the message
        $result = $mailer->send($message);
        return $result;
    }
}
