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
  echo " <a href='group.php?grop=".$_GET["grop"]."' style='position:absolute;right:20px;top:10px' class='btn btn-primary' >retour</a>";
  ?>
    <div style="border-radius: 20px;width: 50%;margin: 30px 25%;background-color: white;padding: 20px;">
     
     <center><label for="login" style="color:#A2CA71;font-weight: bolder;font-size: 25px;">choisis un etudiant</label></center>
     <br> 
     <select  class="form-control" style="width: 70%; margin-left: 15%;border-radius: 20px;outline: 3px green solid;"   name="eleve">
          <?php
           require "conn.php";
           $r=$db->prepare("select * from eleve;");
           $r->execute();
           $l=$r->fetchAll();
           foreach($l as $x){
              echo "<option>".$x["nom"]."</ option>";
           }
          ?>
        
</select>
<br><input type="submit" class="btn btn-success" style="width: 50%; margin-left: 25%;" value="ajouter">  
        
    </form>

    <?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
   
      $eleve=$_POST["eleve"];

      try{
        $db->exec("insert into eleve_group values('".$eleve."','".$_GET["grop"]."');");
        $r=$db->prepare("select * from mois;");
        $r->execute();
        $mois=$r->fetchAll();
        foreach($mois as $x){
            $db->exec("insert into paiement(mois,nom,grop,etat) values(".$x["mois"].",'".$eleve."','".$_GET["grop"]."','non paié');");

        }
        echo "<div class='alert-success'>l'etudaiint est bien enregistré dans le groupe ".$_GET["grop"]."</div>";
        

      }catch(PDOException $e){
        echo "<div class='alert-primary'>".$e->getMessage()."</div>";
     }
      
 
    }
    ?>
    </div>
</body>
</html>
