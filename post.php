<?php session_start();?>
<?php

if(isset($_POST['uname'], $_POST['pwd'])){
    
       if(!(empty($_POST['uname'])&&(empty($_POST['pwd']))))
       {
           $uname = $_POST['uname'];
           $pwd = $_POST['pwd'];
           $conn = mysqli_connect('localhost','root','','blogflix');
           $query = "SELECT * FROM `admin` WHERE `uname`='".mysqli_real_escape_String($conn,$uname)."'AND `password`='".mysqli_real_escape_String($conn,$pwd)."'" ;
           $result=mysqli_query($conn,$query);
           if(mysqli_num_rows($result))
           {
               $_SESSION['login']=true;
               $_SESSION['user']=$uname;
               mysqli_close($conn);
           }
           else
               header("Location:index.php");
               
           
       }
    else
        header("Location:index.php");
       
           
}
else
    header("Location:index.php");
   
   ?>

<?php include "includes/header.php"?>
        <div class="container w-75 bg-secondary mt-5 p-4">
            <form action="success.php" method="post">
                <div class="form-group w-50">
                    <input type="text" class="form-control" id="usr" name="name" placeholder="Name">
                </div>
                <div class="form-group w-50">
                    <input type="text" class="form-control" id="tags"  name="tags" placeholder="Tags">
                </div>
                <div class="form-group w-25">
                    <input type="date" class="form-control" id="date" name="date">
                </div>
                <div class="form-group ">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="12" cols="20" wrap="hard" name="content" id="content"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary ">Post</button>
                
                </div>
                
                
            
            
            
            </form>
        
        </div>
<?php include "includes/footer.php"?>