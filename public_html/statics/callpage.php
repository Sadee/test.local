<?php
echo 'page call<br/>';
include_once('class.statics.php');

$oP = new parentclass();
$oCF = new firstchild();
for($i=1;$i<1001;$i++){
	$oCF->changevalue('first');
sleep(rand(1,3));
	$oP->displayval($i);
	
}
