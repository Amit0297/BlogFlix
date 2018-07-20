<?php session_start();?>
<?php

if($_SESSION['login'] == true){
    if(isset($_POST['name'], $_POST['tags'], $_POST['date'], $_POST['title'], $_POST['content']))
    {
        $name = nl2br($_POST['name']);
        $tags = nl2br($_POST['tags']);
        $date = nl2br($_POST['date']);
        $title = nl2br($_POST['title']);
        $content = nl2br($_POST['content']);
        $title =str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n")," ",$title);
        $content =str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n")," ",$content);
    
        
        $conn = mysqli_connect('localhost','root','','blogflix');
        $query = "INSERT INTO `blog`(`name`, `date_posted`, `tags`, `title`, `content`) VALUES ('".mysqli_real_escape_String($conn,$name)."', '".mysqli_real_escape_String($conn,$date)."', '".mysqli_real_escape_String($conn,$tags)."', '".mysqli_real_escape_String($conn,$title)."', '".mysqli_real_escape_String($conn,$content)."')" ;
           $result=mysqli_query($conn,$query);
        mysqli_close($conn);
    }
    else
        header("Location:post.php");
}
else
    header("Location:index.php");
   ?>

<?php include "includes/header.php"?>
<?php
    if($result)
        echo"<div style='font-size:2rem'; text-align:center>Succesfully posted</div><br/>";
else
    echo"<div style='font-size:3rem'>Succesfully posted</div><br/>" ;
echo" <a href='Logout.php'>Logout</a>";


?>

<?php include "includes/footer.php"?>