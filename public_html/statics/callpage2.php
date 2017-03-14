<?php
echo 'page2 call<br/>';
include_once('class.statics.php');

$oP = new parentclass();
$oCF = new firstchild();
for($i=1001;$i<2001;$i++){
	$oCF->changevalue('second');
sleep(rand(1,3));
	$oP->displayval($i);
		
}

