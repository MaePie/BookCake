<?php
namespace App\Controller;

use Cake\Mailer\Email;

class MailController
{
    public function signUp()
    {
        $email = new Email('default');
        $email->from(['me@example.com' => 'My Site'])
            ->to('mael.mayon@free.fr')
            ->subject('About')
            ->send('My message');
    }

}
