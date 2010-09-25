<?php
// Don't *ever* use GET to logout....just doing this for proof of concept
require_once 'check_and_start_session.php';
if (session_destroy())
{
		setcookie('SlouchIn',null, mktime() - 3600, '/');
		echo 'bye! <a href="index.html">Login again?</a>';
}