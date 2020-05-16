<?php 
$Connection=mysqli_connect('localhost','root','');
$ConnectionDB=mysqli_select_db($Connection,'injection');


if(! $Connection ) {
            die('Could not connect: ' . mysql_error());
         }


 ?>