<?php 
session_start();
?>

<?php include "includes/header.php"?>
        <section class="d-flex mt-3">
            <div class="w-75 ml-4">
                <div class=" ml-0">
                <h2>Blogs</h2>
                    <div class="media border p-3 mb-2">
                        <img src="" alt="John Doe" class="mr-3 mt-3 rounded-circle disp_pic" style="width:60px;" >
                        <div class="media-body">
                            <h4><span class="disp_title"></span> <sub><span class="disp_name ml-1 mr-2"></span><i class="disp_date"></i></sub></h4>
                            <p class="disp_con"></p>
                            <a href="article.php" class="disp_link" style="text-decoration:none; "><button type="button" class="btn btn-outline-primary">Read more</button></a>
                        </div>
                    </div>
                    <div class="media border p-3 mb-2">
                        <img src="" alt="John Doe" class="mr-3 mt-3 rounded-circle disp_pic" style="width:60px;" >
                        <div class="media-body">
                            <h4><span class="disp_title"></span> <sub><span class="disp_name ml-1 mr-2"> </span><i class="disp_date"></i></sub></h4>
                            <p class="disp_con"></p>
                            <a href="article.php" class="disp_link" style="text-decoration:none; "><button type="button" class="btn btn-outline-primary">Read more</button></a>
                        </div>
                    </div>
                    <div class="media border p-3 mb-2">
                        <img src="" alt="John Doe" class="mr-3 mt-3 rounded-circle disp_pic" style="width:60px;" >
                        <div class="media-body">
                            <h4><span class="disp_title"></span> <sub><span class="disp_name ml-1 mr-2"> </span><i class="disp_date"></i></sub></h4>
                            <p class="disp_con"></p>
                            <a href="article.php" class="disp_link" style="text-decoration:none; "><button type="button" class="btn btn-outline-primary">Read more</button></a>
                        </div>
                    </div>
                    <div class="media border p-3 mb-2">
                        <img src="" alt="John Doe" class="mr-3 mt-3 rounded-circle disp_pic" style="width:60px;" >
                        <div class="media-body">
                            <h4><span class="disp_title"></span> <sub><span class="disp_name ml-1 mr-2"> </span><i class="disp_date"></i></sub></h4>
                            <p class="disp_con"></p>
                            <a href="article.php" class="disp_link" style="text-decoration:none; "><button type="button" class="btn btn-outline-primary">Read more</button></a>
                        </div>
                    </div>
                    <div class="media border p-3 mb-2">
                        <img src="" alt="John Doe" class="mr-3 mt-3 rounded-circle disp_pic" style="width:60px;" >
                        <div class="media-body">
                            <h4><span class="disp_title"></span> <sub><span class="disp_name ml-1 mr-2"> </span><i class="disp_date"></i></sub></h4>
                            <p class="disp_con"></p>
                            <a href="article.php" class="disp_link" style="text-decoration:none; "><button type="button" class="btn btn-outline-primary">Read more</button></a>
                        </div>
                    </div>
    
                   
                      
                     
                    
              
            </div>
            </div>
            <div class="flex-grow-1 mt-5 ml-5 mr-3" style=" height: 180px;">
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
            
        
        
        
        </section>
<?php include "includes/footer.php"?>

<?php
     
    if(isset($_GET['trending']))
    {
        if(!empty($_GET['trending']))
        {
            
            $keyword = $_GET['trending'];
            $conn = mysqli_connect('localhost','root','','blogflix');
            $query_pic = "SELECT * FROM `members`";
            $result_pic=mysqli_query($conn,$query_pic);
            $row_pic=array();
            $j=0;
            while($row_pic[$j]=mysqli_fetch_assoc($result_pic))
            {
                $j++;
            }

            $query = "SELECT * FROM `blog` WHERE `tags` = '".mysqli_real_escape_String($conn,$keyword)."' ORDER BY `date_posted` DESC LIMIT 5"; 
            $result=mysqli_query($conn,$query);
            $row=array();
            $i=0;
            while($row[$i]=mysqli_fetch_assoc($result))
            {
                for($k=0; $k<$j; $k++)
                {
                    if($row[$i]['name'] === $row_pic[$k]['name'])
                    {
                        $row[$i]['pic'] = './'.$row_pic[$k]['src'];
                        break;
                    }
                    else
                        $row[$i]['pic'] = './images/img_default.png';
                }
                $i++;
            }
            $i--;
            mysqli_close($conn);
        }
    }
    


?>
<script>
    var pics = document.getElementsByClassName("disp_pic");
    var title = document.getElementsByClassName("disp_title");
    var author = document.getElementsByClassName("disp_name");
    var date = document.getElementsByClassName("disp_date");
    var content = document.getElementsByClassName("disp_con");
    var link = document.getElementsByClassName("disp_link");
    var rowsjson = <?php echo json_encode($row) ?>;
    for(x=0; x<5; x++)
        {
             
            title[x].innerHTML = rowsjson[x]['title'] ;
            author[x].innerHTML ='- '+ rowsjson[x]['name'] ;
            date[x].innerHTML =  'posted on ' +rowsjson[x]['date_posted'];
            content[x].innerHTML = rowsjson[x]['content'] ;
            link[x].href += '?title='+ rowsjson[x]['title'];
            pics[x].src =  rowsjson[x]['pic'];
        }
</script>


       