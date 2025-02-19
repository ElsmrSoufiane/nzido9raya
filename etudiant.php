<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<a href='prog3.php' style='position:absolute;right:20px;top:10px' class='btn btn-primary' >retour</a>
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
    .item{
        transition-duration: 0.3s;
        padding: 15px;
       }
       .item:hover{
        box-shadow: 10px 10px 10px rgb(10, 10, 10,0.3) , 8px  8px 10px white;
       }
 </style>
    <h1 class="text-center text-success"><?php
    echo $_GET["nom"];
    ?></h1>
   <h2 class="alert-success" style="margin: 10px;padding: 15px;border-radius: 10px;width: fit-content;">groups:<?php
require "conn.php";
$r=$db->prepare("select grop  from eleve_group where nom='".$_GET["nom"]."';");
         $r->execute();
         $l=$r->fetchAll();
         foreach($l as $x){
            echo $x[0]."/";
         }
?></h2>
<h3 class="titre">absences</h3>
<?php
echo "<center><a href='ajouterab.php?nom=".$_GET["nom"]."' class='btn btn-warning'>+</a></center>";
?>

<div class="row">
<?php
$r=$db->prepare("select * from absence  where nom='".$_GET["nom"]."';");
$r->execute();
$l=$r->fetchAll();
foreach($l as $x){
    echo "
     <div class='col-md-4 item'><h1 class='text-center' style='color: #387F39;'>".$x["dt"]."</h1>
        <h3 class='text-center' style='color:#BEDC74 ;'>group:".$x["grop"]."</h3></div>
        
    ";
}
?>
   
                
                </div>
                <h3 class="titre">paiement</h3>
                <table class="table table-striped text-center">
                    <tr><th>group</th><th>moi</th><th>etat</th><th>action</th></tr>
                    <?php
                    $r=$db->prepare("select * from mois;");
                    $r->execute();
                    $l=$r->fetchAll();
                    foreach($l as $x){
                        $r=$db->prepare("select * from paiement where mois=".$x["mois"]." and nom='".$_GET["nom"]."';");
                        $r->execute();
                        $l2=$r->fetchAll();
                        foreach($l2 as $y){
                            if($y["etat"]=="non paié"){
                                echo "<tr><td>".$y["grop"]."</td><td>".$y["mois"]."</td><td>".$y["etat"]."</td><td><a href='paier.php?grop=".$y["grop"]."&mois=".$y["mois"]."&nom=".$y["nom"]."'class='btn btn-success'>payer</a></td></tr>";
                            }else{
                                echo "<tr><td>".$y["grop"]."</td><td>".$y["mois"]."</td><td>".$y["etat"]."</td><td><a herf='#'class='btn btn-warning'>deja paié</a></td></tr>";
                            }
                           
                        }
                        
                    }
                    ?>
                    </table>

</body>
</html>