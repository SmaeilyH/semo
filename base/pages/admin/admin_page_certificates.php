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
if(isset($_POST['delete'])){
    $query = $conn->query("DELETE FROM `certificates` WHERE `id`=" . $_POST['id']);
    unlink('ex/photo/certificates/' . $_POST['img']);
    $text = '<form action="' . $addres . 'admin/certificates' . '" method="post"><h1 style="color: green">Successful</h1><input type="submit" value="Back" name="edit" /></form>';
}
if(isset($_POST['state'])){
    if($_POST['state'] == 'Inactive'){
        $query = $conn->query("UPDATE `certificates` SET `ac`=0 WHERE `id`=" . $_POST['id']);
    }  else {
        $query = $conn->query("UPDATE `certificates` SET `ac`=1 WHERE `id`=" . $_POST['id']);
    }
    $text = '<form action="' . $addres . 'admin/certificates' . '" method="post"><h1 style="color: green">Successful</h1><input type="submit" value="Back" name="edit" /></form>';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CPAdmin</title>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <?php if(isset ($text) && $text != '') {echo $text;} else { ?>
        <table style="width: 100%;direction: rtl;">
            <tr>
                <th>#</th>
                <th>Description</th> 
                <th>Image</th>
                <th>State</th>
                <th>Operation</th>
            </tr>
            <?php
            $query = $conn->query("SELECT * FROM `certificates`");
            while ($fetch = $query->fetch_array(MYSQLI_ASSOC)){
            ?>
            <tr style="text-align: center;">
                <td><?php echo $fetch['id']; ?></td>
                <td><?php echo $fetch['name'];  ?></td>
                <td><a href="../ex/photo/certificates/<?php echo $fetch['img']; ?>" target="_blank"><img src="../ex/photo/certificates/<?php echo $fetch['img']; ?>" width="75px" /></a></td>
                <td><?php if($fetch['ac'] == 1){echo '<h3 style="color: green">Active</h3>';}  else {echo '<h3 style="color: red">Inactive</h3>';} ?></td>
                <td>
                    <form action="<?php echo $addres . 'admin/opcr'; ?>" method="post"><input type="submit" name="edit" value="Edit" /><input type="hidden" name="id" value="<?php echo $fetch['id']; ?>" /></form>
                    <form method="post"><input type="submit" name="delete" value="Delete" /><input type="hidden" name="id" value="<?php echo $fetch['id']; ?>" /><input type="hidden" name="img" value="<?php echo $fetch['img']; ?>" /></form>
                    <form method="post"><?php if($fetch['ac'] == '1'){ ?><input type="submit" name="state" value="Inactive" /><?php }  else { ?><input type="submit" name="state" value="Active" /><?php } ?><input type="hidden" name="id" value="<?php echo $fetch['id']; ?>" /></form>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a href="<?php echo $addres . 'admin/adcr'; ?>">Add a new Certificate</a><br /><a href="<?php echo $addres . 'admin/'; ?>">Back</a>
        <?php } ?>
    </body>
</html>