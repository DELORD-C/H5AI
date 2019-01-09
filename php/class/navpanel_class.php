<?php

class NavPanel extends Controller {

    public $opened;

    function __construct ($url, $path, $dirs, $opened) {
        $this->path = $path;
        $this->dirs = $dirs;
        $this->tab = explode('/', $url);
        $this->url = $url;
        $this->opened = $opened;
    }

    function displayFiles($start, $margin) {
        $contents = scandir($start);
        array_splice($contents, 0,2);
        $filepath = '/my_h5ai' . substr($start, 2);
        $i = 0;
        foreach ( $contents as $item ) {
            if ( is_dir("$start/$item") && (substr($item, 0,1) != '.') && in_array($item, $this->opened)) {
                echo "<div class='panel_element panel_folder'>
                <a style='margin-left:$margin" . "px' href='$filepath/$item'><img src='/my_h5ai/src/arrow.png' style='width:15px; transform:rotate(90deg)'><img src='/my_h5ai/src/folder.png' style='width:15px'>$item</a>
                </div>";
                $this->displayFiles("$start/$item", $margin + 18);
            } else if ( is_dir("$start/$item") && (substr($item, 0,1) != '.') ) {
                echo "<div class='panel_element panel_folder'>
                <a style='margin-left:$margin" . "px' href='$filepath/$item'><img src='/my_h5ai/src/arrow.png' style='width:15px'><img src='/my_h5ai/src/folder.png' style='width:15px'>$item</a>
                </div>";
            } else {
                $ext = $this->getExt($item);
                $icon = $this->getIcon($ext);
                $array[$i] = "<div class='panel_element panel_file'>
                <a style='margin-left:$margin" . "px' href='#' class='file' ext='$ext' url='$filepath/$item'><img src='/my_h5ai/src/$icon' style='width:15px'>$item</a>
                </div>";
                $i++;
            }
        }
        if(isset($array)) {
            foreach ($array as $key => $value) {
                echo $value;
            }
        }
    }

}