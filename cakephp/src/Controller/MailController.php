<?php
namespace App\Controller;

use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

class MailController extends AppController
{
    public function rres($idRRes)
    {
        $rResTable = TableRegistry::get('RRes');

        $res = $rResTable->find()
                            ->where(['idRRes' => $idRRes])
                            ->contain(['Prospects'])
                            ->first();

        $email = new Email();

        $email->template('rres', 'rres')
            ->emailFormat('html')
            ->subject('Reservation Restaurant Au fil de l\'eau')
            ->to($res['prospect']->emailProspect)
            ->bcc('mauerpierre@gmail.com')
            ->from('mauerpierre@gmail.com')
            ->viewVars(['res' => $res])
            ->send();

        return $this->redirect(['controller' => 'restaurant', 'action' => 'index']);
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
