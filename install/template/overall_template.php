<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
    <link rel="stylesheet" href="install/style/install.css">
</head>
<body>
    <div id="installer">
        <div class="install-wrap">
            <div id="NoxLogo">NoxCMS</div>
            <form action="./install/init.php" method="post">
                <span class="section">General Settings</span>

                <label for="dbname">Database Name:</label>
                <input type="text" name="" id="dbname">
                <label for="prefix">Table prefix:</label>
                <input type="text" name="" id="prefix" placeholder="noxcms_">

                <span class="section">Configuration</span>
                <label for="dbuser">Database User:</label>
                <input type="text" name="" id="dbuser">
                <label for="dbpass">Database Password:</label>
                <input type="password" name="" id="dbpass">

                <span class="section">Credentials</span>
                <label for="uuser">Admin User:</label>
                <input type="text" name="" id="uuser">
                <label for="upass">Admin Password:</label>
                <input type="password" name="" id="upass">
                <label for="upass2">Admin Password (Repeat):</label>
                <input type="password" name="" id="upass2">

                <input type="submit" value="INSTALL">
            </form>
        </div>
    </div>
</body>
</html>