<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validator;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function initialize()
    {
        parent::initialize();
    }

    public function signUp()
    {
        if ($this->request->is('post'))
        {
            $user = $this->Users->newEntity();

            $user = $this->Users->patchEntity($user, $this->request->data);

            $this->Users->save($user);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'view/'.$user->idUser]);
            }
            else if (!$this->Users->save($user)) {
                $this->Flash->error(__('Missing elements'));
            }
        }
    }

    public function add()
    {
        $data = $this->request->data;

        if ($this->request->is('post'))
        {
            $user = $this->Users->newEntity();

            $user = $this->Users->patchEntity($user, $data);

            debug($user);

            $this->Users->save($user);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                if(!empty($data['photoUser']))
                {
                    $file = $data;

                    $ext = substr(strtolower(strrchr($file['photoUser']['name'], '.')), 1);
                    $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

                    if(in_array($ext, $arr_ext))
                    {
                        if(move_uploaded_file($file['photoUser']['tmp_name'], WWW_ROOT . 'img\photoUser\\' . $file['photoUser']['name']))
                        {
                            $user->photoUser = $data['photoUser']['name'];

                            if ($this->Users->save($user))
                            {
                                $this->Flash->success(__('La photo a bien été enregistrée.'));

                                $session = $this->request->session();
                                $session->write('Auth.User.photoUser', $data['photoUser']['name']);

                                return $this->redirect(['action' => 'view/'.$user->idUser]);
                            }
                            else { $this->Flash->error(__('La photo n\'a pas pu être enregistrée.')); }
                        }
                    }
                    else { $this->Flash->error(__('Selectionner une photo.')); }
                }               

                return $this->redirect(['action' => 'view/'.$user->idUser]);
            }
            else if (!$this->Users->save($user)) {
                $this->Flash->error(__('Missing elements'));
            }
        }
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);

                $this->Flash->success(__('Vous êtes connecté.'));

                return $this->redirect($this->Auth->redirectUrl());
            }
            else $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
        }
    }

    public function logout()
    {
        $this->Flash->success('Vous avez été déconnecté.');
        return $this->redirect($this->Auth->logout());
    }

    public function JSON()
    {
        $users = $this->Users->find();

        // echo json_encode($users, JSON_PRETTY_PRINT);

        $i = 0;

        echo "{\"data\": [";
        foreach ($users as $user)
        {
          if($i != 0) echo ",";
          echo "[\"". $user['idUser'] ."\",";
          echo "\"". $user['nomUser'] ."\",";
          echo "\"". $user['prenomUser'] ."\",";
          echo "\"". $user['emailUser'] ."\",";
          if(!empty($user['telephoneUser'])) echo "\"". $user['telephoneUser'] ."\",";
          else echo "\"NR\",";
          if(!empty($user['adresse1User'])) echo "\"". $user['adresse1User'] ." ". $user['adresse2User'] ." ". $user['cpUser'] ." ". $user['villeUser'] ."\",";
          else echo "\"NR\",";
          if(!empty($user['dateNaissUser'])) echo "\"". date('d / m / Y', strtotime($user['dateNaissUser'])) ."\",";
          else echo "\"NR\",";
          echo "\"<a href='view/". $user['idUser'] ."'>   <i class='fa fa-eye'></i> </a> <a href='edit/". $user['idUser'] ."'>  <i class='fa fa-edit'></i> </a> <a href='delete/". $user['idUser'] ."'>  <i class='fa fa-times'></i> </a>\"]";
          $i++;
        }
        echo "]}";

        die();
    }

    public function list()
    {
        $users = $this->Users->find();

        $this->set('users', $users);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->find()
                            ->where(['idUser' => $id])
                            ->first();                            

        $this->set('user', $user);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function changePhoto($id = null)
    {
        $user = $this->Users->find()
                            ->where(['idUser' => $id])
                            ->first();

        $this->set('user', $user);

        if ($this->request->is(['post']))
        {
            $data = $this->request->getData();

            if(!empty($data['photoUser']))
            {
                $file = $data;

                $ext = substr(strtolower(strrchr($file['photoUser']['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

                if(in_array($ext, $arr_ext))
                {
                    if(move_uploaded_file($file['photoUser']['tmp_name'], WWW_ROOT . 'img\photoUser\\' . $file['photoUser']['name']))
                    {
                        $user->photoUser = $data['photoUser']['name'];

                        if ($this->Users->save($user))
                        {
                            $this->Flash->success(__('La photo a bien été enregistrée.'));

                            $session = $this->request->session();
                            $session->write('Auth.User.photoUser', $data['photoUser']['name']);

                            return $this->redirect(['action' => 'view/'.$user->idUser]);
                        }
                        else { $this->Flash->error(__('La photo n\'a pas pu être enregistrée.')); }
                    }
                }
                else { $this->Flash->error(__('Selectionner une photo.')); }
            }                
        }
    }
}
