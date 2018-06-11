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

    public function getNbResCalendar()
    {
        $ress = $this->RRes->find()
        ->select([
            'start' => 'dateRRes',
            'title' => $this->RRes->find()->func()->count('*'),
            'title2' => $this->RRes->find()->func()->sum('nbPersRRes')
        ])
        ->where(['dateRRes >=' => date('Y-m-d')])
        ->group('dateRRes')
        ->toArray();

        foreach ($ress as $res) {
            $res['start'] = date('Y-m-d', strtotime($res['start']));
            $res['title'] = $res['title'] . ' res. - ' . $res['title2'] . ' pers.'; 
            $res['url'] = '/admin/r-res/day-list/' . $res['start'];
        }

        echo json_encode($ress);
        die();
    }

    public function getNbResChart($day = null)
    {

        $day = date('Y-m-d');

        for ($i = 0; $i < 7; $i++) {
            $ress[$i] = $this->RRes->find()
            ->select([
                'dateRRes',
                'count' => $this->RRes->find()->func()->count('*')
            ])
            ->where(['dateRRes' => $day])
            ->group('dateRRes')
            ->toArray();
            
            $day = date('Y-m-d', strtotime($day .'+1 day'));
        }

        $nbRes = [];
        foreach ($ress as $res) {
            if (isset($res[0]['count'])) array_push($nbRes, $res[0]['count']);
            else array_push($nbRes, 0);
        }

        echo json_encode($nbRes);
        die();
    }

    public function getNbPersChart($day = null)
    {

        $day = date('Y-m-d');

        for ($i = 0; $i < 7; $i++) {
            $ress[$i] = $this->RRes->find()
            ->select([
                'dateRRes',
                'count' => $this->RRes->find()->func()->sum('nbPersRRes')
            ])
            ->where(['dateRRes' => $day])
            ->group('dateRRes')
            ->toArray();
            
            $day = date('Y-m-d', strtotime($day . '+1 day'));
        }

        $nbRes = [];
        foreach ($ress as $res) {
            if (isset($res[0]['count'])) array_push($nbRes, $res[0]['count']);
            else array_push($nbRes, 0);
        }

        echo json_encode($nbRes);
        die();
    }

    public function getDays($day = null)
    {
        $day = date('Y-m-d');
        $jour = '';
        $days = [];

        for ($i = 0; $i < 7; $i++) {
            switch (date('l', strtotime($day))) {
                case 'Monday' : $jour = 'Lun. '; break;
                case 'Tuesday' : $jour = 'Mar. '; break;
                case 'Wednesday' : $jour = 'Mer. '; break;
                case 'Thursday' : $jour = 'Jeu. '; break;
                case 'Friday' : $jour = 'Ven. '; break;
                case 'Saturday' : $jour = 'Sam. '; break;
                case 'Sunday' : $jour = 'Dim. '; break;
            }

            $jour .= date('d-m', strtotime($day));

            array_push($days, $jour);

            $day = date('Y-m-d', strtotime($day .'+1 day'));
        }

        echo json_encode($days);
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

            if ($data['mailRRes']) {
                $prospectModel = $this->loadModel('Prospects');
                
                $dataP['nomProspect'] = $data['nomRRes'];
                $dataP['emailProspect'] = $data['mailRRes'];

                $prospect = $prospectModel->find()
                                            ->where(['emailProspect' => $data['mailRRes']])   
                                            ->first();
                
                if($prospect) {
                    $data['idProspect'] = $prospect->idProspect;
                }
                else {
                    $prospect = $prospectModel->newEntity($dataP);
                    $prospectModel->save($prospect);
                    $data['idProspect'] = $prospect->idProspect;
                }
            }

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
        $title = 'Admin | Réservation';
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
        $title = 'Admin | Modifier Réservation ';
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
            return $this->redirect(['controller' => 'mail', 'action' => 'validres', $id]);
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
            return $this->redirect(['controller' => 'mail', 'action' => 'cancelres', $id]);
        } else {
            $this->Flash->error(__('La réservation n\'a pas pu être annulée.'));
        }
    }

    // public function reservationForm()
    // {
    //     $true = rand(1,2);
    //     $result = ['dispo' => $true];
    //     $this->json($result);
    // }
}
