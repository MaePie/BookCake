<?php
namespace App\Controller;

use Cake\Mailer\Email;

class MailController extends AppController
{
    public function quickContact()
    {
        //TODO Faire vérification
        $email = new Email();
        $email
            ->template('welcome', 'fancy')
            ->emailFormat('html')
            ->to('mael.mayon@free.fr')
            ->from('mpbookcake@gmail.com')
            ->send();

        $result = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        $this->json($result);
    }
}
