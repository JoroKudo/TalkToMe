<?php
if (empty($mgss)): ?>
    <div class="dhd">
        <p class="item message">no messages yet.</p>
    </div>
<?php else: ?>
    <?php foreach ($mgss as $msg): ?>
        <?php
        if ($msg->author==$_SESSION['username']): ?>
        <div class="chatbox__messages me" ng-repeat="message in messages">
        <?php else: ?>
            <div class="chatbox__messages you" ng-repeat="message in messages">
        <?php endif; ?>
            <div class="chatbox__messages__user-message">
                <div class="chatbox__messages__user-message--ind-message">
                    <p  class="name" ><?=$msg->author;?></p>
                    <br/>
                    <div class="message" id="demo"><?= $msg->message; ?></div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
<?php endif; ?>