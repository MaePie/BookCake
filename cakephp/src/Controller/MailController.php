<?php
namespace App\Controller;

use Cake\Mailer\Email;

Email::dropTransport($key);


Email::setConfigTransport('gmail', [
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'username' => 'mpbookcake@gmail.com',
    'password' => 'bonjourbonjour',
    'className' => 'Smtp',
    'tls' => true
]);

class MailController extends AppController
{
    public function sendNudes()
    {
        //TODO Faire vérification
        $email = new Email();
        $email
            ->template('welcome', 'fancy')
            ->emailFormat('html')
            ->to('bob@example.com')
            ->from('app@domain.com')
            ->send();
        // Use a named transport already configured using Email::configTransport()
        $email->transport('gmail');
        // Use a constructed object.
        $transport = new DebugTransport();

        $result = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        //Email::deliver('mael.mayon@free.fr', 'Subject', 'Message', ['from' => 'me@example.com']);
        //$this->json($result);
        //$this->getMailer('User')->send('welcome', ['mael.mayon@free.fr']);
    }
}
