<meta charset="UTF-8">
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
if(isset($_POST['submit'])){
    $file_error = $_FILES["file"]["error"];
    $file_name = $_FILES["file"]["name"];
    $file_type = $_FILES["file"]["type"];
    $file_size = ($_FILES["file"]["size"] /1024);

    if (
            ($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/bmp")
    || ($_FILES["file"]["type"] == "image/x-icon")

    )


      {
            if ($file_error >0)
            {
                    echo "Error : " . $file_error . "<br />";
            }
            else
            {
            if (file_exists("ex/photo/gallery/" . $file_name))
                    {
                            $new_name = rand();
                            @rename($file_name , $new_name .= $file_name);
                            move_uploaded_file($_FILES["file"]["tmp_name"] , "ex/photo/gallery/" .$new_name);
                    }
            else
                    {
                            $new_name = rand();
                            @rename($file_name , $new_name .= $file_name);
                            move_uploaded_file($_FILES["file"]["tmp_name"] , "ex/photo/gallery/" .$new_name);
                    }
            }
            $query2 = $conn->query("INSERT INTO `gallery`(`date`, `title`, `type`, `img`) VALUES ('" . $_POST['date'] . "','" . $_POST['title'] . "','" . $_POST['type'] . "','" . $new_name . "')");
            
            if($_POST['type'] == 1){$typefile = 'خط تولید';}  elseif($_POST['type'] == 2) {$typefile = 'آزمایشگاه';} elseif($_POST['type'] == 3) {$typefile = 'انبار';}
            echo '<table id="table" border="1px">
                <tr><td>Title:</td><td>' . $_POST['title'] . '</td></tr><br />
                <tr><td>Date:</td><td>' . $_POST['date'] . '</td></tr><br />
                <tr><td>Type:</td><td>' . $typefile . '</td></tr><br />
                <tr><td>Image:</td><td><img width="200" height="200" src="' . $addres . "ex/photo/gallery/" . $new_name . '" /></td></tr><br />
                </table>
                <form action="' . $addres . 'admin/gallery' . '" method="post"><h1 style="color: green">Successful</h1><input type="submit" value="Back" name="edit" /></form>';
    }
     else{
            echo " <h2>This file is not supported</h2> ";
     }
}