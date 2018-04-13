<?php
namespace App\Controller;

use Cake\Mailer\Email;

class MailController extends AppController
{
    public function sendNudes()
    {
        //TODO Faire vérification
        $result = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        $this->json($result);
        //Email::deliver('you@example.com', 'Subject', 'Message', ['from' => 'me@example.com']);
        //$this->getMailer('User')->send('welcome', ['mael.mayon@free.fr']);
    }
}
