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
                               ->where(['statutRCarteCategorie' => 1])
                               ->order('sectionRCarteCategorie, ordreRCarteCategorie');
        $this->set('categories', $categories);

        $categoriesOff = $this->RCarteCategories->find()
                               ->contain('RCarteSCategories')
                               ->where(['statutRCarteCategorie' => 0])
                               ->order('sectionRCarteCategorie, ordreRCarteCategorie');
        $this->set('categoriesOff', $categoriesOff);
    }

    public function add()
    {
        $title = 'Admin | Ajout Catégorie';
        $this->set('title', $title);

        if ($this->request->is('post')) {
            $dataC = $this->request->data['dataC'];
                
            $ordre = $this->RCarteCategories->find()
                                        ->select('ordreRCarteCategorie')
                                        ->where(['sectionRCarteCategorie' => $dataC['sectionRCarteCategorie']]);

            $ordre->select(['ordre' => $ordre->func()->max('ordreRCarteCategorie')])->first();

            if (isset($dataC))
            {
                $categorie = $this->RCarteCategories->newEntity($dataC);
                foreach ($ordre as $o) {
                    $ordre = $o['ordre'];
                }
                $categorie['ordreRCarteCategorie'] = $ordre + 1;
                $categorie['statutRCarteCategorie'] = 1;

                if ($this->RCarteCategories->save($categorie))
                {
                    $dataSC = $this->request->data['dataSC'];
                    
                    if (isset($dataSC)) {                        
                        foreach ($dataSC as $SC => $value) {
                            $scategorie = $this->RCarteCategories->RCarteSCategories->newEntity($value);

                            $scategorie['idRCarteCategorie'] = $categorie->idRCarteCategorie;
                            $scategorie['ordreRCarteSCategorie'] = $SC;

                            $this->RCarteCategories->RCarteSCategories->save($scategorie);
                        }
                    }
                    return $this->redirect(['action' => 'liste']);
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
        $title = 'Admin | Carte Catégories';
        $this->set('title', $title);

        $categorie = $this->RCarteCategories->find()
                            ->where(['idRCarteCategorie' => $id])
                            ->contain(['RCarteSCategories'])
                            ->first();

        $this->set('categorie', $categorie);
    }

    public function edit($id = null)
    {
        $title = 'Admin | Modifier Catégorie';
        $this->set('title', $title);
        
        $categorie = $this->RCarteCategories->find()
                                        ->where(['idRCarteCategorie' => $id])
                                        ->contain(['RCarteSCategories'])
                                        ->first();

        if ($this->request->is('post')) {

            $categorie = $this->RCarteCategories->patchEntity($categorie, $this->request->data);

            if ($this->RCarteCategories->save($categorie)) {
                $this->Flash->success(__('La catégorie a été modifiée.'));

                return $this->redirect(['action' => 'liste']);
            }
            else { $this->Flash->error(__('La catégorie n\'a pas pu être modifiée.')); }
        }

        $this->set('categorie', $categorie);
    }

    public function delete($id = null)
    {
        $categorie = $this->RCarteCategories->find()
                            ->where(['idRCarteCategorie' => $id])
                            ->first();

        if ($this->RCarteCategories->delete($categorie)) {
            $this->Flash->success(__('La catégorie a été supprimée.'));
        } else {
            $this->Flash->error(__('La catégorie n\'a pas pu être supprimée.'));
        }

        return $this->redirect(['action' => 'liste']);        
    }

    public function open($id = null)
    {
        $categorie = $this->RCarteCategories->find()
                            ->where(['idRCarteCategorie' => $id])
                            ->first();

        $categorie['statutRCarteCategorie'] = 1;

        if ($this->RCarteCategories->save($categorie)) {
            $this->Flash->success(__('La catégorie a été activée.'));
            return $this->redirect(['action' => 'liste']);
        } else {
            $this->Flash->error(__('La catégorie n\'a pas pu être activée.'));
        }
    }

    public function close($id = null)
    {
        $categorie = $this->RCarteCategories->find()
                            ->where(['idRCarteCategorie' => $id])
                            ->first();

        $categorie['statutRCarteCategorie'] = 0;

        if ($this->RCarteCategories->save($categorie)) {
            $this->Flash->success(__('La catégorie a été désactivée.'));
            return $this->redirect(['action' => 'liste']);
        } else {
            $this->Flash->error(__('La catégorie n\'a pas pu être désactivée.'));
        }
    }
}
