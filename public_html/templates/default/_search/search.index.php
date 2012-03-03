<?php $this->getTemplateFile('header.php'); ?>

    <div id="menu">
        <?php $this->getTemplateFile('_search/menu.php'); ?>
    </div>

    <div id="content">
        <h2><?php echo $this->page_title; ?></h2>
        <?php $this->getTemplateFile($this->table); ?>
    </div>

<?php $this->getTemplateFile('footer.php'); ?>