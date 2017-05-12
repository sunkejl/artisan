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

    public function set()
    {
        // Create the Transport
        $transport = \Swift_SmtpTransport::newInstance('smtp.sina.com', 25)
            ->setUsername('example@example.com')
            ->setPassword('******')
        ;
        $mailer = \Swift_Mailer::newInstance($transport);

        // Create the message
        $message = \Swift_Message::newInstance()
            // Give the message a subject
            ->setSubject('Your subject')
            // Set the From address with an associative array
            ->setFrom(array('example@example.com' => 'nick name'))
            // Set the To addresses with an associative array
            ->setTo(array('example@example.com', 'example@example.com' => 'nick name'))
            // Give it a body
            ->setBody('Here is the message itself')
            // And optionally an alternative body
            ->addPart('<q>Here is the message itself</q>', 'text/html');
        $r=$mailer->send($message);
        var_dump($r);
    }
}
