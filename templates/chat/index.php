

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
        <div class="chatbox__messages" ng-repeat="message in messages">
            <div class="chatbox__messages__user-message">
                <div class="chatbox__messages__user-message--ind-message">
                    <p class="name">{{message.Name}}</p>
                    <br/>
                    <p class="message">{{message.Message}}</p>
                </div>
            </div>
        </div>
        <form action="/chat" method="post">
            <input type="text" placeholder="Type Message">
            <button type="submit" class="btn btn-primary">Nachricht Senden</button>
        </form>
    </div>

