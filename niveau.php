<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body style="background-color: #f9f9f9;">
    <style>
          .voire{
        color: darkgreen;
        border: 2px solid darkgreen;
        padding: 10px;
        border-radius: 20px;
        margin: 5px;
        transition-duration: 0.3s;
        text-decoration: none;
       }
       .voire:hover{
        background-color:darkgreen;
        color: white;
        text-decoration: none;
       }
         .item{
        transition-duration: 0.3s;
        padding: 15px;
       }
       .item:hover{
        box-shadow: 10px 10px 10px rgb(10, 10, 10,0.3) , 8px  8px 10px white;
       }
    </style>
    <h1 class="text-center text-success">
        <a href='prog3.php' style='position:absolute;right:20px;top:10px' class='btn btn-primary' >retour</a><?php
     require "conn.php";
     echo $_GET["n"];
    ?></h1>
    <?php
    echo "<center><a href='ajoutergroup.php?n=".$_GET["n"]."' class='btn btn-warning'>+</a></center>";
    ?>
    
    <div class="row">
        <?php
        
         $n=$_GET["n"];
         $r=$db->prepare("select * from grop where niveau='$n';");
         $r->execute();
         $l=$r->fetchAll();
         foreach($l as $x){
            $r=$db->prepare("select count(*) from eleve_group where grop='".$x["grop"]."';");
            $r->execute();
            $l2=$r->fetchAll();
            $nbre=$l2[0][0];
            echo "<div class='col-md-4 mb-3 item' id='".$x["grop"]."'>
                <h2 class='text-center' style='color: darkgreen'>".$x["grop"]."</h2>
                <p class='text-center'>nombre des eleves:$nbre</p>
                <center><a href='group.php?grop=".$x["grop"]."' class='voire'>voire</a></center>
            </div>";
         }
          ?>
       
       
       
        
    </div>
</body>
</html>