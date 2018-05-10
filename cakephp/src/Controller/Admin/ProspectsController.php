<?php
/**
 * Created by PhpStorm.
 * User: mael
 * Date: 28/03/2018
 * Time: 22:56
 */

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\View\Helper\FlashHelper;
use Cake\Mailer\Email;

class ProspectsController extends AppController
{

    public function add() {
        $title = 'Reservation - Au fil de l\'eau';
        $this->set('title', $title);

        debug($this->request->data);

        if ($this->request->is('post')) {
          $prospect = $this->Prospects->newEntity($this->request->data['prospects']);
          debug($prospect);
          $this->Prospects->save($prospect);
        
          return $this->redirect(['controller' => 'prospects', 'action' => 'list']);
        }
    }

    public function list() {
        $title = 'Admin Liste Users';
        $this->set('title', $title);

        $prospects = $this->Prospects->find('all');
    }

    public function listJSON() {
        $prospects = $this->Prospects->find();

        // echo json_encode($prospects, JSON_PRETTY_PRINT);

        $i = 0;

        echo "{\"data\": [";
        foreach ($prospects as $prospect)
        {
          if($i != 0) echo ",";
          echo "[\"". $prospect['idProspect'] ."\",";
          echo "\"". $prospect['nomProspect'] ."\",";
          echo "\"". $prospect['emailProspect'] ."\",";
          if(!empty($prospect['telProspect'])) echo "\"". $prospect['telProspect'] ."\",";
          else echo "\"NR\",";
          echo "\"<a href='view/". $prospect['idProspect'] ."'>View </a><a href='edit/". $prospect['idProspect'] ."'>Edit </a><a href='delete/". $prospect['idProspect'] ."'>Delete</a>\"]";
          $i++;
        }
        echo "]}";

        die();
    }

}
