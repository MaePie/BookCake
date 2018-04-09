<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Validation\Validator;

class RZonesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function list()
    {
        $zones = $this->Rzones->find();

        $this->set('zones', $zones);
    }

    public function add()
    {
        $data = $this->request->data;

        if ($this->request->is('post'))
        {
            $zone = $this->Rzones->newEntity();

            $zone = $this->Rzones->patchEntity($zone, $data);

            $this->Rzones->save($zone);

            if ($this->Rzones->save($zone)) {
                $this->Flash->success(__('La zone a bien été enregistrée.'));

                return $this->redirect(['action' => 'view/'.$zone->idRZone]);
            }
            else if (!$this->Rzones->save($zone)) {
                $this->Flash->error(__('Eléments manquants'));
            }
        }
    }

    public function JSON()
    {
        $zones = $this->Rzones->find();

        // echo json_encode($RZones, JSON_PRETTY_PRINT);

        $i = 0;

        echo "{\"data\": [";
        foreach ($zones as $zone)
        {
          if($i != 0) echo ",";
          echo "[\"". $zone['idRZone'] ."\",";
          echo "\"". $zone['nomRZone'] ."\",";
          echo "\"<a href='view/". $zone['idRZone'] ."'>View </a><a href='edit/". $zone['idRZone'] ."'>Edit </a><a href='delete/". $zone['idRZone'] ."'>Delete</a>\"]";
          $i++;
        }
        echo "]}";

        die();
    }
    public function view($id = null)
    {
        $zone = $this->Rzones->find()
                            ->where(['idRZone' => $id])
                            ->first();                            

        $this->set('zone', $zone);
    }

    public function edit($id = null)
    {
        $zone = $this->RZones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zone = $this->Rzones->patchEntity($zone, $this->request->getData());
            if ($this->Rzones->save($zone)) {
                $this->Flash->success(__('The zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zone could not be saved. Please, try again.'));
        }
        $this->set(compact('zone'));
        $this->set('_serialize', ['zone']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zone = $this->Rzones->get($id);
        if ($this->Rzones->delete($zone)) {
            $this->Flash->success(__('The zone has been deleted.'));
        } else {
            $this->Flash->error(__('The zone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
