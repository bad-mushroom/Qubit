<?php $this->getTemplateFile('header.php'); ?>

    <div id="navigation">
        <?php $this->getTemplateFile('_games/menu.php'); ?>
    </div>

    <div id="content">

        <h2><?php echo $this->page_title; ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Game</th>
                    <th>Parse Time</th>
                    <th>Server Name</th>
                    <th>Frag Limit</th>
                    <th>Time Limit</th>
                    <th>Map Name</th>
                    <th>Version</th>
                    <th>Game Type</th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($this->games) != 0) : ?>
                <?php foreach ($this->games as $game) : ?>

                <tr>
                    <td><a href='/stats/games/view/<?php echo $game[0];?>'><?php echo $game[0]; ?></a></td>
                    <td><?php echo $game[1]; ?></td>
                    <td><?php echo $game[2]; ?></td>
                    <td><?php echo $game[3]; ?></td>
                    <td><?php echo $game[4]; ?></td>
                    <td><?php echo $game[5]; ?></td>
                    <td><?php echo $game[6]; ?></td>
                    <td><?php echo $game[7]; ?></td>
                </tr>

                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8">No games to display</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
<?php $this->getTemplateFile('_players/players.table.php'); ?>
    </div>

<?php $this->getTemplateFile('footer.php'); ?>