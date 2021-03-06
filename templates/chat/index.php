
<?php

if (!isset($_SESSION["IsLoggedIn"])) { ?>
    <meta http-equiv="refresh" content="0; URL=/user/login" />
<?php } ?>

<div>
    <div id="chatbox" class='chatbox'>

        <div id="chatContent" class="padder">





        </div>
        <div class="row">
            <input id="msgText" name="msgText" type="text" value="" class="guiobj textfied">
            <button id="button" onclick="scrollSend()" name="sennd" type="submit" class="btn btn-primary guiobj send-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor"
                     class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                    <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                </svg>
            </button>
        </div>
        <script>
            var executed = false;
            setInterval(updateChat, 2000);

            var input = document.getElementById("msgText");
            input.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    document.getElementById("button").click();
                }
            });
// Javascript functions damit die Seite scrollbar/automatisch Scrollt beim senden einer Nachricht ist
            function updateChat() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        var chatContentDiv = document.getElementById("chatContent");
                        chatContentDiv.innerHTML = this.responseText;
                        if (!executed) {
                            executed = true;
                            scrolldown();
                        }
                    }
                };
                xhttp.open("POST", "chat/load", true);
                xhttp.send();
            }

            function scrollSend() {
                sendChatText();
                updateChat();
                inputDelete();
                setTimeout(scrolldown,1000)
            }
            function scrolldown() {

                var chatboxDiv = document.getElementById("chatbox");
                chatboxDiv.scrollTo(0, chatboxDiv.scrollHeight)
            }
            function sendChatText() {
                let msgTextBox = document.getElementById("msgText");
                var msgText = msgTextBox.value
                var data = new FormData();
                data.append('message', msgText);
                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", "/chat/doCreate", true);
                xhttp.send(data);
                updateChat();
                scrolldown();
            }
            function inputDelete() {
                document.getElementById("msgText").value = '';
            }
        </script>
    </div>
</div>
