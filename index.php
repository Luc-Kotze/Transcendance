<?php 
    require('functions.php');

    $currentUser = new User($_SESSION['id']);
    $users = User::getUsers();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
            integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
            crossorigin="anonymous" />
        <link rel="stylesheet" href="css/style.css">
        <title>Trancendance</title>
    </head>

    <body>
        <div class="main-container">
            <div class="contacts-container">
                <div class="contact-head">
                    <h2>Contacts</h2>
                </div>

                <div class="chats">
                    <?php foreach($users as $user) : ?>
                    <?php $user = new User($user['id']); ?>
                    <?php $user->listHTML(); ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="main-chat">
                <div class="chat-head">
                    <div class="circle"></div>
                    <div class="main-chat-name">Dylan</div>
                    <div class="menu-icon">
                        <i class="fas fa-ellipsis-v">
                            <div class="dropdown">
                                <div id="myDropdown" class="dropdown-content">
                                    <a href="#">Info</a>
                                </div>
                            </div>
                        </i>
                    </div>
                </div>
                <div class="chat-section">
                    <div class="chat-boxes">
                        <div class="sb-box sb1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, aut
                            voluptate veritatis minus beatae nam voluptatem ducimus deleniti ipsam facere.</div>
                        <div class="sb-box sb1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, sed.</div>
                        <div class="sb-box sb1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, sed.</div>
                        <div class="sb-box sb1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, sed.</div>
                        <div class="sb-box sb1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis,
                            pariatur? Quod provident, aliquam quidem eum nemo molestias at a porro non sint cupiditate
                            nostrum tempore nisi ratione. Exercitationem reprehenderit dignissimos, debitis adipisci
                            voluptatibus excepturi, asperiores tempore aperiam deleniti delectus enim.</div>
                        <div class="sb-box sb1">aawe</div>
                        <div class="sb-box sb1">AWEaweawe</div>
                    </div>


                </div>
                <div class="send-section">
                    <div class="chat-input">
                        <input type="text" class="send-message-input" placeholder="Type your message here...">
                    </div>

                    <button type="button" class="chat-send-btn">Send</button>


                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"
            integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ=="
            crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
    </body>

</html>