<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\View\Helper\FlashHelper;
use Cake\Mailer\Email;

class AdminController extends AppController
{

    public function index() {
        $title = 'Admin - Home';
        $this->set('title', $title);
    }

    public function login() {
        $title = 'Admin - Login';
        $this->set('title', $title);
    }
}
