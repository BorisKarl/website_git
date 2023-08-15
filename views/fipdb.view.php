
<?php if(!empty($entries)): ?>

    <h2>Historie</h2>
    <table id="table">
        <tr>
        <th>Künstler</th>
        <th>Titel</th>
        <th>Album</th>
        <th>VÖ</th>
        </tr>
        <?php foreach($entries AS $entry): ?>
        <tr>
        <td><?php echo $entry->name; ?></td>
        <td><?php echo $entry->title; ?></td>
        <td><?php echo $entry->album; ?></td>
        <td><?php echo $entry->jahr; ?></td>
        <?php endforeach ?>
        </tr>
    </table>
    <?php else: ?>
        <p><?php echo e($errorMsg); ?> </p>
<?php endif ; ?>

<a href="fip.php">Zurück zur Fip Api</a>

