 <?php include "includes/header.php"?>
        <section class="d-flex mx-4 my-3">
            <div class="w-75">
                <h2 class="main_title"></h2>
                <article class="main_article">
                    
                </article>
                
            </div>
            
            <div class="flex-grow-1 d-flex flex-column ml-5">
                <div>
                     <div class="card ">
                     <div class="card-header bg-dark " style="color: white; text-align: center; font-weight: 700">Author</div>
                     <div class="p-2 text-center">
                         
                         <img src="images/img_default.png" width="100px" height="100px" style="border-radius: 50%" class="main_pic">
                         <p class="mt-2 mb-0 main_author">Amit Mishra</p>
                     
                     
                     </div> 
                    </div>
                </div>
                <div class="mt-4">
                     <div class="card h-100">
                     <div class="card-header bg-dark " style="color: white; text-align: center; font-weight: 700">Trending</div>
                     <div class>
                         <ul>
                             <li><a href="trending.php?trending=IOT">#IOT</a></li>
                             <li><a href="trending.php?trending=AI">#AI</a></li>
                             <li><a href="trending.php?trending=Robotics">#Robotics</a></li>
                             <li><a href="trending.php?trending=Big Data">#Big Data</a></li>
                             <li><a href="trending.php?trending=Blockchain">#Blockchain</a></li>
                         </ul>
                     
                     
                     </div> 
                </div>
                
                </div>
            
            </div>
        
        
        </section>
<?php include "includes/footer.php"?>
<?php
    if(isset($_GET['title']))
    {
        if(!empty($_GET['title']))
        {
            
            $keyword = $_GET['title'];
            $conn = mysqli_connect('localhost','root','','blogflix');
            $query_pic = "SELECT * FROM `members`";
            
            $result_pic=mysqli_query($conn,$query_pic);
            $row_pic=array();
            $j=0;
            while($row_pic[$j]=mysqli_fetch_assoc($result_pic))
            {
                $j++;
            }
            $query = "SELECT * FROM `blog` WHERE `title` = '".mysqli_real_escape_String($conn,$keyword)."'";
            $res = mysqli_query($conn,$query);
            $result = mysqli_fetch_assoc($res);
             for($k=0; $k<$j; $k++)
             {
                 if($result['name'] === $row_pic[$k]['name'])
                 {
                     $result['pic'] = './'.$row_pic[$k]['src'];
                 }
                 else
                     $result['pic'] = './images/img_default.png';
             }
            mysqli_close($conn);
            
        }
    }





?>
<script>
    var rowsjson = <?php echo json_encode($result) ?>;
    document.getElementsByClassName("main_title")[0].innerHTML = rowsjson['title'];
    document.getElementsByClassName("main_article")[0].innerHTML =  rowsjson['content'];
     document.getElementsByClassName("main_author")[0].innerHTML = rowsjson['name'];
    document.getElementsByClassName("main_pic")[0].src = rowsjson['pic'];
</script>
