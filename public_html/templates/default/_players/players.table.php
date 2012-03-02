<h2>Players</h2>

<table id="players_table" class="tablesorter">
<thead>
    <tr>
        <th><span class="sort">Name</span></th>
        <th><span class="sort">Model</span></th>
        <th><span class="sort">Bot</span></th>
    </tr>
</thead>
<tbody>
<?php if (count($this->players) != 0) : ?>
    <?php foreach ($this->players as $player) : ?>

    <tr>
        <td><a href='/stats/players/view/<?php echo models_scores_players::formatName($player['name']);?>'><?php echo models_scores_players::formatName($player['name']); ?></a></td>
        <td><?php echo $player['model']; ?></td>
        <td><?php echo $player['is_bot']; ?></td>
    </tr>

    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="3">No players to display</td>
    </tr>
<?php endif; ?>
</tbody>
</table>

<?php $this->getTemplateFile('table.pager.php'); ?>