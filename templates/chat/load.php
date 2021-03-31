<?php
if (empty($mgss)): ?>
    <div class="dhd">
        <p class="item message">no messages yet.</p>
    </div>
<?php else: ?>
<?php foreach ($mgss

as $msg): ?>
<?php
if ($msg->author == htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8')): ?>
<div class="chatbox__messages me">
    <?php else: ?>
    <div class="chatbox__messages you">
        <?php endif; ?>

            <div class="chatbox__messages__user-message chatbox__messages__user-message--ind-message">
                <p class="name"><?= $msg->author; ?></p>
                <br/>
                <div class="" id="demo"><?= htmlspecialchars($msg->message); ?></div>
                <?php

                if (($msg->author) == htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') or $_SESSION['hasadmin']) { ?>
                    <form method='POST' class="delete"action="/chat/delete"><input type='hidden' class="btn"
                                                                     value="<?= htmlspecialchars($msg->id, ENT_QUOTES, 'UTF-8'); ?>"
                                                                     name='id' id='id'/><input type='submit' class="delete-button" value='Löschen'/>
                    </form>
                <?php } ?>
            </div>

    </div>

    <?php endforeach; ?>
    <?php endif; ?>


