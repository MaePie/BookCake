<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Validation\Validator;

class RResController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function list()
    {
        $title = 'Admin Réservations';
        $this->set('title', $title);

        $ress = $this->Rres->find()
                            // ->where(['dateRRes >=' => date('Y-m-d')])
                            ->contain(['Users'])
                            ->contain(['Prospects'])
                            ->contain(['RZones'])
                            ->contain(['RTables'])
                            ->order('dateRRes, heureRRes');

        $this->set('ress', $ress);
    }

    public function add()
    {
        $title = 'Admin Add Réservation';
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
        $title = 'Admin Réservation ' . $id;
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
        $title = 'Admin Edit Réservation ' . $id;
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
                $this->Flash->success(__('The table has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The table could not be saved. Please, try again.'));
        }
        $this->set('res', $res);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $table = $this->Rtables->get($id);
        if ($this->Rtables->delete($table)) {
            $this->Flash->success(__('The table has been deleted.'));
        } else {
            $this->Flash->error(__('The table could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'list']);
    }

    public function reservationForm()
    {
        $true = rand(1,2);
        $result = ['dispo' => $true];
        $this->json($result);
    }
}
