<?php 
try 
{ 
    $db = new PDO('mysql:host=localhost;dbname=p04-basis', 'root' ,'root'); 
} 
catch(PDOException $e) 
{ 
    $sMsg = '<p> 
            Regelnummer: '.$e->getLine().'<br /> 
            Bestand: '.$e->getFile().'<br /> 
            Foutmelding: '.$e->getMessage().' 
        </p>'; 
     
    trigger_error($sMsg); 
} 

$db->exec("CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    usertype VARCHAR(255) NOT NULL,
    herhalPassword VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
)");

$db->exec("CREATE TABLE IF NOT EXISTS supervisor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    usertype VARCHAR(255) NOT NULL,
    herhalPassword VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
)");


 //$db->exec("INSERT INTO admins (username, pass, usertype, herhalPassword, email) 
      //      VALUES ('admin', '0000', 'admin', '0000', 'admin@gmail.com')");
 //$db->exec("INSERT INTO admins (username, pass, usertype, herhalPassword, email) 
 //           VALUES ('admin2', 'admin2pass', 'admin', 'admin2pass', 'admin2@example.com')");
 
// $db->exec("INSERT INTO admins (username, pass, usertype, herhalPassword, email) 
   //         VALUES ('admin3', 'admin3pass', 'admin', 'admin3pass', 'admin3@example.com')");
 //
 //$db->exec("INSERT INTO admins (username, pass, usertype, herhalPassword, email) 
    //        VALUES ('admin4', 'admin4pass', 'admin', 'admin4pass', 'admin4@example.com')");
 


/// $db->exec("INSERT INTO supervisor (username, pass, usertype, herhalPassword, email) 
          //  VALUES ('supervisor', '0000', 'supervisor', '0000', 'supervisor@gmail.com')");


?> 