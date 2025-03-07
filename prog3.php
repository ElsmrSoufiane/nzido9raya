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
        header{display: flex;
            align-items: center;
            color: white;
            background-color: #387F39;
            font-family: sans-serif;
            
            position: fixed;
            width: 100%;
            animation-name: tr;
            animation-duration: 1s;
            animation-fill-mode: forwards;
            z-index: 1000;
        }
        @keyframes tr{
            from{
                translate: -100% 0;
            }to{
                translate: 0 0;
            }
        }
        @keyframes logo{
            from{
                opacity: 0;
            }to{
                opacity: 1;
            }
        }
#choix{
   width: 40px;
}

         </style>
    <header> <a style="margin-left: 5%;" href="#" ><svg onclick="show()" style="width: 30px;fill:white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg></a>
        <h1 style="margin-left: 2%;animation: logo 2s  1.5s  forwards;opacity: 0;">Nzido<font style="color: #BEDC74;">sa3a</font></h1>
    <div style="display: flex;align-items: stretch;border-radius: 20px;margin-left: 25%;">
        <script>
            
        </script>
        <input class="form-control" type="text" id="search" style="height: 30px;width: 200px;border-radius: 10px 0 0 10px;" onchange="cherch(this.value)">
    <font style="padding-left: 10px ;padding-right: 10px;background-color: silver;display: flex;align-items: center;"  >
    <script>
        function cherch(element,choix){
            
            document.getElementById("etudiant").parentElement.style.display="none";
            document.getElementById("professeur").parentElement.style.display="none";
            document.getElementById("group").parentElement.style.display="none";
            choix=document.getElementById("choix").value;
            document.getElementById(choix).parentElement.style.display="block";
            children=document.getElementById(choix).children;
            for(x of children ){
                
                if(x.id.includes(element)){
                    
                    x.style.display="block"
                }else{
                    
                    x.style.display="none"
                }
            }

        }
    </script>
        <svg style="width: 15px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 .1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
    </font>
