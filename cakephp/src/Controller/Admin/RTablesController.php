<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Validation\Validator;

class RTablesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function list()
    {
        $tables = $this->Rtables->find();

        $this->set('tables', $tables);
    }

    public function add()
    {
        $zones = $this->Rtables->Rzones->find('list');
        $this->set('zones', $zones);

        $data = $this->request->data;

        if ($this->request->is('post'))
        {
            $table = $this->Rtables->newEntity();

            $table = $this->Rtables->patchEntity($table, $data);

            $this->Rtables->save($table);

            if ($this->Rtables->save($table)) {
                $this->Flash->success(__('La table a bien été enregistrée.'));

                return $this->redirect(['action' => 'view/'.$table->idRTable]);
            }
            else if (!$this->Rtables->save($table)) {
                $this->Flash->error(__('Eléments manquants'));
            }
        }
    }

    public function JSON()
    {
        $tables = $this->Rtables->find()->contain(['RZones']);

        // echo json_encode($Rtables, JSON_PRETTY_PRINT);

        $i = 0;

        echo "{\"data\": [";
        foreach ($tables as $table)
        {
          if($i != 0) echo ",";
          echo "[\"". $table->idRTable ."\",";
          echo "\"". $table->r_zone->nomRZone ."\",";
          echo "\"". $table->nomRTable ."\",";
          echo "\"<a href='view/". $table->idRTable ."'>View </a><a href='edit/". $table->idRTable ."'>Edit </a><a href='delete/". $table->idRTable ."'>Delete</a>\"]";
          $i++;
        }
        echo "]}";

        die();
    }
    public function view($id = null)
    {
        $table = $this->Rtables->find()
                            ->where(['idRTable' => $id])
                            ->contain(['RZones'])
                            ->first();

        $this->set('table', $table);
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
}
