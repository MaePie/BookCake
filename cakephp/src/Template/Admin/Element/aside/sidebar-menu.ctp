    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="margin-top: 75px">
        <div class="menu_section">
            <h3>Restaurant</h3>
            <ul class="nav side-menu">
                <li><a href="/admin/pages/index"><i class="fa fa-home"></i> Home</a></li>
                <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><?= $this->Html->Link('Vue globale', ['controller' => 'prospects', 'action' => 'list']) ?></li>
                        <li><?= $this->Html->Link('Ajouter un utilisateur', ['controller' => 'prospects', 'action' => 'add']) ?></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-calendar"></i> Réservations <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><?= $this->Html->Link('Vue globale', ['controller' => 'rres', 'action' => 'fullList', date('m')]) ?></li>
                        <li><?= $this->Html->Link('Vue du jour', ['controller' => 'rres', 'action' => 'dayList', date('Y-m-d')]) ?></li>
                        <li><?= $this->Html->Link('Ajouter une réservation', ['controller' => 'rres', 'action' => 'add']) ?></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="menu_section">
            <h3>Carte</h3>
            <ul class="nav side-menu">
                <li><a><i class="fa fa-th-list"></i> Catégorie <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    </ul>
                </li>
                <li><a><i class="fa fa-shopping-cart"></i> Produits <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    </ul>
                </li>
                <!-- <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/pages/#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li class="sub_menu"><a href="/pages/level2">Level Two</a>
                                </li>
                                <li><a href="/pages/#level2_1">Level Two</a>
                                </li>
                                <li><a href="/pages/#level2_2">Level Two</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/pages/#level1_2">Level One</a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </div>

    </div>
    <!-- /sidebar menu -->