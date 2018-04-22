<?php
/**
 * Created by PhpStorm.
 * User: mael
 * Date: 28/03/2018
 * Time: 22:56
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\View\Helper\FlashHelper;
use Cake\Mailer\Email;

class ProspectsController extends AppController
{

    public function add() {
        $title = 'Reservation - Au fil de l\'eau';
        $this->set('title', $title);

        debug($this->request->data);

        $prospect = $this->Prospects->newEntity($this->request->data['prospects']);
        debug($prospect);
        $this->Prospects->save($prospect);
        
        return $this->redirect(['controller' => 'restaurant', 'action' => 'index'])
    }

}
