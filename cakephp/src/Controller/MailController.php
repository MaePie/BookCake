<?php
namespace App\Controller;

use Cake\Mailer\Email;

class MailController extends AppController
{
    public function rres()
    {
        $email = new Email();

        $email->template('rres', 'fancy')
            ->emailFormat('html')
            ->subject('Reservation Restaurant Au fil de l\'eau')
            ->to('mauerpierre@gmail.com')
            ->from('mpbookcake@gmail.com')
            ->send();
    }

    public function quickContact()
    {
        //TODO Faire vérification
        $email = new Email();
        $email
            ->template('welcome', 'fancy')
            ->emailFormat('html')
            ->to('mauerpierre@gmail.com')
            ->from('mpbookcake@gmail.com')
            ->send();

        $result = ['success' => 'success'];
        $this->json($result);
    }


}
