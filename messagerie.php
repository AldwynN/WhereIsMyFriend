<?php 
include_once './server/inc/inc.all.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Messagerie</title>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="css/cssNavBar.css" rel="stylesheet" type="text/css"/>
        <link href="css/cssDiscussion.css" rel="stylesheet" type="text/css"/>
        <link href="css/cssUserList.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <?php include 'server/inc/nav.inc.php'; ?>
        <main>

            <?php include 'server/inc/userListButton.inc.php'; ?>

            <div class="chat">
                <div class="chat-title">
                    <h1>Romain Peretti</h1>
                    <h2>Connecté</h2>
                    <figure class="avatar">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdbGXTDadxwYb17So8ceRwbudY6UDTRS6M1D8ki0vQit5wSQeuvQ" /></figure>
                </div>
                <div class="messages">
                    <div class="messages-content"></div>
                </div>
                <div class="message-box">
                    <textarea type="text" class="message-input" placeholder="Type message..."></textarea>
                    <button type="submit" class="message-submit">Send</button>
                </div>

            </div>
        </main>

        <?php include 'server/inc/userList.inc.php'; 
        "</div>" /* Permet de fermer le div ouvert dans la nav */ ?>

        <script type="text/javascript">
            var $messages = $('.messages-content'),
                    d, h, m,
                    i = 0;

            $(window).load(function () {
                $messages.mCustomScrollbar();
                setTimeout(function () {
                    fakeMessage();
                }, 100);
            });

            function updateScrollbar() {
                $messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
                    scrollInertia: 10,
                    timeout: 0
                });
            }

            function setDate() {
                d = new Date()
                if (m != d.getMinutes()) {
                    m = d.getMinutes();
                    $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.message:last'));
                }
            }

            function insertMessage() {
                msg = $('.message-input').val();
                if ($.trim(msg) == '') {
                    return false;
                }
                $('<div class="message message-personal">' + msg + '</div>').appendTo($('.mCSB_container')).addClass('new');
                setDate();
                $('.message-input').val(null);
                updateScrollbar();
                setTimeout(function () {
                    fakeMessage();
                }, 1000 + (Math.random() * 20) * 100);
            }

            $('.message-submit').click(function () {
                insertMessage();
            });

            $(window).on('keydown', function (e) {
                if (e.which == 13) {
                    insertMessage();
                    return false;
                }
            })

            var Fake = [
                'Hi there, I\'m Fabio and you?',
                'Nice to meet you',
                'How are you?',
                'Not too bad, thanks',
                'What do you do?',
                'That\'s awesome',
                'Codepen is a nice place to stay',
                'I think you\'re a nice person',
                'Why do you think that?',
                'Can you explain?',
                'Anyway I\'ve gotta go now',
                'It was a pleasure chat with you',
                'Time to make a new codepen',
                'Bye',
                ':)'
            ]

            function fakeMessage() {
                if ($('.message-input').val() != '') {
                    return false;
                }
                $('<div class="message loading new"><figure class="avatar"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/156381/profile/profile-80.jpg" /></figure><span></span></div>').appendTo($('.mCSB_container'));
                updateScrollbar();

                setTimeout(function () {
                    $('.message.loading').remove();
                    $('<div class="message new"><figure class="avatar"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/156381/profile/profile-80.jpg" /></figure>' + Fake[i] + '</div>').appendTo($('.mCSB_container')).addClass('new');
                    setDate();
                    updateScrollbar();
                    i++;
                }, 1000 + (Math.random() * 20) * 100);

            }</script>
    </body>
</html>