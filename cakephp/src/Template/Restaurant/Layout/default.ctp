<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('restaurant.min.css') ?>
    <?= $this->element('meta') ?>
    <?= $this->Html->script('restaurant.min.js') ?>
</head>
<body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PFN3WRJ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <?= $this->element('navbar') ?>
        <!-- HTML code of flash element if needed ? (use toastr.js probably way better) -->
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        <?= $this->element('footer') ?>
        <?= $this->fetch('script') ?>
</body>
</html>
