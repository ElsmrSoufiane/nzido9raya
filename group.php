<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body style="background-color: #f9f9f9;">
<a href='prog3.php' style='position:absolute;right:20px;top:10px' class='btn btn-primary' >retour</a>
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
    <h1 class="text-center text-success"><?php
    echo $_GET["grop"];
    ?></h1>
    <style>
           .titre::before{
        filter: blur(1rem);
        opacity: 0.8;
    }
        
    .titre::before, .titre::after{content: "";
    
                   position: absolute;
                   background-image: conic-gradient(from var(--x),#387F39 25%,#88ab5d 25%,#BEDC74 25%,#F6E96B 25%);
                   width: 105%;
                   height: 105%;
                   padding: 10px;
                   position: absolute;
                   top: 20% ;
                   left: 20%;
                   translate: -22% -22%;
                   z-index: -1;
                   animation: 1.5s h1e linear infinite;
                   border-radius: 20px;
        }
       @keyframes h1e{
        from{
            --x:0deg;
        }to{
            --x:360deg;
        }
       }
       @property --x{
        syntax: "<angle>";
            inherits: true;
            initial-value: 0deg;
       }
       .titre{
        width: fit-content;padding: 10px;border-radius: 20px;margin: 20px;position: relative;overflow: visible;background-color: white
       }
    </style>
    <h2 class="titre">eleves</h2>
    <?php
    echo "<center><a href='ajoutereg.php?grop=".$_GET["grop"]."' class='btn btn-warning'>+</a></center>";
    ?>
    
    <div class="row">
    <?php
    require "conn.php";
    $r=$db->prepare("select * from eleve_group where grop='".$_GET["grop"]."';");
    $r->execute();
    $l3=$r->fetchAll();
    foreach($l3 as $y){
        $r=$db->prepare("select * from eleve where nom='".$y["nom"]."';");
    $r->execute();
    $l2=$r->fetchAll();
    foreach($l2 as $z){
        $r=$db->prepare("select grop from eleve_group where nom='".$z["nom"]."';");
    $r->execute();
    $l3=$r->fetchAll();
    $grops="";
    foreach($l3 as $e){
        $grops=$grops.$e[0]."/";
    }
    echo " <div class='col-md-4 mb-3 item' id='".$z["nom"]."'>
    <h2 class='text-center' style='color: darkgreen'>".$z["nom"]."</h2>
    <p class='text-center'>groups:$grops</p>
    <center><a href='etudiant.php?nom=".$z["nom"]."' class='voire'>voire</a></center>
</div>";
    }
    }







?>
    </div>
    
 
   
   
    
</body>
</html>