<?php
/**
 * Created by PhpStorm.
 * User: mael
 * Date: 28/03/2018
 * Time: 22:56
 */

namespace App\Controller\Restaurant;

use App\Controller\AppController;


class RestaurantController extends AppController
{

    public function index(){
        return null;
        //Test Json
        /*
        if ($this->request->is('post')) {
            $location = $this->Locations->patchEntity($location, $this->request->data);

            $success = $this->Locations->save($location);

            $result = [ 'result' => $success ? 'success' : 'error' ];

            $this->setJsonResponse();
            $this->set(['result' => $result, '_serialize' => 'result']);
        }
        */
    }

    public function test(){
        return null;
    }
}
