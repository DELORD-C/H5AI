<?php

class Explorer extends Controller {
    public $url;
    public $back;
    public $tab;
    public $path;
    public $dirs;

    function __construct ($url, $path, $dirs) {
        $this->path = $path;
        $this->dirs = $dirs;
        $this->url = $url;
        $this->tab = explode('/', $url);
        $this->back = '';
        for ($i=0; $i < count($this->tab); $i++) { 
            if ($i != count($this->tab) - 1) {
                $this->back .= $this->tab[$i] . '/';
            }
        }
    }

    function displayFolders () {
        foreach ($this->dirs as $key => $value) {
            if(is_dir(substr($this->url . '/' . $value, 8))) {
                if ($value != '..') {
                    if ($value == '.') {
                        if ($this->url != 'my_h5ai') {
                            preg_match('/\/[^\/]*\/$/', $this->back, $matches);
                            if (isset($matches[0])) {
                                $strback = trim ($matches[0], '/');
                            }
                            else {
                                $strback = substr($this->back, 0, -1);
                            }
            ?>
            <div class='explorer_element explorer_folder'>
                <a class='display-grid' href='/<?=$this->back?>'>
                    <div>
                        <img src='/my_h5ai/src/back.png' class='icone'>
                        <img src='/my_h5ai/src/folder.png' class='icone'>
                        <p><?=$strback?></p>
                    </div>
                </a>
            </div>
            <?php
                        }
                    }
                    else {
                        $size = $this->GetDirectorySize(substr($this->url . '/' . $value, 8));
                        $this->last = str_replace(':', 'h', date("d.m.y à H:i", filemtime(substr($this->url . '/' . $value, 8))));
            ?>
            <div class='explorer_element explorer_folder'>
                <a class='display-grid fouroneone' href='/my_h5ai/<?=substr($this->url . '/' . $value, 8)?>'>
                    <div>
                        <img src='/my_h5ai/src/folder.png' class='icone'>
                        <p><?=$value?></p>
                    </div>
                    <h5><?=$this->last?></h5>
                    <h5 class='align-right'><?=$size?></h5>
                </a>
            </div>
        
        
            <?php
                    }
                }
            }
        }
        if (count($this->dirs) <= 2) {
        echo "Folder is empty.";
        }
        $this->displayFiles();
    }

    function displayFiles () {
        foreach ($this->dirs as $key => $value) {
            if(!is_dir(substr($this->url . '/' . $value, 8))) {
                $ext = $this->getExt($value);
                $icon = $this->getIcon($ext);
                $way = '/my_h5ai/' . substr($this->url . '/' . $value, 8);
                $size = $this->getFilesize(substr($this->url . '/' . $value, 8));
                $last = str_replace(':', 'h', date("d.m.y à H:i", filemtime(substr($this->url . '/' . $value, 8))));
        ?>
            <div class='explorer_element explorer_file'>
                <a class='display-grid fouroneone' href='#' class='file' ext='<?=$ext?>' url='<?=$way?>'>
                    <div>
                        <img src='/my_h5ai/src/<?=$icon?>' class='icone'>
                        <p><?=$value?></p>
                    </div>
                    <h5><?=$last?></h5>
                    <h5 class='align-right'><?=$size?></h5>
                </a>
            </div>
        <?php
            }
        }
    }

    function GetDirectorySize($path){
        $bytestotal = 0;
        $path = realpath($path);
        if($path!==false && $path!='' && file_exists($path)){
            foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
                $bytestotal += $object->getSize();
            }
        }
            if ($bytestotal >= 1073741824)
            {
                $bytestotal = number_format($bytestotal / 1073741824, 2) . ' GB';
            }
            elseif ($bytestotal >= 1048576)
            {
                $bytestotal = number_format($bytestotal / 1048576, 2) . ' MB';
            }
            elseif ($bytestotal >= 1024)
            {
                $bytestotal = number_format($bytestotal / 1024, 2) . ' KB';
            }
            elseif ($bytestotal > 1)
            {
                $bytestotal = $bytestotal . ' B';
            }
            elseif ($bytestotal == 1)
            {
                $bytestotal = $bytestotal . ' B';
            }
            else
            {
                $bytestotal = '0 B';
            }
            return $bytestotal;
    }
    
    function getFilesize ($path) {
        $bytestotal = filesize($path);
        if ($bytestotal >= 1073741824)
            {
                $bytestotal = number_format($bytestotal / 1073741824, 2) . ' GB';
            }
            elseif ($bytestotal >= 1048576)
            {
                $bytestotal = number_format($bytestotal / 1048576, 2) . ' MB';
            }
            elseif ($bytestotal >= 1024)
            {
                $bytestotal = number_format($bytestotal / 1024, 2) . ' KB';
            }
            elseif ($bytestotal > 1)
            {
                $bytestotal = $bytestotal . ' B';
            }
            elseif ($bytestotal == 1)
            {
                $bytestotal = $bytestotal . ' B';
            }
            else
            {
                $bytestotal = '0 B';
            }
        return $bytestotal;
    }

}