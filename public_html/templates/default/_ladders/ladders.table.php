<h2><?php echo $this->page_title; ?></h2>

<table id="ladders_table" class="tablesorter">
<thead>
    <tr>
        <th>Place</th>
        <th><span class="sort">Name</span></th>
        <th><span class="sort">Frags</span></th>
        <th><span class="sort">Deaths</span></th>
        <th><span class="sort">Suicides</span></th>
        <th><span class="sort">Wins</span></th>
    </tr>
</thead>
<tbody>
<?php if (count($this->ladders) != 0) : $place = 1; ?>
    <?php foreach ($this->ladders as $ladder) : ?>

    <tr>
        <td><?php echo $place; ?></td>
        <td><a href='/stats/players/view/<?php echo models_scores_players::formatName($ladder['name']);?>'><?php echo models_scores_players::formatName($ladder['name']); ?></a></td>
        <td><?php echo $ladder['total_frags']; ?></td>
        <td><?php echo $ladder['total_deaths']; ?></td>
        <td><?php echo $ladder['total_suicides']; ?></td>
        <td></td>
    </tr>

    <?php $place++; endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="5">No ladders to display</td>
    </tr>
<?php endif; ?>
</tbody>
</table>