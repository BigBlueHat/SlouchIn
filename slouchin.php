<?php
if (count($_POST) == 0) {
	if (is_array($_SESSION['slouchin'])) {
		header('Location: private.php');
		exit;
	}
	header('Location: index.html');
	exit;
}

require_once 'Sag/Sag.php';

/*$username="admin"; // Mysql username
$password="password"; // Mysql password
print_r($_POST);*/
// Define $myusername and $mypassword
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

$s = new Sag();
/* cookie auth */
try {
	$res = $s->login($myusername, $mypassword, Sag::$AUTH_COOKIE);
	//$me = $s->get('org.couchdb.user:'.$_POST['username'])->body;
	if ($res->body->ok) {
		session_name('SlouchIn');
		session_id($res->cookies->AuthSession);
		session_start();
		$_SESSION['slouchin'] = array('name'=>$myusername);
		header("Location: private.php");
		exit;
	}
} catch (SagCouchException $e) {
	echo 'Wrong Username or Password. <a href="index.html">Try Again?</a>';
}

/* HTTP Basic Auth code
  Don't use this unless you can *safely* store the user's username and password
  somewhere safe safely without risk in a safe place. Got it! :)

$s->login($_POST['username'], $_POST['password']);
try {
	$s->setDatabase('_users');
	$me = $s->get('org.couchdb.user:'.$_POST['username'])->body;
	if ($me->_id) {
		$_SESSION['slouchin'] = array('username'=>$myusername);
		header("Location: private.php");
		exit;
	}
} catch (SagCouchException $e) {
	echo "Wrong Username or Password";
}*/