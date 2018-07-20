
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Amit">
        <title>BlogFlix</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link href="./assets/index.css" rel="stylesheet">
        <script src="./assets/JS/index.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
        <script>
            function showHint(str) {
                if (str.length == 0) { 
                    document.getElementById("sug1").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("sug1").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "gethint.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
            function changer(){
                var keyword = document.getElementById("search_box").value;
                document.getElementById("link_post").href = 'article.php?title=' + keyword;
    
                
            }
</script>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" width="80">
            
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item ml-1">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item ml-1">
                        <a class="nav-link" href="#footer">About</a>
                    </li>
                    <!--<li class="nav-item ml-1">
                        <a class="nav-link" href="#">Contact</a>
                    </li>--> 
                    <li class="nav-item ml-1 mr-2" id="p_true" style="display: <?php if($_SESSION['login']==false) echo'block'; else echo 'none';  ?>">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Post</a>
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Login</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="post.php" method="post">
                                            <div class="form-group">
                                                <label for="username">Usename:</label>
                                                <input type="text" class="form-control" id="uname" name="uname" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Password:</label>
                                                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="****">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
  
                    </li>
                    <li class="nav-item ml-1 mr-2"  style="display:none; display: <?php if($_SESSION['login']==true) echo'block'; else echo 'none';  ?>">
                        <a class="nav-link" href="Logout.php">Logout</a>
                        
                    
                    </li>

                </ul>
                <form class="form-inline dropdown" action="#" id="myForm" >
                    <input class="form-control mr-sm-2" id="search_box" type="text" placeholder="Enter Title" class=" dropdown-toggle" data-toggle="dropdown" onkeyup="showHint(this.value)">
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" id="sug1"> </a>
                    </div>
                    <a href="#" id="link_post"><button class="btn btn-primary" type="button"  onClick="changer()">Search</button></a>
                </form>
            </div>  
        </nav>
        