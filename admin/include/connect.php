<?php try{
    $db = new PDO("mysql:host=localhost;dbname=bd;charset=utf8","root","root");
    }
    catch(PDOException $e){
        die($e->getMessage());
}
?>