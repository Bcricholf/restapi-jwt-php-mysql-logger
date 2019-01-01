<?php 
	require_once('logger.php');

	echo 'main page';

	Logger::writeLog("test log");
	Logger::writeLogError("this is a test!");
	if (Logger::writeLog("test log from error", "error") === FALSE) {
		echo 'error';
	}

	function testOther($param)
	{
		Logger::generateCallTrace("error");
		$a = 1;
		$b = 2;
		$c = $a + $b;
		Logger::writeLog("résult = ".$c);
	}

	function testOther2($param)
	{
		Logger::generateCallTrace("info", false);
		testOther($param);
	}

	$param = 10;
	testOther2($param);
 ?>