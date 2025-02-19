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
<a href='prog3.php' style='position:absolute;right:20px;top:10px' class='btn btn-primary' >retour</a>
    <div style="border-radius: 20px;width: 50%;margin: 30px 25%;background-color: white;padding: 20px;">
      <h1 class="text-center" style="color: #00712D;">
        ajouter un etudiant
      </h1>
     <center><label for="login" style="color:#A2CA71;font-weight: bolder;font-size: 25px;">donner le nom d'etudiant</label></center>
     <br> 
        <input  class="form-control" style="width: 70%; margin-left: 15%;border-radius: 20px;outline: 3px green solid;"  type="text" placeholder="nome" name="nome">
   
   
<br>
<input type="submit" class="btn btn-success" style="width: 50%; margin-left: 25%;" value="ajouter">
        
        <?php
        require "conn.php";
        ?>
    </form>

    <?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      try{
        $nom=$_POST["nome"];
        $db->exec("insert into eleve values('$nom');");
        echo "<div class='alert-success'>l'etudiant est bien enregistré</div>";
      }catch(PDOException $e){
        echo "<div class='alert-primary'>".$e->getMessage()."</div>";
     }

 
    }
    ?>
    </div>
</body>
</html>
