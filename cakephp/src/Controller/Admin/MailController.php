<?php
namespace App\Controller\Admin;

use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

class MailController extends AppController
{
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

        if (isset($to)) {
            $email = new Email();

            $email->template('default', 'validres')
                ->emailFormat('html')
                ->subject('Validation réservation Au fil de l\'eau')
                ->to($to)
                ->bcc('test.aufildeleau@gmail.com')
                ->from('client@restaurant-aufildeleau.fr')
                ->viewVars(['res' => $res])
                ->send();

            $this->Flash->success('La réservation a été validée.');
            return $this->redirect(['controller' => 'r-res', 'action' => 'dayList', date('Y', strtotime($res->dateRRes)) . '-' . date('m', strtotime($res->dateRRes)) . '-' . date('d', strtotime($res->dateRRes))]);
        }
        else {
            $this->Flash->error(__('Pas de mail pour valider cette réservation.'));
            return $this->redirect(['controller' => 'r-res', 'action' => 'dayList', date('Y', strtotime($res->dateRRes)) . '-' . date('m', strtotime($res->dateRRes)) . '-' . date('d', strtotime($res->dateRRes))]);
        }
    }

    public function cancelres($idRRes)
    {
        $resModel = $this->loadModel('RRes');

        $res = $resModel->find()
                            ->where(['idRRes' => $idRRes])
                            ->contain(['Prospects'])
                            ->contain(['Users'])
                            ->first();

        if (isset($res['prospect'])) $to = $res['prospect']->emailProspect;
        else if (isset($res['user'])) $to = $res['user']->emailUser;

        if (isset($to)) {
            $resModel = $this->loadModel('RRes');

            $res = $resModel->find()
                                ->where(['idRRes' => $idRRes])
                                ->contain(['Prospects'])
                                ->contain(['Users'])
                                ->first();

            if (isset($res['prospect'])) $to = $res['prospect']->emailProspect;
            else if (isset($res['user'])) $to = $res['user']->emailUser;

            $email = new Email();

            $email->template('default', 'cancelres')
                ->emailFormat('html')
                ->subject('Annulation réservation Au fil de l\'eau')
                ->to($to)
                ->bcc('test.aufildeleau@gmail.com')
                ->from('client@restaurant-aufildeleau.fr')
                ->viewVars(['res' => $res])
                ->send();

            $this->Flash->success('La réservation a été annulée.');
            return $this->redirect(['controller' => 'r-res', 'action' => 'dayList', date('Y', strtotime($res->dateRRes)) . '-' . date('m', strtotime($res->dateRRes)) . '-' . date('d', strtotime($res->dateRRes))]);
        }
        else {
            $this->Flash->error(__('Pas de mail pour annuler cette réservation.'));
            return $this->redirect(['controller' => 'r-res', 'action' => 'dayList', date('Y', strtotime($res->dateRRes)) . '-' . date('m', strtotime($res->dateRRes)) . '-' . date('d', strtotime($res->dateRRes))]);
        }
    }
}
