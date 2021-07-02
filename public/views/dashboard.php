<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="public/css/dashboard.css">
    <script src="https://kit.fontawesome.com/4d687a4b1f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="public/js/header.js" type="application/javascript" defer></script>
    <script src="public/js/dashboard.js" type="application/javascript" defer></script>
    <title>ActivityLog - dashboard</title>
</head>
<body>
    <div class="dashboard-wrapper">
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
        <div class="dashboard-body">
            <div class="dashboard-search">
                <div class="add-wrapper" onclick="changePopupVisibility()">
                    <i class="fas fa-plus-circle"></i>
                    <span>Add new activity</span>
                </div>
                <div class="search-title">
                    Activity log
                </div>
                <div class="search-wrapper">
                    <i class="fas fa-filter"></i>
                    <div class="current-search">All activities</div>
                    <div class="toggle" onclick="toggleSearchDropdown()">
                        <i class="fas fa-angle-down"></i>
                        <i class="fas fa-angle-up"></i>
                    </div>
                    <div class="dropdown">
                        <div class="option" onclick="getAllActivities()">
                            <i class="fas fa-users"></i>
                            <span>All users</span>
                        </div>
                        <div class="option" onclick="getMineActivities()">
                            <i class="fas fa-user"></i>
                            <span>Only mine</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popup">
                <div class="popup-header">Create new activity</div>
                <div class="popup-content">
                    <form method="POST" ENCTYPE="multipart/form-data">
                        <label>Title</label>
                        <input type="text" name="title">
                        <label>Description</label>
                        <textarea type="text" name="description" cols="4"></textarea>
                        <label>Image (optional)</label>
                        <input type="file" name="file">
                        <div class="button-group">
                            <button type="button" onclick="createActivity()">Create</button>
                            <button type="button" onclick="changePopupVisibility()">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="activity-list">

            </div>
        </div>
    </div>
</body>