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
define('DB_USER', 'root');
define('DB_PASSWORD', 'FSLHGGI14!');
define('DB_DATABASE', 'cs75finance');

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
            print_r($row);
			$userid = $row[0];
            $_SESSION['fname']=$row[2];
            $_SESSION['lname']=$row[3];
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
 * @param int $userid
 
function get_user_shares($userid)
{
	// connect to database with PDO
	$dbh =  opencon()
	
	// get user's portfolio
	$stmt = $dbh->prepare("SELECT symbol, shares FROM portfolios WHERE userid=:userid");
	$stmt->bindValue(':userid', $userid, PDO::PARAM_STR);
	if ($stmt->execute())
	{
	    $result = array();
	    while ($row = $stmt->fetch()) {
			array_push($result, $row);
	    }
		$dbh = null;
		return $result;
	}
	
	// close database and return null 
	$dbh = null;
	return null;
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
    //if it exists (write code)
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
    return result;
    
}


function get_user_balance($userid) { }

function buy_shares($userid, $symbol, $pp, $qty, &$error) {
    if($_SESSION['wallet']<($pp*$qty)){
        $error="Balance is less than what is being bought";
        return false;
    }
    require('opencon.php');
    $buy = $dbh->prepare("INSERT INTO Stock ( SYMBOL , PP ,  QTY , USERID ) VALUES (:symbol,:pp,:qty,userid)");
    
    $buy->bindParam(':symbol', $symbol );
    $buy->bindParam(':pp', $pp);
    $buy->bindParam(':qty', $qty);
    $buy->bindParam(':userid', $userid);
    
    $result=$add->execute();
    return result;
    
}

function sell_shares($userid, $symbol, &$error) { }
