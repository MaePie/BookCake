<!-- menu profile quick info -->
<div class="profile">
    <div class="profile_pic">
        <?php echo $this->Html->image('photoUser/user.png',['class'=>'img-circle profile_img'])?>
    </div>
    <div class="profile_info">
        <h2><?= $this->request->session()->read('Auth.User.nomAdmin') ?></h2>
    </div>
</div>
<!-- /menu profile quick info -->