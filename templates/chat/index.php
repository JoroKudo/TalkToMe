
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/michellelpepe/pen/GoQyoJ?depth=everything&order=popularity&page=84&q=pack&show_forks=false" />
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>

    <style class="cp-pen-styles">* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif;
        }

        html, body {
            background: -webkit-linear-gradient(330deg, #000, #f0a6ca);
            background: linear-gradient(120deg, #000, #f0a6ca);
            overflow: hidden;
        }

        .container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            height: 106vh;
            width: 100vw;
        }

        .container h1 {
            margin: 0.5em auto;
            color: #FFF;
            text-align: center;
        }

        .chatbox {
            background: rgba(255, 255, 255, 0.05);
            width: 600px;
            height: 75%;
            border-radius: 0.2em;
            position: relative;
            box-shadow: 1px 1px 12px rgba(0, 0, 0, 0.1);
        }

        .chatbox__messages:nth-of-type(odd) .chatbox__messages__user-message--ind-message {
            float: right;
        }

        .chatbox__messages:nth-of-type(odd) .chatbox__messages__user-message--ind-message:after {
            content: '';
            position: absolute;
            margin: -1.5em -17.06em;
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-right: 10px solid rgba(255, 255, 255, 0.2);
        }

        .chatbox__messages:nth-of-type(even) .chatbox__messages__user-message--ind-message {
            float: left;
        }

        .chatbox__messages:nth-of-type(even) .chatbox__messages__user-message--ind-message:after {
            content: '';
            position: absolute;
            margin: -1.5em 1.87em;
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 10px solid rgba(255, 255, 255, 0.2);
        }

        .chatbox__messages__user-message {
            width: 450px;
        }

        .chatbox__messages__user-message--ind-message {
            background: rgba(255, 255, 255, 0.2);
            padding: 1em 0;
            height: auto;
            width: 65%;
            border-radius: 5px;
            margin: 2em 1em;
            overflow: auto;
        }

        .chatbox__messages__user-message--ind-message > p.name {
            color: #FFF;
            font-size: 1em;
        }

        .chatbox__messages__user-message--ind-message > p.message {
            color: #FFF;
            font-size: 0.7em;
            margin: 0 2.8em;
        }

        .chatbox__user-list {
            background: rgba(255, 255, 255, 0.1);
            width: 25%;
            height: 100%;
            float: right;
            border-top-right-radius: 0.2em;
            border-bottom-right-radius: 0.2em;
        }

        .chatbox__user-list h1 {
            background: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9em;
            padding: 1em;
            margin: 0;
            font-weight: 300;
            text-align: center;
        }

        .chatbox__user, .chatbox__user--active, .chatbox__user--busy, .chatbox__user--away {
            width: 0.5em;
            height: 0.5em;
            border-radius: 100%;
            margin: 1em 0.7em;
        }

        .chatbox__user--active {
            background: rgba(23, 190, 187, 0.8);
        }

        .chatbox__user--busy {
            background: rgba(252, 100, 113, 0.8);
        }

        .chatbox__user--away {
            background: rgba(255, 253, 130, 0.8);
        }

        .chatbox p {
            float: left;
            text-align: left;
            margin: -0.25em 2em;
            font-size: 0.7em;
            font-weight: 300;
            color: #FFF;
            width: 200px;
        }

        .chatbox form {
            background: #222;
        }

        .chatbox form input {
            background: rgba(255, 255, 255, 0.03);
            position: absolute;
            bottom: 0;
            left: 0;
            border: none;
            width: 75%;
            padding: 1.2em;
            outline: none;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
        }

        ::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.9);
        }

        :-moz-placeholder {
            color: rgba(255, 255, 255, 0.9);
        }

        ::-moz-placeholder {
            color: rgba(255, 255, 255, 0.9);
        }

        :-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.9);
        }
    </style></head><body>
<div class='container' ng-cloak ng-app="chatApp">
    <h1>Angular Messenger App</h1>
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
        <form>
            <input type="text" placeholder="Type Message">
        </form>
    </div>
    <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script >(function() {
            var app = angular.module('chatApp', []);

            app.controller('MessageCtrl', function($scope) {
                $scope.messages = [{
                    Name: 'Ben Marcus',
                    Message: "Hi  : )"
                }, {
                    Name: 'Michelle Pepe',
                    Message: "What's up?"
                }, {
                    Name: 'Ben Marcus',
                    Message: "Nothing much, You?"
                }];
            });

        })();
        //# sourceURL=pen.js
    </script>
</body></html>