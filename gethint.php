<?php
error_reporting(E_PARSE | E_ERROR);
$con = mysqli_connect('localhost','root','','blogflix');
$qry = "SELECT `title` FROM `blog`";
$result=mysqli_query($con,$qry);
$a=array();
$i=0;
while($row=mysqli_fetch_assoc($result))
{
    array_push($a, $row['title']);
}

mysqli_close($con);
// get the q parameter from URL
$q = $_REQUEST["q"];
$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= "<br/>" ;
                $hint .= $name;
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>