<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
    <script src="public/js/settings.js" defer></script>
    <title>ActivityLog - dashboard</title>
</head>
<body>
    <div class="settings-wrapper">
        <div class="header">
            <div class="left-side"></div>
            <div class="current-path">Settings</div>
            <div class="right-side">
                <div class="initials"></div>
                <div class="logo-wrapper">
                    <div>
                        <div class="logo"></div>
                    </div>
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
                <form action="updateDetails">
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
                <form action="updatePassword">
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