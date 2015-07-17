<!--The page login-->
<style>
    body { font-size: 62.5%; }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:97%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    button{width: 99%; height: 50px;}
</style>

<div class="tit">Enter your login and password</div>
<?php
if (isset($errMsg)) {
    echo '<div style="color:#FF0000;text-align:center;font-size:12px;">' . $errMsg . '</div>';
}
?>
<form  action="admin" method="post">
    <input type="text" name="email" class="text ui-widget-content ui-corner-all" placeholder="Email">
    <input type="password" name="pass" class="text ui-widget-content ui-corner-all" placeholder="Password">
    <button type="submit" name='submit' value="Submit" class='submit'>Sign in</button><br />
</form> 

<script>
    $('button').button({
        icons: {
            secondary: "ui-icon-circle-arrow-e"
        }
    });
</script>

