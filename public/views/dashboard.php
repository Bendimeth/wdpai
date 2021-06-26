<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <title>ActivityLog - dashboard</title>
</head>
<body>
    <div class="dashboard-wrapper">
        <div class="dashoboard-header">
            <div class="left-side"></div>
            <div class="right-side">
                <div class="initials"></div>
                <div class="logo-wrapper">
                    <div>
                        <div class="logo"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-body">
            <div class="title">Your activities</div>
            <form action="createLog" method="POST" ENCTYPE="multipart/form-data">
                <input type="text" name="title">
                <input type="text" name="description">
                <input type="file" name="file">
                <button type="submit">Create</button>
            </form>
            <?php if(isset($activityLogs)) foreach($activityLogs as $activityLog): ?>
            <div>
<!--                <img src="" alt="">-->
                <div><?php echo($activityLog->getTitle()) ?> sdf</div>
<!--                <div>--><?php //$activityLog->getDesctiption() ?><!--</div>-->
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>