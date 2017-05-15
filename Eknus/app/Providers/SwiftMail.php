<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/10
 * Time: 16:40
 */

namespace App\Providers;

class SwiftMail
{
    use ConfigTrait;
    private $host;
    private $port;
    private $username;
    private $password;

    /**
     * SwiftMail constructor.
     */
    public function __construct()
    {
        extract($this->getSwiftMailYaml());
        $this->setHost($host);
        $this->setPort($transport);
        $this->setUsername($username);
        $this->setPassword($password);
    }

    public function set()
    {
        // Create the Transport
        $transport = \Swift_SmtpTransport::newInstance($this->host, $this->port)
            ->setUsername($this->username)
            ->setPassword($this->password);
        $mailer = \Swift_Mailer::newInstance($transport);

        // Create the message
        $message = \Swift_Message::newInstance()
            // Give the message a subject
            ->setSubject('Your subject')
            // Set the From address with an associative array
            ->setFrom(array($this->username => 'nick name'))
            // Set the To addresses with an associative array
            ->setTo(array('494159770@qq.com', '494159770@qq.com' => 'nick name'))
            // Give it a body
            ->setBody('Here is the message itself')
            // And optionally an alternative body
            ->addPart('<q>Here is the message itself</q>', 'text/html');
        return $mailer->send($message);
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }
}
