<?php

class Controller {
    public $url;
    public $tab;
    public $path;
    public $dirs;

    function __construct ($url, $path, $dirs) {
        $this->path = $path;
        $this->dirs = $dirs;
        $this->tab = explode('/', $url);
        $this->url = $url;
    }

    function getExt($subject) {
        preg_match('/\..*$/', $subject, $matches);
        if (isset($matches[0])) {
            return $matches[0];
        }
    }
    
    function getIcon ($ext) {
        switch ($ext) {
            case '.txt':
                return 'txt.png';
                break;
    
            case '.htaccess':
                return 'ht.png';
                break;
            
            case '.css':
                return 'css.png';
                break;
    
            case '.html':
                return 'html.png';
                break;
    
            case '.md':
                return 'md.png';
                break;
    
            case '.png':
                return 'img.png';
                break;
    
            case '.jpg':
                return 'img.png';
                break;
    
            case '.jpeg':
                return 'img.png';
                break;
    
            case '.svg':
                return 'img.png';
                break;
    
            case '.js':
                return 'js.png';
                break;
    
            case '.avi':
                return 'video.png';
                break;
    
            case '.mp4':
                return 'video.png';
                break;
    
            case '.ogg':
                return 'video.png';
                break;
    
            case '.mov':
                return 'video.png';
                break;
    
            case '.php':
                return 'php.png';
                break;
    
            case '.pdf':
                return 'pdf.png';
                break;

            case '.git':
                return 'git.png';
                break;
            
            default:
                return 'file.png';
                break;
        }
    }

}