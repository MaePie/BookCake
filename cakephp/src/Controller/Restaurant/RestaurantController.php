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
                                // ->where(function ($exp, $q) {
                                //     $orConditions = $exp->or_(function ($or) {
                                //         return $or->isNull('deRCarteProduit')
                                //             ->lte('deRCarteProduit', date('Y-m-d'));
                                //     })
                                // })
                                // ->where(['aRCarteProduit >=' => date('Y-m-d')])
                                ->order('RCarteCategories.sectionRCarteCategorie, RCarteCategories.ordreRCarteCategorie, RCarteSCategories.ordreRCarteSCategorie, ordreRCarteProduit');

        // $produits2 = $this->RCarteProduits->find()
        //                         ->contain(['RCarteCategories'])
        //                         ->contain(['RCarteSCategories'])
        //                         ->where(['sectionRCarteCategorie' => 1])
        //                         ->where(['statutRCarteProduit' => 2])
        //                         ->order('RCarteCategories.sectionRCarteCategorie, RCarteCategories.ordreRCarteCategorie, RCarteSCategories.ordreRCarteSCategorie, ordreRCarteProduit');

        // $scategories = $this->RCarteProduits->RCarteSCategories->find()
        //                     ->contain(['RCarteCategories'])
        //                     ->where(['sectionRCarteCategorie' => 1])
        //                     ->order('ordreRCarteSCategorie');

        // $scategories2 = $this->RCarteProduits->RCarteSCategories->find()
        //                     ->contain(['RCarteCategories'])
        //                     ->where(['sectionRCarteCategorie' => 2])
        //                     ->order('ordreRCarteSCategorie');

        // $categories = $this->RCarteProduits->RCarteCategories->find()
        //                     ->where(['sectionRCarteCategorie' => 1])
        //                     ->order('sectionRCarteCategorie, ordreRCarteCategorie');

        // $categories2 = $this->RCarteProduits->RCarteCategories->find()
        //                     ->where(['sectionRCarteCategorie' => 2])
        //                     ->order('sectionRCarteCategorie, ordreRCarteCategorie');

        // debug($produits->toArray());

        $this->set('produits', $produits);
        // $this->set('scategories', $scategories);
        // $this->set('categories', $categories);
        // $this->set('produits2', $produits2);
        // $this->set('scategories2', $scategories2);
        // $this->set('categories2', $categories2);
    }

    public function contact() {
        $this->set('title', 'Contact | '.$this->title);
    }

    public function galerie() {
        $this->set('title', 'Galerie | '.$this->title);
    }
}
