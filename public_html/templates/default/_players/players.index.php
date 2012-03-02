<?php $this->getTemplateFile('header.php'); ?>

    <div id="menu">
        <?php $this->getTemplateFile('_players/menu.php'); ?>
    </div>

    <div id="content">
        <?php $this->getTemplateFile('_players/players.table.php'); ?>
    </div>

<?php $this->getTemplateFile('footer.php'); ?>