<?php
if(isset($_COOKIE["user"]) && isset($_COOKIE["pass"]) && $_COOKIE["pass"] != "" && $_COOKIE["user"] != ""){
    $user = $_COOKIE["user"];
    $pass = md5($_COOKIE["pass"]);
    $query = $conn->query("SELECT * FROM `config` WHERE id=1 AND admin_user='$user' AND admin_pass='$pass'");
    setcookie("user",$_COOKIE["user"],time()+3600);
    setcookie("pass",$_COOKIE["pass"],time()+3600);
    if(mysqli_num_rows($query) != 1){
        header('Location: ' . $addres . 'admin/login');
    }
}  else {
    header('Location: ' . $addres . 'admin/login');
}
if(isset($_POST['etid'])) {
    $query2 = $conn->query("UPDATE `products` SET `name`='" . $_POST['name'] . "',`description`='" . $_POST['text'] . "',`type`='" . $_POST['type'] . "' WHERE `id`=" . $_POST['etid']);
    $text = '<form action="' . $addres . 'admin/products' . '" method="post"><h1 style="color: green">Successful</h1><input type="submit" value="Back" name="edit" /><input type="hidden" name="id" value="' . $_POST['etid'] . '" /></form>';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CPAdmin</title>
        <script src="../ex/ckeditor/ckeditor.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        if (isset($_POST['edit']) && $_POST['edit'] != ""){
            $prid = $_POST['id'];
            $query = $conn->query("SELECT * FROM `products` WHERE id=" . $prid);
            $fetch = $query->fetch_array(MYSQLI_ASSOC);
        ?>
        <form method="post">
            <label>Name: <input type="text" name="name" value="<?php echo $fetch['name']; ?>" /></label><br />
            <label>Description: 
                <textarea name="text" id="editor1" rows="10" cols="80">
                    <?php echo $fetch['description']; ?>
                </textarea>
            </label><br />
            <label dir="rtl">Type:<label>لوله<input type="radio" name="type" value="1" <?php if($fetch['type'] == 1){echo ' checked=""';} ?> /></label><label>اتصال<input type="radio" name="type" value="2"  <?php if($fetch['type'] == 2){echo ' checked=""';} ?> /></label></label><br />
            <input type="hidden" name="etid" value="<?php echo $fetch['id']; ?>" />
            <input type="submit" /><a href="<?php echo $addres . 'admin/products'; ?>">Back</a>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'text' );
            </script>
        </form>
        <?php } elseif (isset ($text) && $text != '') {echo $text;} else {header('Location: ' . $addres . 'admin/home');} ?>
    </body>
</html>
