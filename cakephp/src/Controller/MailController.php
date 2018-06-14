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
                            ->contain(['Users'])
                            ->first();

        $email = new Email();

        $email->template('rres', 'rres')
            ->emailFormat('html')
            ->subject('Réservation Restaurant Au fil de l\'eau')
            ->to($res['prospect']->emailProspect)
            ->bcc('client.aufildeleau@gmail.com')
            ->from('client@restaurant-aufildeleau.fr')
            ->viewVars(['res' => $res])
            ->send();

        $this->Flash->success('Votre demande de réservation a bien été prise en compte. Un email vous a été envoyé.');
        return $this->redirect(['controller' => 'restaurant', 'action' => 'index']);
    }

    public function validres($idRRes)
    {
        $resModel = $this->loadModel('RRes');

        $res = $resModel->find()
                            ->where(['idRRes' => $idRRes])
                            ->contain(['Prospects'])
                            ->contain(['Users'])
                            ->first();

        if (isset($res['prospect'])) $to = $res['prospect']->emailProspect;
        else if (isset($res['user'])) $to = $res['user']->emailUser;

        $email = new Email();

        $email->template('rres', 'validres')
            ->emailFormat('html')
            ->subject('Réservation validée Au fil de l\'eau')
            ->to($to)
            ->bcc('client.aufildeleau@gmail.com')
            ->from('client@restaurant-aufildeleau.fr')
            ->viewVars(['res' => $res])
            ->send();

        $this->Flash->success('La réservation a bien été validée.');
        return $this->redirect(['controller' => 'admin', 'action' => 'r-res']);
    }

    public function quickContact()
    {
        $data = $this->request->data;

        //TODO Faire vérification
        $email = new Email();
        $email
            ->template('welcome', 'contact')
            ->emailFormat('html')
            ->subject('Contact client | Au fil de l\'eau')
            ->to('client@restaurant-aufildeleau.com')
            ->from($data['email'])
            ->viewVars(['data' => $data])
            ->send();

        $result = ['success' => 'success'];
        $this->json($result);
    }


}
