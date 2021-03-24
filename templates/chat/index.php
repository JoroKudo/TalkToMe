<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


<!------ Include the above in your HEAD tag ---------->


<head>
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
    <link href="/css/chat-style.css" rel="stylesheet">

</head>
<div ng-cloak ng-app="chatApp">
    <body class='chatbox' ng-controller="MessageCtrl as chatMessage">
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
        function toBottom() {
            window.scrollTo(5, document.body.scrollHeight);
        }

        window.onload = toBottom;
    </script>

    <div id="chatContent"></div>

    <div class="row">




            <input id="msgText" name="msgText" type="text" class="form-control guiobj">
            <button onclick="sendChatText" name="sennd" type="submit" class="btn btn-primary guiobj">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor"
                     class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                    <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                </svg>
            </button>

            </div>






    <script>

        setInterval(updateChat, 2000);

        function updateChat() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var chatContentDiv = document.getElementById("chatContent");
                    chatContentDiv.innerText = this.innerText;
               }
            };
            xhttp.open("POST", "chat/load", true);
            xhttp.send();
        }

        function sendChatText() {

            var msgText = document.getElementById("msgText").innerText;
            chatContentDiv.innerText = this.innerText;

            var xhttp = new XMLHttpRequest();
            xhttp.open("GET","/chat/doCreate",true );
            xhttp.send();


        }

    </script>


