<div class="">
    <h1>Login</h1>

    <?= $this->Form->create('Administrateurs', ['class' => 'form-group col-lg-6']) ?>
    <?= $this->Form->control('emailAdmin', ['label' => 'Email', 'type' => 'text', 'class' => 'form-control']) ?>
    <?= $this->Form->control('passwordAdmin', ['label' => 'Mot de passe', 'type' => 'password', 'class' => 'form-control']) ?>
    <?= $this->Form->button('Connexion', array('class' => 'btn btn-primary btn-block btn-flat margin-top')) ?>
    <?= $this->Form->end() ?>
</div>
