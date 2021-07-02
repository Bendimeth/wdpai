<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="public/css/base.css">
    <script src="https://kit.fontawesome.com/4d687a4b1f.js" crossorigin="anonymous"></script>
    <script src="public/js/settings.js" defer></script>
    <script src="public/js/header.js" defer></script>
    <title>ActivityLog - dashboard</title>
</head>
<body>
<div class="settings-wrapper">
    <div class="header">
        <div class="user-details">
            <div class="user-photo-wrapper">
                <div class="user-photo">
                    <span></span>
                </div>
                <div class="toggle" onclick="toggleDropdown()">
                    <i class="fas fa-angle-down"></i>
                    <i class="fas fa-angle-up"></i>
                </div>
            </div>
            <div class="dropdown">
                <a class="option" href="/settings">
                    <i class="fas fa-user-cog"></i>
                    <span>Settings</span>
                </a>
                <a class="option" href="/dashboard">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a class="option" href="/archived">
                    <i class="fas fa-clipboard"></i>
                    <span>Past activities</span>
                </a>
                <a class="option" href="/login" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
        <div class="logo-wrapper">
            <span class="current-path"></span>
            <div>
                <div class="logo"></div>
            </div>
        </div>
    </div>
    <div>
        <h3>404 not found</h3>
    </div>
</div>
</body>