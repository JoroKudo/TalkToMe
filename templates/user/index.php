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
				<div class="panel-heading"><?= $user->username; ?> </div>
				<div class="panel-body">

					<p class="description">In der Datenbank existiert ein User mit dem Namen <?= $user->username; ?> . Dieser hat die EMail-Adresse: <a href="mailto:<?= $user->email; ?>"><?= $user->email; ?></a></p>

                    <p>
						<a title="Löschen" href="/user/delete?id=<?= $user->id; ?>">Löschen</a>
					</p>
                    <?php endforeach; ?>
                    <?php }
                    else{?>
                    <div class="panel panel-default">
                        <div class="panel-heading"><?= $_SESSION['username']; ?> </div>
                        <div class="panel-body">

                            <p class="description">hallo <?= $_SESSION['username'] ?> . Deine Email Adresse ist: <a href="mailto:<?= $_SESSION['email']; ?>"><?= $_SESSION['email']; ?></a></p>

                            <p>
                                <a title="Löschen" href="/user/delete?id=<?= $_SESSION['userId']; ?>">Löschen</a>
                            </p>
                            <?php }
                            ?>
				</div>
			</div>

	<?php endif; ?>
</article>
$username = htmlspecialchars($_POST['fname'], ENT_QUOTES, 'UTF-8');