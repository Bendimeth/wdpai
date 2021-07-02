<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
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
        <div class="settings-body">
            <div class="settings-left">
                <form class="form-update-photo" action="updatePhoto" method="POST" ENCTYPE="multipart/form-data">
                    <label for="file">Upload new photo</label>
                    <input type="file" name="file">
                    <button type="submit">Save</button>
                </form>
                <form>
                    <label for="name">Name</label>
                    <input type="text" name="name">
                    <label for="surname">Last name</label>
                    <input type="text" name="surname">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <button type="submit">Save</button>
                </form>
            </div>
            <div class="settings-right">
                <form>
                    <label for="oldPassword">Old Password</label>
                    <input type="password" name="oldPassword">
                    <label for="newPassword">New Password</label>
                    <input type="password" name="newPassword">
                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>