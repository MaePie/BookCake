<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Validation\Validator;

class RCarteProduitsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function liste($id = null)
    {
        $title = 'Admin | Liste Produits';
        $this->set('title', $title);

        if ($id != null) {
            $produits = $this->RCarteProduits->find()
                                ->contain(['RCarteCategories'])
                                ->contain(['RCarteSCategories'])
                                ->where(['RCarteProduits.idRCarteCategorie' => $id])
                                ->where(['statutRCarteProduit' => 1])
                                ->order('RCarteCategories.sectionRCarteCategorie, RCarteCategories.ordreRCarteCategorie, RCarteSCategories.ordreRCarteSCategorie, ordreRCarteProduit');

            $scategories = $this->RCarteProduits->RCarteSCategories->find()
                                ->contain(['RCarteCategories'])
                                ->order('ordreRCarteSCategorie');

            $this->set('produits', $produits);
            $this->set('scategories', $scategories);

            $produitsOff = $this->RCarteProduits->find()
                                ->contain(['RCarteCategories'])
                                ->contain(['RCarteSCategories'])
                                ->where(['RCarteProduits.idRCarteCategorie' => $id])
                                ->where(['statutRCarteProduit' => 0])
                                ->order('RCarteCategories.sectionRCarteCategorie, RCarteCategories.ordreRCarteCategorie, RCarteSCategories.ordreRCarteSCategorie, ordreRCarteProduit');

            $this->set('produitsOff', $produitsOff);
        }

        $categories = $this->RCarteProduits->RCarteCategories->find()
                            ->order('sectionRCarteCategorie, ordreRCarteCategorie');
        $this->set('categories', $categories);
        $this->set('cat', $id);
    }

    public function add()
    {
        $title = 'Admin | Ajout Produit';
        $this->set('title', $title);

        $categories = $this->RCarteProduits->RCarteCategories->find('list');
        $this->set('categories', $categories);

        if ($this->request->is('post')) {

            $data = $this->request->data;
            debug($data);

            $ordre = $this->RCarteProduits->find()
                                        ->select('ordreRCarteProduit')
                                        ->where(['idRCarteCategorie' => $data['idRCarteCategorie']])
                                        ->where(['idRCarteSCategorie' => $data['idRCarteSCategorie']]);

            $ordre->select(['ordre' => $ordre->func()->max('ordreRCarteProduit')])->first();

            if (isset($data))
            {
                $produit = $this->RCarteProduits->newEntity($data);
                debug($ordre->toArray());
                foreach ($ordre as $o) {
                    $ordre = $o['ordre'];
                }
                $produit['ordreRCarteProduit'] = $ordre + 1;
                $produit['statutRCarteProduit'] = 1;

                if ($this->RCarteProduits->save($produit))
                {
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
        $title = 'Admin | Réservation';
        $this->set('title', $title);

        $produit = $this->RCarteProduits->find()
                            ->where(['idRCarteProduit' => $id])
                            ->contain(['RCarteSCategories'])
                            ->contain(['RCarteCategories'])
                            ->first();

        $this->set('produit', $produit);
    }

    public function edit($id = null)
    {
        $title = 'Admin | Modifier Produit';
        $this->set('title', $title);

        $produit = $this->RCarteProduits->find()
                            ->where(['idRCarteProduit' => $id])
                            ->contain(['RCarteSCategories'])
                            ->contain(['RCarteCategories'])
                            ->first();

        $categories = $this->RCarteProduits->RCarteCategories->find('list');

        if ($this->request->is('post')) {
            $produit = $this->RCarteProduits->patchEntity($produit, $this->request->data);
            if ($this->RCarteProduits->save($produit)) {
                $this->Flash->success(__('Le produit a été modifié.'));

                return $this->redirect(['action' => 'liste', $produit->r_carte_category->idRCarteCategorie]);
            }
            $this->Flash->error(__('Le produit n\'a pas pu être modifié.'));
        }

        $this->set('produit', $produit);
        $this->set('categories', $categories);
    }

    public function delete($id = null)
    {
        $produit = $this->RCarteProduits->find()
                            ->where(['idRCarteProduit' => $id])
                            ->first();

        if ($this->RCarteProduits->delete($produit)) {
            $this->Flash->success(__('Le produit a été supprimé.'));
        } else {
            $this->Flash->error(__('Le produit n\'a pas pu être supprimé.'));
        }

        return $this->redirect(['action' => 'liste']);
    }

    public function open($id = null, $cat = null)
    {
        $produit = $this->RCarteProduits->find()
                            ->where(['idRCarteProduit' => $id])
                            ->first();

        $produit['statutRCarteProduit'] = 1;

        if ($this->RCarteProduits->save($produit)) {
            $this->Flash->success(__('Le produit a été activé.'));
            return $this->redirect(['action' => 'liste', $cat]);
        } else {
            $this->Flash->error(__('Le produit n\'a pas pu être activé.'));
        }
    }

    public function close($id = null, $cat = null)
    {
        $produit = $this->RCarteProduits->find()
                            ->where(['idRCarteProduit' => $id])
                            ->first();

        $produit['statutRCarteProduit'] = 0;

        if ($this->RCarteProduits->save($produit)) {
            $this->Flash->success(__('Le produit a été désactivé.'));
            return $this->redirect(['action' => 'liste', $cat]);
        } else {
            $this->Flash->error(__('Le produit n\'a pas pu être désactivé.'));
        }
    }

    public function scategories()
    {
        $this->loadModel('RCarteSCategories');

        $scategories = $this->RCarteSCategories->find('list')
                                                ->where(['idRCarteCategorie' => $this->request->data['idRCarteCategorie']]);


        echo json_encode($scategories, JSON_PRETTY_PRINT);
        die();
    }
}
