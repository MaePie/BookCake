<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\View\Helper\FlashHelper;
use Cake\Mailer\Email;

class AdministrateursController extends AppController
{

    public function index() {
        $title = 'Admin | Home';
        $this->set('title', $title);
    }

    public function login() {
        $title = 'Admin | Login';
        $this->set('title', $title);

        if ($this->request->is('post')) {
            $admin = $this->Auth->identify();

            if ($admin) {
                $this->Auth->setUser($admin);

                $this->Flash->success(__('Vous êtes connecté.'));

                if ($this->Auth->redirectUrl() == '/')
                    return $this->redirect(['controller' => 'pages', 'action' => 'index']);
                
                return $this->redirect($this->Auth->redirectUrl());
            }
            else $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
        }
    }

    public function logout() {
        $this->Flash->success('Vous avez été déconnecté.');
        return $this->redirect($this->Auth->logout());
    }

    public function add() {
        $title = 'Admin | Add';
        $this->set('title', $title);

        if ($this->request->is('post')) {
            $admin = $this->Administrateurs->newEntity();
            debug($this->request->data);
            $admin = $this->Administrateurs->patchEntity($admin, $this->request->data);
			
            if ($this->Administrateurs->save($admin)) {
                $this->Flash->success(__('L\'administrateur a bien été enregistrée.'));

                return $this->redirect(['action' => 'login']);
            }
            else if (!$this->Rres->save($res)) {
                $this->Flash->error(__('Eléments manquants'));
            }
        }
    }
}
