<?php

require_once __DIR__ . '/inc/fip-connect.inc.php';

$errorMsg = '';

$fipRepository = new FipRepository($pdo);

if (!empty($_POST) && !empty($_POST['name']) && !empty($_POST['title'])) {
    $name = @(string) $_POST['name'];
    $title = @(string) $_POST['title'];
    $album = @(string) $_POST['album'];
    $jahr = @(string) $_POST['jahr'];

    $fipRepository->insertTitle($name, $title, $album, $jahr);

} 
// Übertragug Fehlerhaft
else {
    $errorMsg = 'Versuchs noch mal!';
    
}



render(__DIR__ . '/views/insert.view.php', [
    'errorMsg' => $errorMsg,
    'name' => $name,
    'title' => $title,
    'album' => $album,
    'jahr' => $jahr
]);
