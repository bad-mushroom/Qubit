<?php $this->getTemplateFile('header.php'); ?>

    <div id="menu">
        <?php $this->getTemplateFile('_games/menu.php'); ?>
    </div>

    <div id="content">

        <h2><?php echo $this->page_title; ?></h2>

        <div class="split-left">
            <div class="metadata">
                <p><span class="field">Game Type:</span> <span class="value"><?php echo $this->games['gametype']; ?></span></p>
                <p><span class="field">Game Mod:</span> <span class="value"><?php echo $this->games['gamename']; ?></span></p>
                <p><span class="field">Frag Limit:</span> <span class="value"><?php echo $this->games['fraglimit']; ?></span> </p>
                <p><span class="field">Time Limit:</span> <span class="value"><?php echo $this->games['timelimit']; ?></span> </p>
                <p><span class="field">Map Name:</span> <span class="value"><?php echo $this->games['mapname']; ?></span> </p>
                <p><span class="field">Parse Time:</span> <span class="value"><?php echo date('Y-M-d, g:i a T',$this->games['parse_time']); ?></span> </p>
            </div>
        </div>

        <div class="split-right">
            <img src="/templates/global/images/maps/<?php echo $this->games['gamename_mod']; ?>/<?php echo $this->games['mapname']; ?>.jpg" class="img-map" />
        </div>

        <?php $this->getTemplateFile('_games/players.table.php'); ?>

    </div>

<?php $this->getTemplateFile('footer.php'); ?>