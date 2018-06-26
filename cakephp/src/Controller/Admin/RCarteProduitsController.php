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
                            ->where(['statutRCarteCategorie' => 1])
                            ->order('sectionRCarteCategorie, ordreRCarteCategorie');

        $this->set('categories', $categories);
        $this->set('cat', $id);
    }

    public function add()
    {
        $title = 'Admin | Ajout Produit';
        $this->set('title', $title);

        $this->loadModel('RCarteCategories');

        $categories = $this->RCarteProduits->RCarteCategories->find('list');
        $this->set('categories', $categories);

        if ($this->request->is('post')) {

            $data = $this->request->data;

            if ($data['deRCarteProduit']) {
                list($day, $month, $year) = explode('/', $data['deRCarteProduit']);
                $data['deRCarteProduit'] = $year . '-' . $month . '-' . $day;
            }
            if ($data['aRCarteProduit']) {
                list($day, $month, $year) = explode('/', $data['aRCarteProduit']);
                $data['aRCarteProduit'] = $year . '-' . $month . '-' . $day;
            }

            $categorie = $this->RCarteProduits->RCarteCategories->find()
                                                                ->contain('RCarteSCategories')
                                                                ->where(['idRCarteCategorie' => $data['idRCarteCategorie']]);
            if (isset($categorie->r_carte_s_categories)) {
                $ordre = $this->RCarteProduits->find()
                                            ->select('ordreRCarteProduit')
                                            ->where(['idRCarteCategorie' => $data['idRCarteCategorie']])
                                            ->where(['idRCarteSCategorie' => $data['idRCarteSCategorie']]);
            }
            else {
                $ordre = $this->RCarteProduits->find()
                                            ->select('ordreRCarteProduit')
                                            ->where(['idRCarteCategorie' => $data['idRCarteCategorie']]);

            }

            $ordre->select(['ordre' => $ordre->func()->max('ordreRCarteProduit')])->first();

            if (isset($data))
            {
                $produit = $this->RCarteProduits->newEntity($data);
                foreach ($ordre as $o) {
                    $ordre = $o['ordre'];
                }
                $produit['ordreRCarteProduit'] = $ordre + 1;
                $produit['statutRCarteProduit'] = 1;

                if ($this->RCarteProduits->save($produit))
                {
                    return $this->redirect(['action' => 'liste', $produit->idRCarteCategorie]);
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

            $data = $this->request->data;

            if ($data['deRCarteProduit'] != '') {
                list($day, $month, $year) = explode('/', $data['deRCarteProduit']);
                $data['deRCarteProduit'] = $year . '-' . $month . '-' . $day;
            }
            else {
                $data['deRCarteProduit'] = NULL;
            }
            if ($data['aRCarteProduit'] != '') {
                list($day, $month, $year) = explode('/', $data['aRCarteProduit']);
                $data['aRCarteProduit'] = $year . '-' . $month . '-' . $day;
            }
            else {
                $data['aRCarteProduit'] = NULL;
            }

            $produit = $this->RCarteProduits->patchEntity($produit, $data);

            if ($this->RCarteProduits->save($produit)) {
                $this->Flash->success(__('Le produit a été modifié.'));

                // return $this->redirect(['action' => 'liste', $produit->r_carte_category->idRCarteCategorie]);
            }
            else { $this->Flash->error(__('Le produit n\'a pas pu être modifié.')); }
        }

        $this->set('produit', $produit);
        $this->set('categories', $categories);
    }

    public function delete($id = null)
    {
        $produit = $this->RCarteProduits->find()
                            ->contain('RCarteCategories')
                            ->where(['idRCarteProduit' => $id])
                            ->first();

        if ($this->RCarteProduits->delete($produit)) {
            $this->Flash->success(__('Le produit a été supprimé.'));
        } else {
            $this->Flash->error(__('Le produit n\'a pas pu être supprimé.'));
        }

        return $this->redirect(['action' => 'liste', $produit->r_carte_category->idRCarteCategorie]);
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

    public function addcsv()
    {
        $title = 'Admin | Ajout Produit CSV';
        $this->set('title', $title);

        $cat = $this->RCarteProduits->RCarteCategories->find()
                                                    ->contain('RCarteSCategories');
        // $scat = $this->RCarteProduits->RCarteSCategories->find('list');

        $this->set('cat', $cat);
        // $this->set('scat', $scat);

        if (isset($this->request->data['confirm'])) {
            $data = $this->request->data;

            if (substr(strtolower(strrchr($data['CSV']['name'], '.')), 1) == 'csv') {
                $handle = fopen($data['CSV']['tmp_name'], "r");

                // $filename = 'animateurs_' . $session_id . '_' . date('YmdHi');

                // $chemin = ROOT . '/app/View/Reports/files/animateurs/'. $filename .'.csv';

                //          move_uploaded_file($data['CSV']['tmp_name'], $chemin);

                $row = 0;
                $csv = array();

                while (($donnees = fgetcsv($handle, $data['CSV']['size'], ';')) !== false) {
                    $donnees[$row] = array_map("utf8_encode", $donnees);
                    array_push($csv, $donnees[$row]);

                    $row++;
                }

                array_shift($csv);
                $this->set('csv', $csv);

                fclose($handle);
            } else {
                $this->Flash->error(__("Il ne s'agit pas d'un fichier CSV."));
            }
        }

        if (isset($this->request->data['valid'])) {
            $message = '';
            $valid = true;

            $data = $this->request->data;

            foreach ($data['nomRCarteProduit'] as $produit => $value) {
                $patch = [];

                // Nom
                $patch['nomRCarteProduit'] = $data['nomRCarteProduit'][$produit];

                // Catégorie
                $categorie = $this->RCarteProduits->RCarteCategories->find()
                                                        ->select('idRCarteCategorie')
                                                        ->contain('RCarteSCategories')
                                                        ->where(['nomRCarteCategorie' => $data['catRCarteProduit'][$produit]])
                                                        ->first();
                $patch['idRCarteCategorie'] = $categorie->idRCarteCategorie;
                
                // Sous-catégorie
                if (($data['scatRCarteProduit'][$produit]) != '') {
                    $scategorie = $this->RCarteProduits->RCarteSCategories->find()
                                                                        ->select('idRCarteSCategorie')
                                                                        ->where(['nomRCarteSCategorie' => $data['scatRCarteProduit'][$produit]])
                                                                        ->where(['idRCarteCategorie' => $categorie->idRCarteCategorie])
                                                                        ->first();
                    $patch['idRCarteSCategorie'] = $scategorie->idRCarteSCategorie;
                }

                // Prix
                $patch['prixRCarteProduit'] = $data['prixRCarteProduit'][$produit];

                // Prix achat
                $patch['prixAchatRCarteProduit'] = $data['prixAchatRCarteProduit'][$produit];

                // De
                $patch['deRCarteProduit'] = $data['deRCarteProduit'][$produit];

                // A
                $patch['aRCarteProduit'] = $data['aRCarteProduit'][$produit];

                // Ordre
                if (($data['scatRCarteProduit'][$produit]) != '') {
                    $ordre = $this->RCarteProduits->find()
                                                ->select('ordreRCarteProduit')
                                                ->where(['idRCarteCategorie' => $categorie->idRCarteCategorie])
                                                ->where(['idRCarteSCategorie' => $scategorie->idRCarteSCategorie]);
                }
                else {
                    $ordre = $this->RCarteProduits->find()
                                                ->select('ordreRCarteProduit')
                                                ->where(['idRCarteCategorie' => $categorie->idRCarteCategorie]);

                }
                $ordre->select(['ordre' => $ordre->func()->max('ordreRCarteProduit')])->first();

                foreach ($ordre as $o) {
                    $ordre = $o['ordre'];
                }
                $patch['ordreRCarteProduit'] = $ordre +1;

                // Statut
                $patch['statutRCarteProduit'] = 1;

                // Description
                $patch['descriptionRCarteProduit'] = $data['descriptionRCarteProduit'][$produit];

                // Entity
                $prod = $this->RCarteProduits->newEntity($patch);
                $this->RCarteProduits->save($prod);
            }
        }
    }
                // if (!$this->RCarteProduit->validates()) {
                //     $valid = false;
                //     $message .= $data['nomRCarteProduit'] . ' ' . $data['prenomRCarteProduit'] . ' - ' . $data['email'] . '<br/>';
                // }
            // }

            // if ($valid) {
            //     foreach ($data['nomRCarteProduit'] as $produit => $value) {
            //         $data['nomRCarteProduit'] = $data['nomRCarteProduit'][$produit];

            //         $this->RCarteProduit->create();
            //         $this->RCarteProduit->set($data);
            //         if ($this->RCarteProduit->validates()) {
            //             $this->RCarteProduit->save();
            //             App::import('controller', 'etats_utilisateurs');
            //             $etats = new EtatsUtilisateursController();
            //             $new_utilisateur_id = $this->RCarteProduit->id;
            //             $etats->addEtat($new_utilisateur_id);

            //             $message .= $this->RCarteProduit->id . ' - ' . $data['nomRCarteProduit'] . ' ' . $data['prenomRCarteProduit'] . ' - ' . $data['email'] . '<br/>';
            //         } else {
            //             $error = $this->RCarteProduit->validationErrors;
            //             if (isset($error['email']) && $error['email'][0] == "format") {
            //                 $this->Flash->error(__("Veuillez vérifier le format de l'adresse email renseignée."), 'flash_failure');
            //             }
            //         }
            //     }

        //



    public function categoriescsv()
    {
        $this->loadModel('RCarteCategories');

        $categories = $this->RCarteCategories->find('list');

        echo json_encode($categories, JSON_PRETTY_PRINT);
        die();
    }

    public function scategoriescsv()
    {
        $this->loadModel('RCarteSCategories');

        $scategories = $this->RCarteSCategories->find('list');

        echo json_encode($scategories, JSON_PRETTY_PRINT);
        die();
    }
}
