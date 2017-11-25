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
    $query2 = $conn->query("UPDATE `gallery` SET `title`='" . $_POST['title'] . "',`date`='" . $_POST['date'] . "',`type`='" . $_POST['type'] . "' WHERE `id`=" . $_POST['etid']);
    $text = '<form action="' . $addres . 'admin/gallery' . '" method="post"><h1 style="color: green">Successful</h1><input type="submit" value="Back" name="edit" /><input type="hidden" name="id" value="' . $_POST['etid'] . '" /></form>';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CPAdmin</title>
    </head>
    <body>
        <?php
        if (isset($_POST['edit']) && $_POST['edit'] != ""){
            $prid = $_POST['id'];
            $query = $conn->query("SELECT * FROM `gallery` WHERE id=" . $prid);
            $fetch = $query->fetch_array(MYSQLI_ASSOC);
        ?>
        <form method="post">
            <label>Title: <input type="text" name="title" value="<?php echo $fetch['title']; ?>" /></label><br />
            <label>Date: <input type="text" name="date" value="<?php echo $fetch['date']; ?>" /></label><br />
            <input type="hidden" name="etid" value="<?php echo $fetch['id']; ?>" />
            <label dir="rtl">Type:<label>خط تولید<input type="radio" name="type" value="1" <?php if($fetch['type'] == 1){echo ' checked=""';} ?> /></label><label>آزمایشگاه<input type="radio" name="type" value="2"  <?php if($fetch['type'] == 2){echo ' checked=""';} ?> /></label><label>انبار لوله<input type="radio" name="type" value="3"  <?php if($fetch['type'] == 3){echo ' checked=""';} ?> /></label></label><br />
            <input type="submit" /><a href="<?php echo $addres . 'admin/gallery'; ?>">Back</a>
        </form>
        <?php } elseif (isset ($text) && $text != '') {echo $text;} else {header('Location: ' . $addres . 'admin/home');} ?>
    </body>
</html>
