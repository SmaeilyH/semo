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
if (isset($_POST['edit'])){
    if(isset($_POST['about'])){
        $query = $conn->query("SELECT * FROM `data` WHERE id=1");
        $fetch = $query->fetch_array(MYSQLI_ASSOC);
        $datatab = $fetch['about'];
        $query2 = $conn->query("UPDATE `data` SET `about`='" . $_POST['about'] . "',`previous_about`='" . $datatab . "' WHERE `id`=1");
        $text = '<form action="' . $addres . 'admin/edit' . '" method="post"><h1 style="color: green">Successful</h1><input type="submit" value="Back" /><input type="hidden" name="tab" value="edit-about" /></form>';
    }
    if(isset($_POST['contact'])){
        $query = $conn->query("SELECT * FROM `data` WHERE id=1");
        $fetch = $query->fetch_array(MYSQLI_ASSOC);
        $datatab = $fetch['contact'];
        $query2 = $conn->query("UPDATE `data` SET `contact`='" . $_POST['contact'] . "',`previous_contact`='" . $datatab . "' WHERE `id`=1");
        $text = '<form action="' . $addres . 'admin/edit' . '" method="post"><h1 style="color: green">Successful</h1><input type="submit" value="Back" /><input type="hidden" name="tab" value="edit-contact" /></form>';
    }
} elseif (isset($_POST['previous-about'])) {
    $query = $conn->query("SELECT * FROM `data` WHERE id=1");
    $fetch = $query->fetch_array(MYSQLI_ASSOC);
    $datap = $fetch['previous_about'];
    $data = $fetch['about'];
    $query2 = $conn->query("UPDATE `data` SET `about`='" . $datap . "',`previous_about`='" . $data . "' WHERE `id`=1");
    $text = '<form action="' . $addres . 'admin/edit' . '" method="post"><h1 style="color: green">Successful</h1><input type="submit" value="Back" /><input type="hidden" name="tab" value="edit-about" /></form>';
} elseif (isset($_POST['previous-contact'])) {
    $query = $conn->query("SELECT * FROM `data` WHERE id=1");
    $fetch = $query->fetch_array(MYSQLI_ASSOC);
    $datap = $fetch['previous_contact'];
    $data = $fetch['contact'];
    $query2 = $conn->query("UPDATE `data` SET `contact`='" . $datap . "',`previous_contact`='" . $data . "' WHERE `id`=1");
    $text = '<form action="' . $addres . 'admin/edit' . '" method="post"><h1 style="color: green">Successful</h1><input type="submit" value="Back" /><input type="hidden" name="tab" value="edit-contact" /></form>';
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
        if (isset($_POST['tab']) && $_POST['tab'] != ""){
            if($_POST['tab'] == 'edit-about'){
                $nametab = 'about';
            }
            if($_POST['tab'] == 'edit-contact'){
                $nametab = 'contact';
            }
            $query = $conn->query("SELECT * FROM `data` WHERE id=1");
            $fetch = $query->fetch_array(MYSQLI_ASSOC);
            $datatab = $fetch[$nametab];
        ?>
        <form  method="post" >
            <textarea name="<?php echo $nametab; ?>" id="editor1" rows="10" cols="80">
                <?php echo $datatab; ?>
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( '<?php echo $nametab; ?>' );
            </script>
            <input type="submit" name="edit" />
            <a href="<?php echo $addres . 'admin'; ?>">Back</a>
        </form>
        <form method="post">
            <input type="submit" value="Previous Text" name="previous-<?php echo $nametab; ?>" />
        </form>
        <?php } elseif (isset ($text) && $text != '') {echo $text;} else {header('Location: ' . $addres . 'admin/home');} ?>
    </body>
</html>
