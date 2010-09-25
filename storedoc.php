<?php
header('Content-Type:text/plain');
require_once 'check_and_start_session.php';
require_once '../../apps/sag/src/Sag.php';

$s = new Sag();
$s->setDatabase('slouchin_test');
// requires login, but we've got a cookie!
$s->setAuthSession(session_id());
$doc = new stdClass();
$doc->test = 'doc';
$doc->used_session_id = $s->authSession;
try
{
		$res = $s->put(uniqid(), $doc);
		print_r($res);
}
catch (SagCouchException $e)
{
		print_r($e->getCode());
		print_r($e->getMessage());
}