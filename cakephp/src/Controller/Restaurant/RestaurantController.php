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
        
        $this->loadModel('RCarteProduits');

        $produits = $this->RCarteProduits->find()
                                ->contain(['RCarteCategories'])
                                ->contain(['RCarteSCategories'])
                                ->where(['statutRCarteProduit' => 1])
                                ->order('RCarteCategories.sectionRCarteCategorie, RCarteCategories.ordreRCarteCategorie, RCarteSCategories.ordreRCarteSCategorie, ordreRCarteProduit');

        $scategories = $this->RCarteProduits->RCarteSCategories->find()
                            ->contain(['RCarteCategories'])
                            ->order('ordreRCarteSCategorie');

        $categories = $this->RCarteProduits->RCarteCategories->find()
                            ->order('sectionRCarteCategorie, ordreRCarteCategorie');

        $this->set('produits', $produits);
        $this->set('scategories', $scategories);
        $this->set('categories', $categories);
    }

    public function contact() {
        $this->set('title', 'Contact | '.$this->title);
    }

    public function galerie() {
        $this->set('title', 'Galerie | '.$this->title);
    }
}
