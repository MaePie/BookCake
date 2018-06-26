<?php
/**
 * Created by PhpStorm.
 * User: mael
 * Date: 28/03/2018
 * Time: 22:56
 */

namespace App\Controller\Restaurant;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class RestaurantController extends AppController
{

    private $title = 'Au fil de l\'eau';

    public function index() {
        $guestBookComments = TableRegistry::get('GuestBookComments');
        $guestBookComments = $guestBookComments->find();

        $this->set('title', $this->title);
        $this->set('guestBookComments', $guestBookComments);
    }

    public function carte() {
        $this->set('title', 'Carte | '.$this->title);
    }

    public function carte2() {
        $this->set('title', 'Carte | '.$this->title);

        $this->loadModel('RCarteProduits');

        $produits = $this->RCarteProduits->find()
                                ->contain(['RCarteCategories'])
                                ->contain(['RCarteSCategories'])
                                ->where(['statutRCarteProduit' => 1])
                                ->where(['RCarteCategories.statutRCarteCategorie' => 1])
                                ->where(function($exp) {
                                    return $exp->or_(['deRCarteProduit <=' => date('Y-m-d'), $exp->isNull('deRCarteProduit')]);
                                })
                                ->where(function($exp) {
                                    return $exp->or_(['aRCarteProduit >=' => date('Y-m-d'), $exp->isNull('aRCarteProduit')]);
                                })
                                ->order('RCarteCategories.sectionRCarteCategorie, RCarteCategories.ordreRCarteCategorie, RCarteSCategories.ordreRCarteSCategorie, ordreRCarteProduit');

        $this->set('produits', $produits);
    }

    public function contact() {
        $this->set('title', 'Contact | '.$this->title);
    }

    public function galerie() {
        $this->set('title', 'Galerie | '.$this->title);
    }
}
