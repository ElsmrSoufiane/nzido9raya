<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">

</head>
<form action="" method="post" enctype="multipart/form-data"  >
<body style="  background-image: linear-gradient(to right, green , yellow);">
<?php
  echo " <a href='group.php?grop=".$_GET["grop"]."' style='position:absolute;right:20px;top:10px' class='btn btn-primary' >retour</a>";
  ?>
    <div style="border-radius: 20px;width: 50%;margin: 30px 25%;background-color: white;padding: 20px;">
      <h1 class="text-center" style="color: #00712D;">
        ajouter un emploi
      </h1>
     <center><label for="login" style="color:#A2CA71;font-weight: bolder;font-size: 25px;">choisis un fichier</label></center>
     <br> 
        <input  class="form-control" style="width: 70%; margin-left: 15%;border-radius: 20px;outline: 3px green solid;"  type="file"  name="f">
   
   
<br>
<input type="submit" class="btn btn-success" style="width: 50%; margin-left: 25%;" value="ajouter">

        
        <?php
        require "conn.php";
        ?>
    </form>

    <?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $grop=$_GET["grop"]; 
      $photo=$_FILES["f"];
      $t=explode(".",$photo["name"])[1];
      $type=strtolower($t);
      if(in_array($type,["png","jpg","jpeg","jfif"])){
        move_uploaded_file($photo["tmp_name"],$photo["name"]);
        $db->exec("insert into emploi(grop,emplacement,dt) values('$grop','".$photo["name"]."','".date("Y-m-d",time())."');");
        echo "<div class='alert-success'>l'emploi est bien enregistré</div>";
      }else{
        echo "<div class='alert-primary'>le fichier doit etre une photo</div>";
     }
 
    }
    ?>
    </div>
</body>
</html>
