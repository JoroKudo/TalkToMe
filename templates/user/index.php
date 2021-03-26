<?php

if (!isset($_SESSION["IsLoggedIn"])) { ?>
    <meta http-equiv="refresh" content="0; URL=/user/login" />
<?php } ?>
<article class="hreview open special">
	<?php if (empty($users)): ?>
		<div class="dhd">
			<h2 class="item title">Hoopla! Keine User gefunden.</h2>
		</div>
	<?php else: ?>


            <?php if (($_SESSION['hasadmin'])) { ?>
    <?php foreach ($users as $user): ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?= htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?> </div>
				<div class="panel-body">

					<p class="description">In der Datenbank existiert ein User mit dem Namen <?= htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?> . Dieser hat die EMail-Adresse: <a href="mailto:<?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?>"><?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></a></p>

                    <p>
						<a title="Löschen" href="/user/delete?id=<?= htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>">Löschen</a>
					</p>
                    <?php endforeach; ?>
                    <?php }
                    else{?>
                    <div class="panel panel-default">
                        <div class="panel-heading"><?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?> </div>
                        <div class="panel-body">

                            <p class="description">hallo <?=htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?> . Deine Email Adresse ist: <a href="mailto:<?= htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?>"><?= htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?></a></p>

                            <p>
                                <a title="Löschen" href="/user/delete?id=<?= htmlspecialchars($_SESSION['userId'], ENT_QUOTES, 'UTF-8'); ?>">Löschen</a>
                            </p>
                            <?php }
                            ?>
				</div>
			</div>

	<?php endif; ?>
</article>
