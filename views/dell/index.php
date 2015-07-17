<!-- Displaying the removal process -->
<?php if ($post): ?>
    <div class="tit"><p>Deleting was successful</p></div>
    <p></p>
    <p><?= $_SESSION['Email'] ?></p>              
<?php else: ?>
    <div class="tit">Error delete</div>
<?php endif; ?>

