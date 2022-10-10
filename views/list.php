<!DOCTYPE html>
<html lang="fr-ca">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="inc/css/global.css" />
        <title>Liste des parties</title>
    </head>

    <body>
        <?php require(__DIR__ . '/header.html'); ?>
		
		<main>
			<h1>Liste des parties</h1>

			<table>
				<thead>
					<tr>
						<th>Date</th>
						<th>Équipe adverse</th>
						<th>Pointage Montréal</th>
						<th>Pointage adverse</th>
					</tr>
				</thead>

				<tbody id="game_table_body">
				<?php foreach($gameObjects as $game) { ?>
					
					<tr>
						<td> <?= $game->get_date(); ?> </td>
						<td> <?= $game->get_opponent_name(); ?> </td>
						<td> <?= $game->get_montreal_score(); ?> </td>
						<td> <?= $game->get_opponent_score(); ?> </td>
				</tr>

					<?php } ?>
				</tbody>
			</table>
		</main>
		
		<?php require(__DIR__ . '/footer.html'); ?>
    </body>
</html>