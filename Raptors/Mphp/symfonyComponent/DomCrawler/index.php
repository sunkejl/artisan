<?php
/**
 * @link http://symfony.com/doc/current/components/dom_crawler.html
 * getUri http://stackoverflow.com/questions/12056339/symfony2-domcrawler-selectlink-returns-null-uri
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/1
 * Time: 17:58
 */
namespace DomCrawler\index;
require "vendor/autoload.php";

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

$html = <<<'HTML'
<!DOCTYPE html>
<html>
    <body>
        <p class="message">Hello World!</p>
        <p>Hello Crawler!</p>
        <p>Hello! sk</p>
           <a href=\"http://another.com/abs-link\">abs-link-text</a>
        <a href="http://www.baidu.com" name="go">aa</a>
        <img src="http://www.baidu.com/img/bd_logo1.png" alt="baidu">
       <form action="baidu.com" method="post">
        <input type="text" name="name">
       <input type="submit" value="Working">
       </form> 
    </body>
</html>
HTML;

$crawler = new Crawler('', 'http://www.example.com');
$crawler->addHtmlContent($html);


$msg = $crawler->filter('body > p')->eq(1)->text();

$msg = $crawler->filter('body > p')->first()->text();
$msg = $crawler->filter('body > p')->last()->text();
$msg = $crawler->filter('body > p')->last()->siblings();
foreach ($msg as $m) {
    $m->textContent;
}
$msg = $crawler->filter('body > p')->nextAll();
foreach ($msg as $m) {
    $m->textContent;
}

$tag = $crawler->filterXPath('//body/*')->nodeName();
$message = $crawler->filterXPath('//body/p')->text();
$class = $crawler->filterXPath('//body/p')->attr('class');

$nodeValues = $crawler->filter('p')->each(function (Crawler $node, $i) {
    $node->text();
});

$link = $crawler->filter('body > a')->eq(0)->attr('href');


$link = $crawler->selectLink('aa')->eq(0)->link()->getUri();

$link = $crawler->selectImage('baidu')->eq(0)->image()->getUri();


$form = $crawler->selectButton('Working')->form();
$method = $form->getMethod();
$url = $form->getUri();
$form->setValues(array(
    'name' => 'symfonyfan',
));
$values=$form->getValues();
$values=$form->getPhpValues();






// make a real request to an external site
$client = new Client();
$crawler = $client->request('GET', 'https://github.com/login');

// select the form and fill in some values
$form = $crawler->selectButton('Sign in')->form();
$form['login'] = 'symfonyfan';
$form['password'] = 'anypass';

// submit that form
$crawler = $client->submit($form);
var_dump($crawler);
exit;

