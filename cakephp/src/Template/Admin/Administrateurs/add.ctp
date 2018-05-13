<h3><?= __('Ajouter un administrateur') ?></h3>

<?= $this->Form->create('Administrateurs', ['class' => 'form-group col-lg-6']) ?>
<?= $this->Form->control('emailAdmin', ['label' => 'Email *', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('passwordAdmin', ['label' => 'Mot de passe *', 'type' => 'password', 'class' => 'form-control']) ?>
<?= $this->Form->control('nomAdmin', ['label' => 'Nom *', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('Ajouter', ['label' => false, 'type' => 'submit', 'class' => 'btn btn-primary btn-block btn-flat margin-top']) ?>
<?= $this->Form->end() ?>
