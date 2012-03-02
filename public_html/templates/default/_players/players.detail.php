<?php $this->getTemplateFile('header.php'); ?>

    <div id="menu">
        <?php $this->getTemplateFile('_players/menu.php'); ?>
    </div>

    <div id="content">
        <h2><?php echo $this->page_title; ?></h2>

        <div class="split-left">
            <div class="metadata">
                <p><span class="field">Name:</span> <span class="value"><?php echo $this->player['name']; ?></span></p>
                <p><span class="field">Total Frags:</span> <span class="value"><?php echo $this->player['total_frags']; ?></span> </p>
                <p><span class="field">Total Deaths:</span> <span class="value"><?php echo $this->player['total_deaths']; ?></span> </p>
                <p><span class="field">Total Games:</span> <span class="value"><?php echo $this->player['total_games']; ?></span> </p>
               </div>
        </div>

        <div class="split-right">
            <?php if (models_meta_images::checkModelImage($this->player['model']) === TRUE) : ?>
                <img src="/templates/global/images/models/icons/<?php echo strtolower($this->player['model']); ?>_default.png" class="img-model-icon" />
            <?php endif; ?>
        </div>

        <h2>Games Played</h2>
        <?php $this->getTemplateFile('_games/games.table.php'); ?>

    </div>

<?php $this->getTemplateFile('footer.php'); ?>