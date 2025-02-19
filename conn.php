
<?php
try{                                              
    $db=new PDO("mysql:host=localhost;dbname=p3","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "<div class='alert-primary'>".$e->getMessage()."</div>";
}                                             