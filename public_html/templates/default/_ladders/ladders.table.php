<h2><?php echo $this->page_title; ?></h2>

<table id="ladders_table">
<thead>
    <tr>
        <th>Place</th>
        <th>Name</th>
        <th <?php if ($this->sort == 'frags') : ?>class="highlite"<?php endif; ?>>Frags</th>
        <th <?php if ($this->sort == 'deaths') : ?>class="highlite"<?php endif; ?>>Deaths</th>
        <th <?php if ($this->sort == 'suicides') : ?>class="highlite"<?php endif; ?>>Suicides</th>
        <th <?php if ($this->sort == 'wins') : ?>class="highlite"<?php endif; ?>>Wins</th>
    </tr>
</thead>
<tbody>
<?php if (count($this->ladders) != 0) : $place = 1; ?>
    <?php foreach ($this->ladders as $ladder) : ?>
    <?php if ($place < 10 + 1) : ?>
    <tr>
        <td>
            <?php echo $place; ?>
        </td>
        <td>
            <a href='/stats/players/view/<?php echo models_scores_players::formatName($ladder['name']);?>'>
            <?php echo models_scores_players::formatName($ladder['name']); ?></a>
        </td>
        <td <?php if ($this->sort == 'frags') : ?>class="highlite"<?php endif; ?>>
            <?php echo $ladder['total_frags']; ?>
        </td>
        <td <?php if ($this->sort == 'deaths') : ?>class="highlite"<?php endif; ?>>
            <?php echo $ladder['total_deaths']; ?>
        </td>
        <td <?php if ($this->sort == 'suicides') : ?>class="highlite"<?php endif; ?>>
            <?php echo $ladder['total_suicides']; ?>
        </td>
        <td <?php if ($this->sort == 'wins') : ?>class="highlite"<?php endif; ?>>
            <?php// echo $ladder['total_wins']; ?>
        </td>
    </tr>
    <?php endif; ?>
    <?php $place++; endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="5">No ladders to display</td>
    </tr>
<?php endif; ?>
</tbody>
</table>