<div class="users view large-10 medium-9 columns content">
    <h1>Login</h1>

    <?= $this->Form->create('Administrateurs', ['class' => 'form-group']) ?>
    <?= $this->Form->control('emailAdmin', ['label' => 'Email', 'type' => 'text', 'class' => 'form-control']) ?>
    <?= $this->Form->control('passwordAdmin', ['label' => 'Mot de passe', 'type' => 'password', 'class' => 'form-control']) ?>
    <?= $this->Form->button('Connexion', array('class' => 'btn btn-primary btn-block btn-flat')) ?>
    <?= $this->Form->end() ?>
</div>
