<?php

function render($path, array $data = []) {
   ob_start();
   extract($data);
   require $path;
   $content = ob_get_contents();
   ob_end_clean();
   
   require __DIR__ . '/../views/layout/main.view.php';
}

function renderGame($path, array $data = []) {
   ob_start();
   extract($data);
   require $path;
   $content = ob_get_contents();
   ob_end_clean();
   
   require __DIR__ . '/../admin/views/layouts/main.view.php';
}

function getFakeFip() {
    $title = "a";
    $song = "b";
    $album = "c";
    $jahr = 1977;
    $fakeArray = array('title' => $title, 
                        'song' => $song ,
                        'album' => $album, 
                        'jahr' => $jahr);
    return $fakeArray;

}

function e($html) {
    return htmlspecialchars($html, ENT_QUOTES, 'UTF-8', true);
}

function isMobile() {
    return preg_match("/\bMobile\b/", $_SERVER["HTTP_USER_AGENT"]);
}

function stringOK ($string_1, $string_2) {
    if(!empty($string_1) && !empty($string_2))
    {
        if(strcmp(strtolower($string_1), strtolower($string_2)) === 0){
        
            return true;
        }else{
            return false;
            }
        }
    };



/* function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
*/
