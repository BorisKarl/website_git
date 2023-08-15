<div id="fip">
        <h1 style="margin-top: 0;">Songdaten aus der FIP Radio France API</h1>
        <p>Aktueller Künstler: </p> <h1 style="margin: 0;"> 

        <?php if(!empty($artists[0][0])) {
            echo implode($artists[3]); ?>
           </h1>
        <p style="text-align: center;">mit dem Song: <br> <br> "<?php echo $songs[3];?>"
        vom Album "<?php echo $albums[3];?>" aus dem Jahr <?php echo $released[3]; ?>.
        <a href="<?php echo $apple_link[3]; ?>"><br>Link zu apple music</a>
        </p>
        <p>Davor:
        <?php echo implode($artists[2]); ?> mit dem Song "<?php echo $songs[2];?>".
        </p>
        <p>Es folgt: <?php echo implode($artists[4]); ?> mit dem Titel "<?php echo $songs[4];?>".</p>
  </div>

  <a href="fipdb.php">Zur Datenbank</a>

  <form id="insert_form" action="insert.php" method="post">
      <input type="hidden" name="name" value="<?php echo e(implode($artists[3])); ?>" />
      <input type="hidden" name="title" value="<?php echo e($songs[3]); ?>" />
      <input type="hidden" name="album" value="<?php echo e($albums[3]); ?>" />
      <input type="hidden" name="jahr" value="<?php echo e($released[3]); ?>" />
      <input type="submit" value="Aktuellen Künstler merken!">
</form>


   <form action="insert.php" method="post">
        <input type="hidden" name="name" value="<?php echo e(implode($artists[2])); ?>" />
        <input type="hidden" name="title" value="<?php echo e($songs[2]); ?>" />
        <input type="hidden" name="album" value="<?php echo e($albums[2]); ?>" />
        <input type="hidden" name="jahr" value="<?php echo e($released[2]); ?>" />
        <input type="submit" value="Künstler davor merken!">
  </form>
<?php  }else{
               ?> <h1><?php echo $artistName; ?> </h1>
               <p>Podcast ohne Künstlerdaten.</p>
            <?php }; ?> 

            <h1 style="margin-top: 1em; padding-top: 1em;">Liedtext</h1>
<?php echo $embeded_lyrics; ?>
