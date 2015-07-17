<!-- Displaying the update process -->
<?php if ($update): ?>
    <div class="tit">Updating was successful</div>
    <p></p>
    <p><?= $_SESSION['Email'] ?></p>              
<?php else: ?>
    <div class="tit">Error update</div>
<?php endif; ?>

