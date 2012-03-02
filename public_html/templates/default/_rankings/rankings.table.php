<h2>Players</h2>

<table id="players_table" class="tablesorter">
<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Model</th>
        <th>Bot</th>
    </tr>
</thead>
<tbody>
<?php if (count($this->players) != 0) : ?>
    <?php foreach ($this->players as $player) : ?>

    <tr>
        <td><?php echo $player[5]; ?></td>
        <td><a href='/stats/players/view/<?php echo $player[2];?>'><?php echo $player[2]; ?></a></td>
        <td><?php echo $player[3]; ?></td>
        <td><?php echo $player[4]; ?></td>
    </tr>

    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="4">No players to display</td>
    </tr>
<?php endif; ?>
</tbody>
</table>