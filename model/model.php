<?php
/*********************************
 * model.php
 *
 * CSCI S-75
 * Project 1
 * Beshari Jamal
 *
 * Model for users and portfolios
 *********************************/

// database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'beshari_jamal');
define('DB_PASSWORD', 'FSLHGGI14!');
define('DB_DATABASE', 'beshari_cs75finance');

/*
 * login_user() - Verify account credentials and create session
 *
 * @param string $email
 * @param string $password
 */

function opencon(){
    $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE;
    $dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
    var_dump($dbh);
    return dbh;
}

function login_user($email, $password)
{
	// prepare email address and password hash for safe query
	$email = mysql_escape_string($email);
	$pwdhash = $password;
	
	// connect to database with mysql_
	$connection = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	mysql_select_db(DB_DATABASE);
	
	// verify email and password pair
	$userid = 0;
	$query = sprintf("SELECT * FROM userid WHERE LOWER(EMAIL)='%s' AND PASSHASH='%s'",strtolower($email),$pwdhash);
	$resource = mysql_query($query);
	if ($resource)
	{
		$row = mysql_fetch_row($resource);
		if (isset($row[0]))
        {
            //print_r($row);
			$userid = $row[0];
            $_SESSION['fname']=$row[1];
            $_SESSION['lname']=$row[2];
            $_SESSION['wallet']=$row[4];
            
        }
	}
	

	// close database and return 
	mysql_close($connection);
	return $userid;
}

/*
 * get_user_shares() - Get portfolio for specified userid
 *
 * @param int $userid*/
 
function get_user_shares($userid)
{
    try {   //if it exists (write code)
    require('opencon.php');
    $stmt = $dbh->prepare("SELECT ID, SYMBOL, QTY, PP FROM Stock WHERE USER_ID=:userid");
	$stmt->bindValue(':userid', $userid, PDO::PARAM_STR);
    $pass=$stmt->execute();
    //echo $pass.'<br>';
	if ($pass)
	{
	    $result = array();
	    while ($row = $stmt->fetch()) {
			array_push($result, $row);
	    }
		$dbh = null;
        //print_r($result);
		return $result;
	}
    }
    catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
    }
}
    


/*
 * get_quote_data() - Get Yahoo quote data for a symbol
 *
 * @param string $symbol
 */
function get_quote_data($symbol)
{
	$result = array();
	$url = "http://download.finance.yahoo.com/d/quotes.csv?s={$symbol}&f=sl1n&e=.csv";
	$handle = fopen($url, "r");
	if ($row = fgetcsv($handle))
		if (isset($row[1]))
			$result = array("symbol" => $row[0],
							"last_trade" => $row[1],
							"name" => $row[2]);
	fclose($handle);
	return $result;
}

/*
 * register_user() - Create a new user account
 *
 * @param string $email
 * @param string $password
 * 
 * @return string $error
 */
function register_user($fname, $lname, $email, $pwdhash)
{
   try {   //if it exists (write code)
   require('opencon.php');
   //echo "<br> checking for connection: "; var_dump($dbh);
   $add = $dbh->prepare("INSERT INTO userid (FNAME , LNAME , EMAIL ,  QUANTITY , PASSHASH ) VALUES (:fname,:lname,:em,'10000',:pass)");
    $add->bindParam(':fname', $fname);
    $add->bindParam(':lname', $lname);
    $add->bindParam(':em', $email);
    $add->bindParam(':pass', $pwdhash);
    //echo "<br>   name: "; var_dump($dbh);
    $result=$add->execute();
    //echo "<br> in register function: "; var_dump($result);

    $dbh=null;
    return $result;
    $dbh = null;    
    }

 catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
    }
    
}


function get_user_balance($userid) { 
 require('opencon.php');
    $get = $dbh->prepare("SELECT QUANTITY FROM userid WHERE userid.ID = :id_of_user");
    $get->bindparam(':id_of_user', $userid);
    $pass=$get->execute();
    $balance = $get->fetch();
    //var_dump($balance);
    $dbh=null;
    return $balance[QUANTITY];
}

function buy_shares($userid, $symbol, $pp, $qty) {
    $price=$pp*$qty; //in cents
    if(($_SESSION['wallet'])<($price)){
        //echo "Balance is less than what is being bought";
        return false;
    }
    //echo " in the buy share function $userid $symbol $pp $qty <br>";
    require('opencon.php');
    $dbh->beginTransaction();
    $buy = $dbh->prepare("INSERT INTO Stock ( SYMBOL , PP ,  QTY , USER_ID ) VALUES (:symbol,:pp,:qty, :userid)");
    $buy->bindParam(':symbol', $symbol );
    $buy->bindParam(':pp', $pp);
    $buy->bindParam(':qty', $qty);
    $buy->bindParam(':userid', $userid);
    $result=$buy->execute();
    //echo $result.'<br>boutght <br>';
    if($result){
        $update=$dbh->prepare("UPDATE userid 
        SET QUANTITY=QUANTITY-:cost WHERE ID = :userid");
        $update->bindParam(':cost', $price);
        $update->bindParam(':userid', $userid);
        //echo $upresult.'<br>balance updated<br>';
        $upresult=$update->execute();
            if($upresult)
                $dbh->commit();
            else
                $dbh->rollback;
    }
    else
        $dbh->rollback;
    
    $dbh=null;
    return $result;
    
}

function sell_shares($userid, $id) { 
    require('opencon.php');
    $get_stk=$dbh->prepare("SELECT QTY, SYMBOL FROM Stock WHERE ID=:id and USER_ID=:userid");
    $get_stk->bindParam(':id', $id);
    $get_stk->bindParam(':userid', $userid);
    $pass=$get_stk->execute();
    
    //var_dump($pass);
    if($pass){
        $stock=$get_stk->fetch();        
        $share=get_quote_data($stock["SYMBOL"]);  
        $price=(int)($stock['QTY'])*(int)($share['last_trade']);
        
        var_dump($price);
        $dbh->beginTransaction();
        $sell = $dbh->prepare("DELETE FROM Stock WHERE ID = :id AND USER_ID = :userid");
        $sell->bindParam(':id', $id);
        $sell->bindParam(':userid', $userid);
        $result=$sell->execute();
        if($result){
            $update=$dbh->prepare("UPDATE userid 
            SET QUANTITY=QUANTITY+:price WHERE ID = :userid");
            $update->bindParam(':price', $price);
            $update->bindParam(':userid', $userid);
            $upresult=$update->execute();
            if($upresult){
                $dbh->commit();
                //echo "share SOLD";
                $dbh=null;
                //var_dump($upresult);
                return $upresult;
            }
            else {
                $dbh->rollback;
                $dbh=null;
                return $upresult;
            } 
        }
        else {
            $dbh->rollback;
            $dbh=null;
            return $result;
        }
        
        
    }
    else{
        $dbh->rollback;
        $dbh=null;
        return $pass;
    }
}
