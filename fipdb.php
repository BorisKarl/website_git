<?php
require_once __DIR__ . '/inc/fip-connect.inc.php';

$errorMsg = '';

$fipRepository = new FipRepository($pdo);

$entries = $fipRepository->fetchHistory();
if(empty($entries)){
    $errorMsg = 'Datenbank ist leer.';
}

render(__DIR__ . '/views/fipdb.view.php', [
    'errorMsg' => $errorMsg,
    'entries' => $entries,
]);

