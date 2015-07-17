<!-- The page - add record -->
<style>
    body { font-size: 62.5%; }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:97%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    button{width: 99%; height: 40px;}
</style>
<form  action="add" method="post">
    <div class="tit"><p><b>Enter your post:</b></p></div>
    
    <p><input type="text" name="title" class="text ui-widget-content ui-corner-all" placeholder="Title"></p>

    <p>
         <textarea name="post" cols="71" rows="20"  class="text ui-widget-content ui-corner-all" placeholder="Post"></textarea>
    </p>

    <button type="submit"  class='submit'>Add new post</button><br />
</form>
   
    <script>
        $('button').button({
            icons: {
                secondary: "ui-icon-circle-plus"
            }
        });
    </script>

