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
        ajouter un niveau
      </h1>
     <center><label for="login" style="color:#A2CA71;font-weight: bolder;font-size: 25px;">donner le nom du niveau</label></center>
     <br> 
        <input  class="form-control" style="width: 70%; margin-left: 15%;border-radius: 20px;outline: 3px green solid;"  type="text" placeholder="niveau" name="n">
   
   
<br>
<input type="submit" class="btn btn-success" style="width: 50%; margin-left: 25%;" value="ajouter">  
        <?php
        require "conn.php";
        ?>
    </form>

    <?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $n=$_POST["n"];
      try{
        $db->exec("insert into niveau values('$n');");
        echo "<div class='alert-success'>le niveau est bien enregistré</div>";
      }catch(PDOException $e){
        echo "<div class='alert-primary'>".$e->getMessage()."</div>";
     }
 
    }
    ?>
    </div>
</body>
</html>