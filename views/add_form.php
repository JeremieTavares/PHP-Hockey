<!DOCTYPE html>
<html lang="fr-ca">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="inc/css/global.css" />
        <title>Ajouter une partie</title>
    </head>

    <body>
        <?php require(__DIR__ . '/header.html'); ?>
		
		<main>
			<h1>Ajouter une partie</h1>

			<form action="index.php?action=add" method="post">
				<p>
					<label for="date_input">Date : </label>
					<select id="date_input" name="date">
						<?php
							foreach ($dateList as $date)
								echo '<option value="' . $date . '">' . $date . '</option>';
						?>
					</select>
				</p>
				
				<p>
					<label for="opponent_input">Adversaire : </label>
					<select id="opponent_input" name="opponent_code">
						<?php
							foreach ($opponentsObjArray as $opponentObj)
								echo '<option value="' . $opponentObj->get_code() . '">' . $opponentObj->get_name() . '</option>';
						?>
					</select>
				</p>

				<p> Pointage (Montréal - Adversaire) : </p>
				<div class="flexColEquipeAdd">
					<input type="number" name="pointage_local" id="pointage_local" placeholder="0" min="0" required />
					<span>-</span>
					<input type="number" name="pointage_adversaire" id="pointage_adversaire" placeholder="0" min="0" required/>
				</div>
				<p>
					<input type="submit" name="submit" value="Valider"/>
				</p>      
			</form>
		</main>
		
		<?php require(__DIR__ . '/footer.html'); ?>
    </body>
</html>