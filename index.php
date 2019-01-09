<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>my_h5ai</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/my_h5ai/css/style.css">
    <link rel="shortcut icon" href="/my_h5ai/src/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class='title'>
        <h1>Projet H5AI</h1>
    </div>

    <?php include 'php/init.php';?>

    <div class='H5AI'>
        <div class='H5AI_element nav_panel'>
            <div class='panel_element panel_folder'>
                    <a href='/my_h5ai'><img src='/my_h5ai/src/arrow.png' style='width:15px; transform: rotate(90deg)'><img src='/my_h5ai/src/folder.png' style='width:15px'>my_h5ai</a>
            </div>
            <?php $navpanel->displayFiles('./', 18); ?>
        </div>

        <div class='H5AI_element explorer'>
            <?php $explorer->displayFolders(); ?>
        </div>
    </div>
    <div id="dialog" style="display: none">

    <script src="/my_h5ai/js/script.js"></script>
</body>

</html>