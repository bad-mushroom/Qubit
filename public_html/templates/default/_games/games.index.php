<?php $this->getTemplateFile('header.php'); ?>

    <div id="menu">
        <?php $this->getTemplateFile('_games/menu.php'); ?>
    </div>

    <div id="content">
        <h2><?php echo $this->page_title; ?></h2>
        <?php $this->getTemplateFile('_games/games.table.php'); ?>
    </div>

<?php $this->getTemplateFile('footer.php'); ?>