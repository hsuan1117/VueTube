<?php
    //require __DIR__.'/vendor/autoload.php';
    include "command_line.php";
    //use YoutubeDL\YoutubeDL;
    $regex  = "((https?|ftp)\:\/\/)?";
    $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?";
    $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; 
    $regex .= "(\:[0-9]{2,5})?";
    $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?";
    $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; 
    $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?";
    $url    = $_REQUEST["url"] or ""; 
    if(!preg_match("/^$regex$/i", $url)){
       die("URL is not ok"); 
    }
    ob_start();
    proc_close(proc_open("sudo youtube-dl -x --restrict-filenames --embed-thumbnail --add-metadata -o 'downloads/%(title)s.%(ext)s' --audio-format mp3 ".$url." &",array(),$foo));
    ob_end_clean();
    system("cd downloads && ls");
?>
