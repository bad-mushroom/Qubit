<h2><?php echo $this->page_title; ?></h2>

<table id="players_table" class="tablesorter">
<thead>
    <tr>
        <th><span class="sort">Name</span></th>
        <th><span class="sort">Frags</span></th>
        <th><span class="sort">Deaths</span></th>
        <th><span class="sort">Suicides</span></th>
        <th><span class="sort">Wins</span></th>
    </tr>
</thead>
<tbody>
<?php if (count($this->ladders) != 0) : ?>
    <?php foreach ($this->ladders as $ladder) : ?>

    <tr>
        <td><?php echo $ladder[5]; ?></td>
        <td><a href='/stats/players/view/<?php echo models_scores_players::formatName($ladder[2]);?>'><?php echo models_scores_players::formatName($ladder[2]); ?></a></td>
        <td><?php echo $ladder[3]; ?></td>
        <td><?php echo $ladder[4]; ?></td>
        <td><?php echo $ladder[4]; ?></td>
    </tr>

    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="5">No rankings to display</td>
    </tr>
<?php endif; ?>
</tbody>
</table>