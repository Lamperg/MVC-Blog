<!-- Print all posts -->
 <style>   
        button{width: 15%; height: 10%; font-size: 50%}
    </style>
<!--the authorization check-->
    <?php if (!isset($_SESSION['Email']) && empty($_SESSION['Email'])): ?>
        <!--Hiding buttons -->
        <input name="add" type="hidden"> 

    <?php else: ?>

        <form action="adminPanel"> 
            <p><button type="submit" name="add">Add post</button><br />
                <script>
            $('button').button({
                icons: {
                    secondary: "ui-icon-bullet"
                }
            });
        </script>
        </form>
    <?php endif; ?>
<?php if ($posts): ?>
      
    <?php foreach ($posts as $onePost): ?> 


        <form action="dell" method="post">
            <div class="tit">    
                <?= $onePost['Title']; ?>
            </div>
            <div class="ptxt">
                <p><?= $onePost['Post']; ?></p> 
            </div>
            <a class="more-link" href="/post/?id=<?= $onePost['Id']; ?>">Read more...</a>           
            <!--the authorization check-->
            <?php if (!isset($_SESSION['Email']) && empty($_SESSION['Email'])): ?>
                <!--Hiding buttons -->
                <input name="delete" type="hidden"> 

            <?php else: ?>

                <p><button type="submit" name="delete" class='submit'>Delete</button>           
                    <button type="submit"  name="edit" class='submit' formaction="edit">Edit</button>                    
                </p> 
            <?php endif; ?>
            <!--Hidden input for transfer id_post to controller -->
            <input type="hidden" name="id_post"  value="<?= $onePost['Id'] ?>"/>

        </form>
        <script>
            $('button').button({
                icons: {
                    secondary: "ui-icon-bullet"
                }
            });
        </script>

        <?php
    endforeach;
    ?>
<?php else: ?>
    <h2>No available posts</h2>
<?php endif; ?>    



