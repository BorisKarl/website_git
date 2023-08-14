<?php

require __DIR__ . '/inc/all.php';


render(__DIR__ . '/views/index.view.php', [
]);
/* 
Webspace Pfad strato pfad /mnt/rid/45/36/511644536/htdocs/

Konfiguration für

.htaccess
RewriteEngine On
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^([^/]+)/?$ $1.php [L]


*/
