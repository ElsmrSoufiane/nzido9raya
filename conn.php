
<?php 
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>";
try{                                              
    $db=new PDO("mysql:host=sql202.infinityfree.com;dbname=p3","if0_38354511","Gwks2JMbHEYIjS2");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "<div class='alert-primary'>".$e->getMessage()."</div>";
}                                             