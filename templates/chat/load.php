<?php if (empty($mgss)): ?>
    <div class="dhd">
        <p class="item message">no messages yet.</p>
    </div>
<?php else: ?>
    <?php foreach ($mgss as $msg): ?>

        <div class="chatbox__messages" ng-repeat="message in messages">
            <div class="chatbox__messages__user-message">
                <div class="chatbox__messages__user-message--ind-message">
                    <p class="name"><?= session_id();?></p>
                    <br/>
                    <div class="message" id="demo"><?= $msg->message; ?></div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
<?php endif; ?>