</div>
    <select class="form-control" style="margin-left: 10%;width: fit-content;" id="choix" >
        <option>etudiant</option>
        <option>professeur</option>
        <option>group</option>
    </select>
    </header>
    <style>

    #side{
        
        width: 40%;
        position: sticky;
        background-color:  #387F39;
        backdrop-filter: blur(10px);
        top:60px ;
        z-index: 999;
       transform: translateX(-100%);
      
        
    } 
    #side h2{
        text-align: center;color: #F6E96B;
        transition-duration: 0.3s;
        
    }
    .s{
        opacity: 0;
        transition-duration: 0.2s;
    }
    #side h2:hover{
        font-size: 40px;
    }
    #side a{
        text-decoration: none;
    }
    #side h2:hover .s{
        opacity: 1;
    }
    .ap{
        translate: 100% 0;
        transition-duration: 0.4s;
        
             
             
        }
        .rotate{
            transition-duration: 0.8s;
            transform: rotate(720deg);
        } </style>
    <div id="side" class="" ><font></font>
        <font style="color: red;float: right;font-weight: bolder;font-family: sans-serif;font-size: 25px;margin-right: 10px;cursor: pointer;" id="x" onclick="hide()">X</font>
        <br>
        <h1 style="font-family: sans-serif;color: #BEDC74;padding-left: 10px;">Les niveaux:</h1>
       <center> <a href="ajouterniveau.php" class="btn btn-warning" >+</a></center>
        <br>
        <?php
        require "conn.php";
        $r=$db->prepare("select * from niveau");
        $r->execute();
        $l=$r->fetchAll();
        foreach($l as $x){
            echo " <a href='niveau.php?n=".$x["niveau"]."'><h2 >".$x["niveau"]."<font class='s'>-></font></h2></a>";
        }
        ?>
      

    </div>
    
    <script>

        function show(){
            document.getElementById("side").classList.toggle("ap");
            document.getElementById("x").classList.toggle("rotate");
          
        }
        function hide(){
            document.getElementById("side").classList.remove("ap");
            document.getElementById("x").classList.remove("rotate");
        }
        
    </script>
    <style>
          .opac1{
           
            opacity: 0;
        }
        .opac{
            transition-duration: 0.4s;
            opacity: 1;
        }
    </style>
    
   
    <style>
        .fade{
            animation-name: fade;
            animation-duration: 1.5s;
            animation-fill-mode: forwards;
        }
        @keyframes fade{
              from{opacity: .5;}
              to{opacity: 1;}
        }
        .circle{
            width: 10px;
            height: 10px;
            background-color: white;
            margin-left: 5px;
            border-radius: 50%;
        }
      
        
    
 
    </style>
    <div id="silder" style="width: 80%;margin: 40px auto;border-radius: 20px;height:600px;position: relative;overflow: hidden;top: 0px;" >
        <div class="fade"  style="background-position: fixed;background-image:url('wallpaperflare.com_wallpaper (1).jpg');background-size: cover;width:100%;height:100%;display: none;"></div>
        <div class="fade"  style="background-position: fixed;background-image:url('wallpaperflare.com_wallpaper (3).jpg');background-size: cover;width:100%;height:100%;display: block;"></div>
        <div class="fade"  style="background-position: fixed;background-image:url('wallpaperflare.com_wallpaper (4).jpg');background-size: cover;width:100%;height:100%;display: none;"></div>
      <div style="position: absolute;bottom: 15px;z-index: 10;display: flex;justify-content: center;width: 100%;">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>

      </div>
    </div>
    <script>
        ct=0;
        slider=document.getElementsByClassName("fade");
          circle=document.getElementsByClassName("circle"); 
            setInterval(() => {
                for(x of slider){
                x.style.display="none";
               }
               for(x of circle){
                x.style.background="white"
               }
               slider[ct].style.display="block"
               circle[ct].style.background="#F6E96B"
           if(ct!=2){
            ct+=1
           }else{
            ct=0
           }
        }, 3000);
        
      
        
    </script>
    <style>
        #h1e::before,#h1g::before,#h1p::before{
        filter: blur(1rem);
        opacity: 0.8;
    }
        
    #h1e::after,#h1e::before,#h1g::after,#h1g::before,#h1p::after,#h1p::before{content: "";
    
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
       #h1e,#h1g,#h1p{
        width: fit-content;padding: 10px;border-radius: 20px;margin: 20px;position: relative;overflow: visible;background-color: white
       }
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
    <div >
        <h1 id="h1e" >
            etudiants
        </h1>

        <div class="row" id="etudiant">
 <?php
    echo "<center><a href='ajoutereleve.php' class='btn btn-warning'>+</a></center>";
    ?>
        <?php
        $r=$db->prepare("select * from eleve;");
        $r->execute();
        $l=$r->fetchAll();
        foreach($l as $x){
            $r=$db->prepare("select * from eleve_group where  nom='".$x["nom"]."';");
        $r->execute();
        $l2=$r->fetchAll();
        $groups="";
        foreach($l2 as $y){
            $groups=$groups.$y["grop"]."/";
        }
            echo " <div class='col-md-4 mb-3 item' id='".$x["nom"]."'>
                <h2 class='text-center' style='color: darkgreen'>".$x["nom"]."</h2>
                <p class='text-center'>groups:$groups</p>
                <center><a href='etudiant.php?nom=".$x["nom"]."' class='voire'>voire</a></center>
            </div>";
        }
        ?>
           
            </div>
            <style>
                #tout{float: right;}
                #cacher{float: right;display: none;} </style>
            <button class="voire"  onclick="affichE()" id="tout" >voire tout</button>
            <button class="voire"  onclick="cachE()" id="cacher" >cacher</button>
    </div>
    <div >
        <h1 id="h1g" >
            groups
        </h1>
        <div class="row" id="group">
        <?php
         $r=$db->prepare("select * from grop;");
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
         } ?>
           
           
         
           
          
      
          
            </div>
            <style>
                #toutg{float: right;}
                #cacherg{float: right;display: none;} </style>
            <button class="voire"  onclick="affichg()" id="toutg" >voire tout</button>
            <button class="voire"  onclick="cachg()" id="cacherg" >cacher</button>
    </div>
    <div >
        <h1 id="h1e" >
            professeurs
        </h1>
        <div class="row" id="professeur">
        <center><a href='ajouterprof.php' class='btn btn-warning'>+</a></center>
        <?php
         $r=$db->prepare("select * from prof;");
         $r->execute();
         $l=$r->fetchAll();
         foreach($l as $x){
            $r=$db->prepare("select * from grop where nomp='".$x["nomp"]."';");
         $r->execute();
         $l2=$r->fetchAll();
         $groups="";
         foreach($l2 as $y){
            $groups=$groups.$y["grop"]."/";
         }
            echo "<div class='col-md-4 mb-3 item' id='".$x["nomp"]."'>
                <h2 class='text-center' style='color: darkgreen'>".$x["nomp"]."</h2>
                <p class='text-center'>groups:$groups</p>
            </div>";
         }
            ?>
           
            </div>
            <style>
                #toutp{float: right;}
                #cacherp{float: right;display: none;} </style>
            <button class="voire"  onclick="affichp()" id="toutp" >voire tout</button>
            <button class="voire"  onclick="cachp()" id="cacherp" >cacher</button>
    </div>

<script>
    etudiant=document.getElementById("etudiant");
    enfants=etudiant.children;
    group=document.getElementById("group");
    gs=group.children;
    professeur=document.getElementById("professeur");
    ps=professeur.children;
    for(k=3;k<ps.length;k++){
       
        ps[k].style.display="none";
    }
    for(j=3;j<gs.length;j++){
        
        gs[j].style.display="none";
    }
    for(i=3;i<enfants.length;i++){
        enfants[i].style.display="none";
    }
    
    
    
    function affichE(){
        for(i=0;i<=enfants.length;i++){
        enfants[i].style.display="block";
        document.getElementById("tout").style.display="none";
    document.getElementById("cacher").style.display="block";
    }
   
    }
    function cachE(){
        for(i=3;i<=enfants.length;i++){
        enfants[i].style.display="none";
        document.getElementById("tout").style.display="block";
        document.getElementById("cacher").style.display="none";
    } }

    function affichg(){
        for(i=0;i<=gs.length;i++){
        gs[i].style.display="block";
        document.getElementById("toutg").style.display="none";
    document.getElementById("cacherg").style.display="block";
    }
   
    }
    function cachg(){
        for(i=3;i<=gs.length;i++){
        gs[i].style.display="none";
        document.getElementById("toutg").style.display="block";
        document.getElementById("cacherg").style.display="none";
    }
  
    }
    
    function affichp(){
        for(i=0;i<=ps.length;i++){
        ps[i].style.display="block";
        document.getElementById("toutp").style.display="none";
    document.getElementById("cacherp").style.display="block";
    }
   
    }
    function cachp(){
        for(i=3;i<=ps.length;i++){
        ps[i].style.display="none";
        document.getElementById("toutp").style.display="block";
        document.getElementById("cacherp").style.display="none";
    }
  
    }
    
    </script>
</body>