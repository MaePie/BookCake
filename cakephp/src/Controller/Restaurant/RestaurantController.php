<?php
/**
 * Created by PhpStorm.
 * User: mael
 * Date: 28/03/2018
 * Time: 22:56
 */

namespace App\Controller\Restaurant;

use App\Controller\AppController;
use Cake\View\Helper\FlashHelper;

class RestaurantController extends AppController
{

    public function index(){
        $this->viewBuilder()
            ->helpers(['Flash']);

        return null;
    }

    public function test(){
        return null;
    }
}
