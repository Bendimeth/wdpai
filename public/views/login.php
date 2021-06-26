<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="public/js/forms-validation.js" type="application/javascript" defer></script>
    <title>ActivityLog - login</title>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-header">
            <div class="logo-wrapper">
                <div>
                    <div class="logo"></div>
                </div>
            </div>
        </div>
        <div class="login-background"></div>
        <div class="popup">
            <div class="popup-header">
                Sign in to your ActivityLog account
            </div>
            <div class="popup-content">
                <form method="POST">
                    <div class="info">
                        <?php if(isset($messages)) {
                            foreach ($messages as $message) {
                                echo($message);
                            }
                        }
                        ?>
                    </div>
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="surname" placeholder="Surname">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <input type="password" name="confirmPassword" autocomplete="new-password" placeholder="Confirm Password">
                    <button class="change-form-button" type="button"></button>
                    <button class="register-button" type="button" onclick="onSubmit()">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>