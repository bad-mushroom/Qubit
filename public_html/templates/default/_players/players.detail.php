<?php $this->getTemplateFile('header.php'); ?>

    <div id="navigation">
        <?php $this->getTemplateFile('_players/menu.php'); ?>
    </div>

    <div id="content">
        <h2><?php echo $this->page_title; ?></h2>
    </div>

<?php $this->getTemplateFile('footer.php'); ?>