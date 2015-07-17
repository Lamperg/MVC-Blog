<!-- Check admin-->
<?php if ($admin): ?>
    <style>    
        button{width: 99%; height: 30px;}
    </style>

    <div class="tit"> Welcome <?= $_SESSION['Email']; ?></div>  
    <form action="adminPanel">
        <p><button type="submit">Go to admin</button></p>
    </form>
    <script>
        $('button').button({
            icons: {
                secondary: "ui-icon-circle-arrow-e"
            }
        });
    </script>
    <!-- If email or pass is wrong - destroy  session, and delete all vars -->
<?php else: ?>
    <div class="tit">Invalid username and/or password!!</div>
    <?php
    unset($_SESSION['Email']);
    session_destroy();
    echo '<script>window.location.href = "login";</script>';
    exit();
    ?>
<?php endif; ?>


