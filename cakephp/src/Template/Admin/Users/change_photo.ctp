<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

    $this->layout = 'default';
?>


<h3><?= __($user->nomUser).' '.__($user->prenomUser) ?></h3>
<img class="img-rounded" src="<?= WWW_ROOT . 'img/photoUser/' . $user->photoUser ?>">
 <form method="post" class="inline-form" enctype="multipart/form-data">
    <div class="form-group">
        <div>
            <legend>Changer sa photo</legend>
            <input class="form-control" name="photoUser" type="file"></input>
        </div>
    </div>

    <div>    
        <button class="btn btn-primary" type="submit">Valider</button>
    </div>
</form>