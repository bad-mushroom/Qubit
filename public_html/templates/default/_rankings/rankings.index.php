<?php $this->getTemplateFile('header.php'); ?>

    <div id="menu">
        <?php $this->getTemplateFile('_rankings/menu.php'); ?>
    </div>

    <div id="content">
        <?php $this->getTemplateFile('_rankings/rankings.table.php'); ?>
    </div>

<?php $this->getTemplateFile('footer.php'); ?>