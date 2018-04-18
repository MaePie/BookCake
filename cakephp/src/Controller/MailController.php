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

        $result = ['success' => 'success'];
        $this->json($result);
    }
}
