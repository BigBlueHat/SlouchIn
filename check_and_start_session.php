<?php
session_name('SlouchIn');
session_start();
if (!is_array($_SESSION['slouchin'])) {
		header('Location: index.html');
		exit;
}