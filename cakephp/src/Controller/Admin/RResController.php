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

    public function fullList($month)
    {
        $title = 'Admin | Liste Globale Réservations';
        $this->set('title', $title);

        $ress = $this->Rres->find()
                            // ->where(['dateRRes as date >=' => date('Y-m-d')])
                            // ->where([date('m', $date) => $month])
                            ->contain(['Users'])
                            ->contain(['Prospects'])
                            ->contain(['RZones'])
                            ->contain(['RTables'])
                            ->order('dateRRes, heureRRes');

        $this->set('ress', $ress);
    }

    public function dayList($day)
    {
        $title = 'Admin | Liste Jour Réservations';
        $this->set('title', $title);
        $this->set('day', $day);

        $ress = $this->Rres->find()
                            ->where(['dateRRes' => $day])
                            ->where(['statutRRes' => 'Validée'])
                            ->contain(['Users'])
                            ->contain(['Prospects'])
                            ->contain(['RZones'])
                            ->contain(['RTables'])
                            ->order('dateRRes, heureRRes');

        $this->set('ress', $ress);

        $ressNV = $this->Rres->find()
                            ->where(['dateRRes' => $day])
                            ->where(['statutRRes' => 'Demandée'])
                            ->contain(['Users'])
                            ->contain(['Prospects'])
                            ->contain(['RZones'])
                            ->contain(['RTables'])
                            ->order('dateRRes, heureRRes');

        $this->set('ressNV', $ressNV);

        $ressA = $this->Rres->find()
                            ->where(['dateRRes' => $day])
                            ->where(['statutRRes' => 'Annulée'])
                            ->contain(['Users'])
                            ->contain(['Prospects'])
                            ->contain(['RZones'])
                            ->contain(['RTables'])
                            ->order('dateRRes, heureRRes');

        $this->set('ressA', $ressA);
    }

    public function add()
    {
        $title = 'Admin | Ajout Réservation';
        $this->set('title', $title);

        $zones = $this->Rres->Rzones->find('list');
        $this->set('zones', $zones);

        $tables = $this->Rres->Rtables->find('list');
        $this->set('tables', $tables);

        if ($this->request->is('post'))
        {
            $res = $this->Rres->newEntity();

            $res = $this->Rres->patchEntity($res, $this->request->data);

            $this->Rres->save($res);

            if ($this->Rres->save($res)) {
                $this->Flash->success(__('La réservation a bien été enregistrée.'));

                return $this->redirect(['action' => 'view/'.$res->idRRes]);
            }
            else if (!$this->Rres->save($res)) {
                $this->Flash->error(__('Eléments manquants'));
            }
        }
    }

    public function view($id = null)
    {
        $title = 'Admin | Réservation ' . $id;
        $this->set('title', $title);

        $rres = $this->Rres->find()
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

        $res = $this->Rres->find()
                            ->where(['idRRes' => $id])
                            ->contain(['Users'])
                            ->contain(['Prospects'])
                            ->contain(['RZones'])
                            ->contain(['RTables'])
                            ->first();

        if ($this->request->is('post')) {
            $res = $this->Rres->patchEntity($res, $this->request->data);
            if ($this->Rres->save($res)) {
                $this->Flash->success(__('La réservation a été modifiée.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('La réservation n\'a pas pu être modifiée.'));
        }
        $this->set('res', $res);
    }

    public function delete($id = null)
    {
        $res = $this->Rres->find()
                            ->where(['idRRes' => $id])
                            ->first();

        if ($this->Rres->delete($res)) {
            $this->Flash->success(__('La réservation a été supprimée.'));
        } else {
            $this->Flash->error(__('La réservation n\'a pas pu être supprimée.'));
        }

        return $this->redirect(['action' => 'fullList']);
    }

    public function validRes($id = null)
    {
        $res = $this->Rres->find()
                            ->where(['idRRes' => $id])
                            ->first();

        $res['statutRRes'] = 'Validée';

        if ($this->Rres->save($res)) {
            $this->Flash->success(__('La réservation a été validée.'));
            return $this->redirect(['action' => 'view', $id]);
        } else {
            $this->Flash->error(__('La réservation n\'a pas pu être validée.'));
        }
    }

    public function cancelRes($id = null)
    {
        $res = $this->Rres->find()
                            ->where(['idRRes' => $id])
                            ->first();

        $res['statutRRes'] = 'Annulée';

        if ($this->Rres->save($res)) {
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
