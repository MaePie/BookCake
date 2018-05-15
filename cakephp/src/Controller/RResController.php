<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

class RResController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    function dateFormatJJMMAAAA1($date)
    {
        list($year, $month, $day) = explode('-', $date);

        return "$day / $month / $year";
    }

    public function add()
    {
        $dataR = $this->request->data['rres'];
        $dataP = $this->request->data['prospects'];

        $dataR['statutRRes'] = 'Demandée';

        list($day, $month, $year) = explode('/', $dataR['dateRRes']);
        $dataR['dateRRes'] = $year . '-' . $month . '-' . $day;

        $prospectsTable = TableRegistry::get('Prospects');

        $prospect = $prospectsTable->find()
                                    ->where(['emailProspect' => $dataP['emailProspect']])   
                                    ->first();
        
        if($prospect) {
            $dataR['idProspect'] = $prospect->idProspect;
        }
        else {
            $prospect = $prospectsTable->newEntity($dataP);
            $prospectsTable->save($prospect);
            $dataR['idProspect'] = $prospect->idProspect;
        }

        if (isset($dataR))
        {
            $res = $this->RRes->newEntity($dataR);

            if ($this->RRes->save($res))
            {
                return $this->redirect(['controller' => 'mail', 'action' => 'rres', $res->idRRes]);
            }
            else 
            {
                return $this->redirect(['controller' => 'restaurant', 'action' => 'index']);
            }
        }
    }

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
        $table = $this->Rres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $table = $this->Rres->patchEntity($table, $this->request->getData());
            if ($this->Rres->save($table)) {
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
        $table = $this->Rres->get($id);
        if ($this->Rres->delete($table)) {
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
