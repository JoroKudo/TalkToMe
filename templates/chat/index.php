<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


<!------ Include the above in your HEAD tag ---------->


<head>
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
    <link href="/css/chat-style.css" rel="stylesheet">

</head>
<div ng-cloak ng-app="chatApp">
    <body class='chatbox' ng-controller="MessageCtrl as chatMessage" >
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


        <script type="text/javascript">
            function toBottom()
            {
                window.scrollTo(5, document.body.scrollHeight);
            }
            window.onload=toBottom;</script>

        <?php if (empty($mgss)): ?>
            <div class="dhd">
                <p class="item message">no messages yet.</p>
            </div>
        <?php else: ?>
            <?php foreach ($mgss as $msg): ?>

                <div class="chatbox__messages" ng-repeat="message in messages">
                    <div class="chatbox__messages__user-message">
                        <div class="chatbox__messages__user-message--ind-message">

                            <p class="name"><?= $user->firstname; ?></p>
                            <br/>
                            <div class="message"><?= $msg->message; ?></div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>

        <div class="row">
            <form action="/chat/doCreate" method="post">
                <div>


                    <input id="msg" name="msg" type="text" class="form-control formobj">

                    <button type="submit" name="sennd" class="btn btn-primary formobj">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor"
                             class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                        </svg>
                    </button>
                </div>


            </form>
        </div>


    </body>



