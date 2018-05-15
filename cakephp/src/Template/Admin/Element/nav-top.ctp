<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <?php if ($this->request->session()->read('Auth.User.nomAdmin')) : ?>
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->request->session()) : ?>
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <?php echo $this->Html->image('photoUser/user.png')?>
                                <?php
                                    if ($this->request->session()->read('Auth.User.nomAdmin') !== 'NULL') {
                                        echo $this->request->session()->read('Auth.User.nomAdmin');
                                    }
                                ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?= $this->Url->build(['controller'=>'administrateurs','action'=>'profile'])?>"> <?php __('Profil')?></a></li>
                                <!-- <li>
                                    <a href="<?= $this->Url->build(['controller'=>'users','action'=>'settins'])?>">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span><?= __('Settings')?></span>
                                    </a>
                                </li>
                                <li><a href="<?= $this->Url->build(['controller'=>'faqs','action'=>'index'])?>"><?= __('Help')?></a></li> -->
                                <li><a href="<?= $this->Url->build(['controller'=>'administrateurs','action'=>'logout'])?>"><i class="fa fa-sign-out pull-right"></i> <?= __('Se déconnecter')?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <li role="presentation" class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-green">0</span>
                        </a>
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                            <!--<li>
                                <a>
                                    <span class="image"><?php echo $this->Html->image('Gentelella./images/img.jpg')?></span>
                                    <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="image"><?php echo $this->Html->image('Gentelella./images/img.jpg')?></span>
                                    <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="image"><?php echo $this->Html->image('Gentelella./images/img.jpg')?></span>
                                    <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                </a>
                            </li>
                            
                            <li>
                                <div class="text-center">
                                    <a>
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>-->
                </ul>
            <?php endif; ?>
        </nav>
    </div>
</div>
<!-- /top navigation -->