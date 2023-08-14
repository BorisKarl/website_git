<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="src/js/mainScript.js" defer></script>

<link rel="stylesheet" href="styles/styles.css">
    <title>Boris Nielsen - Main</title>
</head>
<body>
    <div class="puffer"></div>
    <div id="navWrapper">
        <nav>
        <div id="navbar" style="box-shadow: 1px 1px 1px 1px rgba(0, 0, 255, .2);;">
            <a href="index.php" <?php if($_SERVER['PHP_SELF'] === '/php/index.php'): echo 'class="active"'; endif?>>Home</a>
            <a href="about.php" <?php if($_SERVER['PHP_SELF'] === '/php/about.php'): echo 'class="active"'; endif?>>About Me</a>
            <a href="video.php"  <?php if($_SERVER['PHP_SELF'] === '/php/video.php'): echo 'class="active"'; endif?>>Schaue ein Video</a>
            <a href="musik.php" <?php if($_SERVER['PHP_SELF'] === '/php/musik.php'): echo 'class="active"'; endif?>>H&ouml;re ein Lied</a>
            <a href="game.php"  <?php if($_SERVER['PHP_SELF'] === '/php/game.php'): echo 'class="active"'; endif?>>Spiele ein Spiel</a>
        </div>
    </nav>
    </div>
    <div class="content" id="content">
        <?php echo $content; ?>
    </div>

</div>
            <footer <?php if($_SERVER['PHP_SELF'] === '/index.php')
            {
                echo 'style="position: fixed; left: 50%; bottom:0;"';
            }
            elseif($_SERVER['PHP_SELF'] === '/impressum.php') 
            {
                 echo 'style="display: none;"';
            }
            ?>><a href="impressum.php" style="color: wheat; font-style: normal;">Kontakt</a></footer>

</body>
</html>
