

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


<!------ Include the above in your HEAD tag ---------->



<head>
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
    <link href="/css/chat-style.css" rel="stylesheet">

    </head>
<div  ng-cloak ng-app="chatApp">
    <div class='chatbox' ng-controller="MessageCtrl as chatMessage">
        <div class='chatbox__user-list'>
            <h1>Friends Online</h1>
            <div class='chatbox__user--active'>
                <p>Maelyn Pepe</p>
            </div>
            <div class='chatbox__user--busy'>
                <p>Michelle Pepe</p>
            </div>
            <div class='chatbox__user--active'>
                <p>Amy Angular</p>
            </div>
            <div class='chatbox__user--active'>
                <p>Jack Uniden</p>
            </div>
            <div class='chatbox__user--away'>
                <p>Ben Marcus</p>
            </div>
        </div>


                <?php if (empty($mgss)): ?>
                    <div class="dhd">
                        <p class="item message">no messages yet.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($mgss as $msg): ?>
                          <div class="chatbox__messages" ng-repeat="message in messages">
                            <div class="chatbox__messages__user-message">
                                <div class="chatbox__messages__user-message--ind-message">
                                    <p class="name">{{message.Name}}</p>
                                    <br/>
                                    <div class="message"><?= $msg->message; ?></div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>

        <div class="row">
            <form action="/chat/doCreate" method="post" >
                <div>

                    <input id="msg" name="msg" type="text" class="form-control">
                    <button type="submit" name="sennd" class="btn btn-primary">Absenden</button>
                </div>


            </form>
        </div>


    </div>


