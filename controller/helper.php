<?php
    
function opencon(){
    $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
    $dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
    return dbh;
}
    
    
function register($dbh, $fname, $lsname, $em, $pass){
    //if it exists (write code)
   $dbh = opencon();
   $add = $dbh->prepare('INSERT INTO userid ( FNAME, LNAME, EMAIL,           PASSHASH)]  
                VALUES (:fname, :lname, :em, :pass;)
                ');
    $add->bindValue(':fname', $fname);
    $add->bindValue(':lname', $lname);
    $add->bindValue(':em', $em);
    $add->bindValue(':pass', $pass);
    $add->execute();
    // pass to login with parameters
}
    function show_profile($dbh, $email){
        $search=$dbh->prepare('SELECT * FROM userid WHERE EMAIL = ?');
        $search->execute(array($email));
        
    
}


    function search($dbh, $email, $psw){
         $search=$dbh->prepare('SELECT * FROM userid WHERE EMAIL = ? AND PASSHASH = ?');
         $search->execute(array($email, $psw));
        
        
    }
?>