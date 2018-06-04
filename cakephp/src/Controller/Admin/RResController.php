<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Validation\Validator;
use Cake\I18n\Time;

class RResController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function fullList()
    {
        $title = 'Admin | Liste Globale Réservations';
        $this->set('title', $title);
    }

    public function getNbRes()
    {
        $ress = $this->RRes->find()
        ->select([
            'start' => 'dateRRes',
            'title' => $this->RRes->find()->func()->count('*')
        ])
        ->where(['dateRRes >=' => date('Y-m-d')])
        ->group('dateRRes')
        ->toArray();

        foreach ($ress as $res) {
            $res['start'] = date('Y-m-d', strtotime($res['start']));
            $res['url'] = '/admin/r-res/day-list/' . $res['start'];
        }

        echo json_encode($ress);
        die();

    }

    public function dayList($day)
    {
        $title = 'Admin | Liste Jour Réservations';
        $this->set('title', $title);
        $this->set('day', $day);

        $ress = $this->RRes->find()
                            ->where(['dateRRes' => $day])
                            ->where(['statutRRes' => 'Validée'])
                            ->contain(['Users'])
                            ->contain(['Prospects'])
                            ->order('dateRRes, heureRRes');

        $this->set('ress', $ress);

        $ressNV = $this->RRes->find()
                            ->where(['dateRRes' => $day])
                            ->where(['statutRRes' => 'Demandée'])
                            ->contain(['Users'])
                            ->contain(['Prospects'])
                            ->order('dateRRes, heureRRes');

        $this->set('ressNV', $ressNV);

        $ressA = $this->RRes->find()
                            ->where(['dateRRes' => $day])
                            ->where(['statutRRes' => 'Annulée'])
                            ->contain(['Users'])
                            ->contain(['Prospects'])
                            ->order('dateRRes, heureRRes');

        $this->set('ressA', $ressA);
    }

    public function add()
    {
        $title = 'Admin | Ajout Réservation';
        $this->set('title', $title);

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $data['statutRRes'] = 'Validée';

            list($day, $month, $year) = explode('/', $data['dateRRes']);
            $data['dateRRes'] = $year . '-' . $month . '-' . $day;
        
            if (isset($data))
            {
                $res = $this->RRes->newEntity($data);

                if ($this->RRes->save($res))
                {
                    return $this->redirect(['action' => 'view', $res->idRRes]);
                }
                else 
                {
                    $this->Flash->error(__('Eléments manquants'));
                }
            }
        }
    }

    public function view($id = null)
    {
        $title = 'Admin | Réservation ' . $id;
        $this->set('title', $title);

        $rres = $this->RRes->find()
                            ->where(['idRRes' => $id])
                            ->contain(['Users'])
                            ->contain(['Prospects'])
                            ->contain(['RZones'])
                            ->contain(['RTables'])
                            ->first();

        $this->set('rres', $rres);
    }

    public function edit($id = null)
    {
        $title = 'Admin | Modifier Réservation ' . $id;
        $this->set('title', $title);

        $res = $this->RRes->find()
                            ->where(['idRRes' => $id])
                            ->contain(['Users'])
                            ->contain(['Prospects'])
                            ->contain(['RZones'])
                            ->contain(['RTables'])
                            ->first();

        if ($this->request->is('post')) {
            $res = $this->RRes->patchEntity($res, $this->request->data);
            if ($this->RRes->save($res)) {
                $this->Flash->success(__('La réservation a été modifiée.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('La réservation n\'a pas pu être modifiée.'));
        }
        $this->set('res', $res);
    }

    public function delete($id = null)
    {
        $res = $this->RRes->find()
                            ->where(['idRRes' => $id])
                            ->first();

        if ($this->RRes->delete($res)) {
            $this->Flash->success(__('La réservation a été supprimée.'));
        } else {
            $this->Flash->error(__('La réservation n\'a pas pu être supprimée.'));
        }

        return $this->redirect(['action' => 'fullList', date('m')]);
    }

    public function validRes($id = null)
    {
        $res = $this->RRes->find()
                            ->where(['idRRes' => $id])
                            ->first();

        $res['statutRRes'] = 'Validée';

        if ($this->RRes->save($res)) {
            $this->Flash->success(__('La réservation a été validée.'));
            return $this->redirect(['action' => 'view', $id]);
        } else {
            $this->Flash->error(__('La réservation n\'a pas pu être validée.'));
        }
    }

    public function cancelRes($id = null)
    {
        $res = $this->RRes->find()
                            ->where(['idRRes' => $id])
                            ->first();

        $res['statutRRes'] = 'Annulée';

        if ($this->RRes->save($res)) {
            $this->Flash->success(__('La réservation a été validée.'));
            return $this->redirect(['action' => 'view', $id]);
        } else {
            $this->Flash->error(__('La réservation n\'a pas pu être validée.'));
        }
    }

    // public function reservationForm()
    // {
    //     $true = rand(1,2);
    //     $result = ['dispo' => $true];
    //     $this->json($result);
    // }
}
