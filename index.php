<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>H5AI</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/H5AI/css/style.css">
    <link rel="shortcut icon" href="/H5AI/src/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class='title'>
        <h1>Projet H5AI</h1>
    </div>

    <?php include 'php/init.php';?>

    <div class='H5AI'>
        <div class='H5AI_element nav_panel'>
            <div class='panel_element panel_folder'>
                    <a href='/H5AI'><img src='/H5AI/src/arrow.png' style='width:15px; transform: rotate(90deg)'><img src='/H5AI/src/folder.png' style='width:15px'>H5AI</a>
            </div>
            <?php $navpanel->displayFiles('./', 18); ?>
        </div>

        <div class='H5AI_element explorer'>
            <?php $explorer->displayFolders(); ?>
        </div>
    </div>
    <div id="dialog" style="display: none">

    <script src="/H5AI/js/script.js"></script>
</body>

</html>