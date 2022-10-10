<!DOCTYPE html>
<html lang="fr-ca">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="inc/css/global.css" />
        <title>Modifier ou supprimer une partie</title>
    </head>

    <body>
        <?php require(__DIR__ . '/header.html'); ?>
		
		<main>
			<h1>Modifier ou supprimer une partie</h1>

			<form action="index.php?action=edit" method="post">
				<p>
					<label for="date_input">Date : </label>
					<select id="date_input" name="date">
						<?php
							foreach ($dateList as $date)
								echo '<option value="' . $date . '" ' . ($date === $game['date'] ? 'selected' : '') . ' >' . $date . '</option>';
						?>
					</select>
				</p>

				<p>
					<label for="opponent_input">Adversaire : </label>
					<select id="opponent_input" name="opponent_code">
						<?php
							foreach ($opponentsObjArray as $opponentObj)
								echo '<option value="' . $opponentObj->get_code() . '"' . ($opponentObj->get_code() === $gameObj->get_id() ? 'selected' : '') . '>' . $opponentObj->get_name() . '</option>';
						?>
					</select>
				</p>

				<p> Pointage (Montréal - Adversaire) : </p>
				<div class="flexColEquipeAdd">
					<input type="number" name="pointage_local" value='<?= $gameObj->get_montreal_score() ?>' id="pointage_local" min="0" required />
					<span>-</span>
					<input type="number" name="pointage_adversaire" id="pointage_adversaire" value='<?= $gameObj->get_opponent_score() ?>' placeholder="0" min="0" required/>
				</div>

				<input type="hidden" name="id" value="<?= $gameObj->get_id(); ?>" />
				<input type="submit" name="submit" value="Valider" />
				
				<p>
					<a href="index.php?action=delete&id=<?= $gameObj->get_id() ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette partie?')">Supprimer la partie</a>
				</p>
			</form>
        </main>
        
		<?php require(__DIR__ . '/footer.html'); ?>
    </body>
</html>