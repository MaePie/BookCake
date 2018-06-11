<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Validation\Validator;

class RCarteCategoriesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function liste()
    {
        $title = 'Admin | Liste Catégories Carte';
        $this->set('title', $title);

        $categories = $this->RCarteCategories->find()
                               ->contain('RCarteSCategories')
                               ->order('sectionRCarteCategorie, ordreRCarteCategorie');
        $this->set('categories', $categories);
    }

    public function add()
    {
        $title = 'Admin | Ajout Catégorie';
        $this->set('title', $title);
    }

    public function view($id = null)
    {
        $title = 'Admin | Carte Catégories';
        $this->set('title', $title);
    }

    public function edit($id = null)
    {
        $title = 'Admin | Modifier Catégorie';
        $this->set('title', $title);
    }

    public function delete($id = null)
    {
        
    }
}
