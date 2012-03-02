<?php $this->getTemplateFile('header.php'); ?>

    <div id="menu">
        <?php $this->getTemplateFile('_ladders/menu.php'); ?>
    </div>

    <div id="content">
        <?php $this->getTemplateFile('_ladders/ladders.table.php'); ?>
    </div>

<?php $this->getTemplateFile('footer.php'); ?>