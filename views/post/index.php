<!-- Print one post -->
<?php if ($post): ?>
    <div class="tit"><?= $post['Title']; ?></div>
    <p><?= $post['Post']; ?></p>

    <div><h4>Time:</h4><p><?= $post['Time']; ?></p></div>
    <p><h4>Author: <?= $post['Author']; ?></h4> 


<?php else: ?>
    <h2>Post not found</h2>
<?php endif; ?>

