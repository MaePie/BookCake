<?php
namespace App\Controller;

use Cake\Mailer\Email;

class MailController extends AppController
{
    public function sendNudes()
    {
        $this->setJsonResponse();
        $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        $result =  json_encode($arr);
        $this->response->body($result);
        return $this->response;
        //Email::deliver('you@example.com', 'Subject', 'Message', ['from' => 'me@example.com']);
        //$this->getMailer('User')->send('welcome', ['mael.mayon@free.fr']);
    }

}
