<?php
require_once 'check_and_start_session.php';
?>
<p>This, sir, is a private page. You must be special, <?php echo $_SESSION['slouchin']['name']; ?>!</p>
<p><a href="storedoc.php">Store a doc?</a></p>