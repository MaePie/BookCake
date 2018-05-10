<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?= $this->Url->build('/')?>" class="site_title"><span><?php echo isset($theme['title']) ? $theme['title'] : 'Au fil de l\'eau'; ?></span></a>
        </div>

        <div class="clearfix"></div>



        <!-- Sidebar user panel -->
        <?php echo $this->element('aside/user-panel'); ?>

        <br />
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php echo $this->element('aside/sidebar-menu'); ?>



        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php echo $this->element('aside/footer-buttons'); ?>
    </div>
</div>