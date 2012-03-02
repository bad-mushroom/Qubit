<table id="games_table" class="tablesorter">
    <thead>
        <tr>
            <th><span class="sort">Game</span></th>
            <!--<th><span class="sort">Parse Time</span></th>-->
            <th><span class="sort">Server Name</span></th>
            <th><span class="sort">Frag Limit</span></th>
            <th><span class="sort">Time Limit</span></th>
            <th><span class="sort">Map Name</span></th>
            <!--<th><span class="sort">Version</span></th>-->
            <th><span class="sort">Game Type</span></th>
            <th><span class="sort">Mod</span></th>
        </tr>
    </thead>

    <tbody>
    <?php if (count($this->games) != 0) : ?>
        <?php foreach ($this->games as $game) : ?>
        <?php if (class_exists('assets_mods_' . $game['gamename']) !== FALSE) : $class = 'assets_mods_'.$game['gamename']; ?>
        <?php $mod = new $class(); ?>
        <?php $game['gametype'] = $mod->getGameType($game['gametype']); ?>
        <?php $game['gamename'] = $mod->getModName(); ?>
        <?php endif; ?>

        <tr>
            <td><a href='/stats/games/view/<?php echo $game['id'];?>'><?php echo $game['id']; ?></a></td>
            <!--<td><?php echo date('Y-M-d, g:i a T',$game['parse_time']); ?></td>-->
            <td><?php echo $game['hostname']; ?></td>
            <td><?php echo $game['fraglimit']; ?></td>
            <td><?php echo $game['timelimit']; ?></td>
            <td><?php echo $game['mapname']; ?></td>
            <!--<td><?php  echo $game['version']; ?></td>-->
            <td><?php echo $game['gametype']; ?></td>
            <td><?php echo $game['gamename']; ?></td>
        </tr>

        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="9">No games to display</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<?php $this->getTemplateFile('table.pager.php'); ?>