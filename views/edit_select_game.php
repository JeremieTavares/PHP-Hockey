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
			
			<form action="index.php" method="get">
                <div>
                    <label for="id_partie">Sélectionnez la partie à modifier ou supprimer : </label>
					<select name="id" id="id_partie">
						<?php
							foreach ($gamesObjArray as $gameObj)
								echo '<option value="' . $gameObj->get_id() . '">' . $gameObj->get_date() . ' ' . $gameObj->get_opponent_name() . '</option>';
						?>
					</select>
				</div>

                <input type="hidden" name="action" value="edit" />
                <input type="submit" name="submit" value="Modifier" />
            </form>
        </main>

        <?php require(__DIR__ . '/footer.html'); ?>
    </body>
</html>