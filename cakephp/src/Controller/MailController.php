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

        $this->Flash->success('Votre demande de réservation a bien été prise en compte. Un email vous a été envoyé.');
        return $this->redirect(['controller' => 'restaurant', 'action' => 'index']);
    }

    public function quickContact()
    {
        $data = $this->request->data;

        //TODO Faire vérification
        $email = new Email();
        $email
            ->template('welcome', 'fancy')
            ->emailFormat('html')
            ->subject('Contact client | Au fil de l\'eau')
            ->to('mauerpierre@gmail.com')
            ->from($data['email'])
            ->viewVars(['data' => $data])
            ->send();

        $result = ['success' => 'success'];
        $this->json($result);


    }


}
