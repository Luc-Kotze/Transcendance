<?php

    require('../functions.php');

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/login.css" />
    <title>Transcendence | Log In</title>
</head>

<body>
    <img class="wave" src="../images/wave1.png" alt="wave">
    <div class="container">
        <div class="img">
            <img src="../images/awe.png" alt="chat">
        </div>
        <div class="login-content" id="login-form">
            <form autocomplete="off" method="post" class="sign-in-form">
                <img src="../images/awe2.png" alt="pfp">
                <h2>Welcome</h2>
                <div class="input-div username-input">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="form-control name-input">

                        <input type="text" id="username-login" name="username" class="input" required>
                        <label for="username-login">Username</label>

                    </div>
                </div>
                <div class="input-div password-input">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="form-control password-input">

                        <input type="text" id="password-login" name="password" class="input" required>
                        <label for="password-login">Password</label>
                    </div>
                </div>
                <input type="submit" class="btn" value="Login">
                <p>Dont have an account yet?<button type="button" class="sign-up-btn">Create an account</button></p>
            </form>
        </div>
    </div>



    <div class="login-content" id="signup-form">
        <form autocomplete="off" method="post" class="sign-up-form">
            <img src="../images/awe4.png" alt="pfp">
            <h2>Sign Up</h2>
            <div class="input-div username-input">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control name-input">

                    <input type="text" id="username-signup" name="username" class="input" required>
                    <label for="username-signup">Username</label>

                </div>
            </div>
            <div class="input-div username-input">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control email-input">

                    <input type="text" id="email-signup" name="email" class="input" required>
                    <label for="email-signup">Email</label>

                </div>
            </div>
            <div class="input-div password-input">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="form-control password-input">

                    <input type="text" id="password-signup" name="password" class="input" required>
                    <label for="password-signup">Password</label>
                </div>
            </div>
            <input type="submit" class="btn" value="Sign Up">
            <p>Already have an account?<button type="button" class="sign-in-btn">Login</button></p>

        </form>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"
        integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ=="
        crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>