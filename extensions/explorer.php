<?php

// CREATION PATH RETOUR
$tab = explode('/', $url);
$back = '';
for ($i=0; $i < count($tab); $i++) { 
    if ($i != count($tab) - 1) {
        $back .= $tab[$i] . '/';
    }
}

// AFFICHAGE DES DOSSIERS
foreach ($dirs as $key => $value) {
    if(is_dir(substr($url . '/' . $value, 5))) {
        if ($value != '..') {
            if ($value == '.') {
                if ($url != 'H5AI') {
                    preg_match('/\/[^\/]*\/$/', $back, $matches);
                    if (isset($matches[0])) {
                        $strback = trim ($matches[0], '/');
                    }
                    else {
                        $strback = substr($back, 0, -1);
                    }
    ?>
    <div class='explorer_element explorer_folder'>
        <a style='display:grid' href='/<?=$back?>'><div><img src='/H5AI/src/back.png' style='width:20px'><img src='/H5AI/src/folder.png' style='width:20px'><p><?=$strback?></p></div></a>
    </div>
    <?php
                }
            }
            else {
                $size = GetDirectorySize(substr($url . '/' . $value, 5));
                $last = str_replace(':', 'h', date("d.m.y à H:i", filemtime(substr($url . '/' . $value, 5))));
    ?>
    <div class='explorer_element explorer_folder'>
        <a style='display:grid; grid-template-columns:4fr 1fr 1fr' href='/H5AI/<?=substr($url . '/' . $value, 5)?>'><div><img src='/H5AI/src/folder.png' style='width:20px'><p><?=$value?></p></div><h5 style='margin: 0;'><?=$last?></h5><h5 style='margin: 0; text-align: right'><?=$size?></h5></a>
    </div>


    <?php
            }
        }
    }
}
if (count($dirs) <= 2) {
echo "Folder is empty.";
}

// AFFICHAGE DES FICHIERS
foreach ($dirs as $key => $value) {
    if(!is_dir(substr($url . '/' . $value, 5))) {
        $ext = getExt($value);
        $icon = getIcon($ext);
        $way = $value;
        $size = getFilesize(substr($url . '/' . $value, 5));
        $last = str_replace(':', 'h', date("d.m.y à H:i", filemtime(substr($url . '/' . $value, 5))));
?>
    <div class='explorer_element explorer_file'>
        <a style='display:grid; grid-template-columns:4fr 1fr 1fr' href='#' class='file' ext='<?=$ext?>' url='<?=$way?>'><div><img src='/H5AI/src/<?=$icon?>' style='width:20px'><p><?=$value?></p></div><h5 style='margin: 0;'><?=$last?></h5><h5 style='margin: 0; text-align: right'><?=$size?></h5></a>
    </div>
<?php
    }
}
?>