<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Validation\Validator;

class RResController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function list()
    {
        $ress = $this->Rres->find();

        $this->set('ress', $ress);
    }

    public function add()
    {
        $users = $this->Rres->Users->find('list');
        $this->set('users', $users);

        $zones = $this->Rres->Rzones->find('list');
        $this->set('zones', $zones);

        $tables = $this->Rres->Rtables->find('list');
        $this->set('tables', $tables);

        $data = $this->request->data;

        if ($this->request->is('post'))
        {
            $res = $this->Rres->newEntity();

            $res = $this->Rres->patchEntity($res, $data);

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
    /*
    public function JSON()
    {
        $ress = $this->Rres->find()
                            ->contain(['Users'])
                            ->contain(['RZones'])
                            ->contain(['RTables']);

        $i = 0;

        echo "{\"data\": [";
        foreach ($ress as $res)
        {
          if($i != 0) echo ",";
          echo "[\"". $res->idRRes ."\",";
          echo "\"". $res->user->nomUser ." ". $res->user->prenomUser ."\",";
          echo "\"". $res->r_zone->nomRZone ."\",";
          echo "\"". $res->r_table->nomRTable ."\",";
          echo "\"". $res->dateRRes ."\",";
          echo "\"". $res->heureRRes ."\",";
          echo "\"<a href='view/". $res->idRRes ."'>View </a><a href='edit/". $res->idRRes ."'>Edit </a><a href='delete/". $res->idRRes ."'>Delete</a>\"]";
          $i++;
        }
        echo "]}";

        die();
    }
    */

    public function view($id = null)
    {
        $res = $this->Rres->find()
                            ->where(['idRRes' => $id])
                            ->contain(['RZones'])
                            ->first();

        $this->set('res', $res);
    }

    public function edit($id = null)
    {
        $table = $this->Rtables->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $table = $this->Rtables->patchEntity($table, $this->request->getData());
            if ($this->Rtables->save($table)) {
                $this->Flash->success(__('The table has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The table could not be saved. Please, try again.'));
        }
        $this->set(compact('table'));
        $this->set('_serialize', ['table']);
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

        return $this->redirect(['action' => 'index']);
    }

    public function reservationForm()
    {
        $true = rand(1,2);
        $result = ['dispo' => $true];
        $this->json($result);
    }
}
