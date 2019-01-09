$.ajaxSetup({
    'beforeSend' : function(xhr) {
        xhr.overrideMimeType('text/html; charset=UTF-8');
    },
});

$('.file').mousedown(function(event){
    $('#dialog').html('');
    if (event.which == 1) {
        target = $(this).attr('url');
        ext = $(this).attr('ext');
        switch (ext) {
            case '.pdf':
                showPDF(target);
                break;

            case '.txt':
                showTXT(target);
                break;

            case '.html':
                showHTML(target);
                break;

            case '.css':
                showTXT(target);
                break;

            case '.js':
                showTXT(target);
                break;

            case '.md':
                showTXT(target);
                break;

            case '.php':
                showPHP(target);
                break;

            case '.htaccess':
                showHTACCESS(target);
                break;

            case '.jpg':
                showIMG(target);
                break;

            case '.jpeg':
                showIMG(target);
                break;

            case '.png':
                showIMG(target);
                break;

            case '.svg':
                showIMG(target);
                break;

            case '.avi':
                showVIDEO(target);
                break;

            case '.mp4':
                showVIDEO(target);
                break;

            case '.ogg':
                showVIDEO(target);
                break;

            case '.mov':
                showVIDEO(target);
                break;

            case '.git':
                showGIT(target);
                break;

            case '':
                alert('Extension inconnue !')
                break;
        
            default:
                showCODE(target);
                break;
        }
    }
});

function showPDF(target) {
    var name = target.match('[^\/]*$')[0];
    $("#dialog").dialog({
        modal: true,
        title: name,
        width: 1800,
        height: 900,
        buttons: {
            Close: function () {
                $("#dialog").html('');
                $(this).dialog('close');
            }
        },
        open: function () {
            var object = "<object data=\"{FileName}\" type=\"application/pdf\" width=\"100%\" height=\"100%\">";
            object += "If you are unable to view file, you can download from <a href = \"{FileName}\">here</a>";
            object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
            object += "</object>";
            object = object.replace(/{FileName}/g, target);
            $("#dialog").html(object);
        }
    });
}

function showTXT(target) {
    var name = target.match('[^\/]*$')[0];
    $("#dialog").dialog({
        modal: true,
        title: name,
        width: '95vw',
        height: 900,
        buttons: {
            Close: function () {
                $("#dialog").html('');
                $(this).dialog('close');
            }
        },
        open: function () {
            $.get(target, function(data){
                $("#dialog").text(data);
                $("#dialog").html('<pre>' + $('#dialog').html() + '</pre>');
            });
        }
    });
}

function showIMG(target) {
    var name = target.match('[^\/]*$')[0];
    $("#dialog").dialog({
        modal: true,
        title: name,
        width: '95vw',
        height: 900,
        buttons: {
            Close: function () {
                $("#dialog").html('');
                $(this).dialog('close');
            }
        },
        open: function () {
            var img = "<img src='" + target + "' style='bottom: 0;left: 0;margin: auto;max-height: 100%;max-width: 100%;position: absolute;right: 0;top: 0;'>";
            $("#dialog").html(img);
        }
    });
}

function showVIDEO(target) {
    var name = target.match('[^\/]*$')[0];
    $("#dialog").dialog({
        modal: true,
        title: name,
        width: '95vw',
        height: 900,
        buttons: {
            Close: function () {
                $("#dialog").html('');
                $(this).dialog('close');
            }
        },
        open: function () {
            var video = "<video width='100%' height='100%' controls><source src='" + target + "' type='video/mp4'><source src='" + target + "' type='video/ogg'><source src='" + target + "' type='video/avi'><source src='" + target + "' type='video/mov'>Your browser does not support the video tag.</video>"
                $("#dialog").html(video);
        }
    });
}

function showGIT(target) {
    var name = target.match('[^\/]*$')[0];
    $("#dialog").dialog({
        modal: true,
        title: name,
        width: '95vw',
        height: 900,
        buttons: {
            Close: function () {
                $("#dialog").html('');
                $(this).dialog('close');
            }
        },
        open: function () {
            $("#dialog").html('Fichier GIT');
        }
    });
}

function showHTACCESS(target) {
    var name = target.match('[^\/]*$')[0];
    $("#dialog").dialog({
        modal: true,
        title: name,
        width: '95vw',
        height: 900,
        buttons: {
            Close: function () {
                $("#dialog").html('');
                $(this).dialog('close');
            }
        },
        open: function () {
            $("#dialog").html('Fichier HTACCESS');
        }
    });
}

function showHTML(target) {
    var name = target.match('[^\/]*$')[0];
    $("#dialog").dialog({
        modal: true,
        title: name,
        width: '95vw',
        height: 900,
        buttons: {
            Close: function () {
                $("#dialog").html('');
                $(this).dialog('close');
            }
        },
        open: function () {
            $("#dialog").load(target);
        }
    });
}

function showPHP(target) {
    var name = target.match('[^\/]*$')[0];
    $("#dialog").dialog({
        modal: true,
        title: name,
        width: '95vw',
        height: 900,
        buttons: {
            Close: function () {
                $("#dialog").html('');
                $(this).dialog('close');
            }
        },
        open: function () {
            var regex = '^.*\/';
            var cible = target.match(regex);
            console.log(cible);
            $("#dialog").load(cible[0]);
        }
    });
}