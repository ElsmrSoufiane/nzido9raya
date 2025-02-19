<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">

</head>
<form action="" method="post" >
<body style="  background-image: linear-gradient(to right, green , yellow);">
<?php
  echo " <a href='niveau.php?n=".$_GET["n"]."' style='position:absolute;right:20px;top:10px' class='btn btn-primary' >retour</a>";
  ?>
    <div style="border-radius: 20px;width: 50%;margin: 30px 25%;background-color: white;padding: 20px;">
      <h1 class="text-center" style="color: #00712D;">
        ajouter un groupe
      </h1>
     <center><label for="login" style="color:#A2CA71;font-weight: bolder;font-size: 25px;">donner le nom du groupe</label></center>
     <br> 
        <input  class="form-control" style="width: 70%; margin-left: 15%;border-radius: 20px;outline: 3px green solid;"  type="text" placeholder="nome" name="grop">
   
        <center><label for="login" style="color:#A2CA71;font-weight: bolder;font-size: 25px;">choisis un professeur</label></center>
     <br> 
        <select  class="form-control" style="width: 70%; margin-left: 15%;border-radius: 20px;outline: 3px green solid;"   name="prof">
          <?php
           require "conn.php";
           $r=$db->prepare("select * from prof;");
           $r->execute();
           $l=$r->fetchAll();
           foreach($l as $x){
              echo "<option>".$x["nomp"]."</ option>";
           }
          ?>
</select>
<br><input type="submit" class="btn btn-success" style="width: 50%; margin-left: 25%;" value="ajouter">  
        
    </form>

    <?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
   
      $grop=$_POST["grop"];
      $prof=$_POST["prof"];
      $n=$_GET["n"];
      try{
        $db->exec("insert into grop(grop,niveau,nomp) values('$grop','$n','$prof');");
        echo "<div class='alert-success'>le groupe est bien enregistré</div>";
      }catch(PDOException $e){
        echo "<div class='alert-primary'>".$e->getMessage()."</div>";
     }
      
 
    }
    ?>
    </div>
</body>
</html>
