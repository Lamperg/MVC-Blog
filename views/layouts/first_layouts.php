<? header("Content-Type: text/html; charset=utf-8");?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
        <meta content="true" name="mssmarttagspreventparsing" />
        <meta http-equiv="imagetoolbar" content="no" />
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.11.4/jquery-ui.min.js"></script>
        <link rel="SHORTCUT ICON" href="../images/icons/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.11.4/themes/sunny/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="/css/style.css"/> 
        <title>Moroz Blog</title>

    </head>

    <body>

        <!-- Header -->
        <div id="hdr">
            <!-- Logo -->
            <div id="logo">
                <a href="/"></a>
            </div>

            <!-- Slogan -->
            <p class="htit">m y  &nbsp;p e r s o n a l  &nbsp;b l o g &nbsp;</p>

            <!-- Main Menu -->
            <div id="menu">
                <a class="menu_freeb" href="/">Home</a>
                <!--the authorization check-->
                <?php if (!isset($_SESSION['Email']) && empty($_SESSION['Email'])): ?>
                    <a class="menu_grap" href="login" id="login">Log in</a>                    
                    <?php else: ?>
                    <a class="menu_grap" href="logout" id="login">Logout</a>                   
                    <?php endif; ?>                
                    <a class="menu_frm" href="info">Info</a>
                    <!-- <a class="menu_fnt" href="#">Fonts</a>-->
            </div>
        </div>
        <div id="cnt">

            <!-- Main - Center Column -->
            <div class="post">

                <?php
                include ($contentPage);
                ?>

            </div>

            <!-- Pagination -->
            <div id="pagination">
                <span class="prev">&laquo; Prev</span>
                <span class="page_num_activ">1</span>
                <a class="page_num" href="#">2</a>
                <a class="page_num" href="#">3</a>
                <a class="page_num" href="#">4</a>
                <a class="next" href="#">Next &raquo;</a>
            </div>

        </div>
        <!-- Footer -->
        <div id="foo">
            <div id="foot_menu">		
                <span class="f_left">&copy; 2015 Moroz Sergey</span>		
            </div>
        </div>

    </body>
</html>