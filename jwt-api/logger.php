<?php 
	class Logger
	{
		protected static $dateFormat = 'Y-m-d H:i:s';
		protected static $file = 'C:\wamp64\logs\php_error.log'; 
		/*
			doit être "php://stderr" mais sur le wampserver que j'utilise le chemin n'est pas présent
		*/

		public static function writeLog($message, $level = 'info')
		{
			$level = strtoupper($level);
			$messageAddWithoutError = file_put_contents(self::$file, '['.date(self::$dateFormat).'] '.$level.' '.(($level == 'INFO') ? ' ' : '').'--> '.$message."\n", FILE_APPEND);
			$messageAdd = TRUE;
			if ($messageAddWithoutError === FALSE) {
				$messageAdd = FALSE;
			}
			return $messageAdd;
		}
		
		public static function writeLogInfo($message)
		{
			return self::writeLog($message, 'info');
		}
		
		public static function writeLogError($message)
		{
			return self::writeLog($message);
		}
		
		public static function writeLogDebug($message)
		{
			return self::writeLog($message, 'debug');
		}
		
		public static function generateCallTrace($level = 'info', $giveAllHistory = true)
		{
			$e = new Exception();
			$trace = explode("\n", $e->getTraceAsString());
			// reverse array to make steps line up chronologically
			$trace = array_reverse($trace);
			array_shift($trace); // remove {main}
			array_pop($trace); // remove call to this method
			$length = count($trace);
			$result = array();
			$messageAdd = TRUE;
			if ($giveAllHistory == true && $length > 1) {
				for ($i = 0; $i < $length; $i++)
				{
					$messageAddWithoutError = self::writeLog(($i + 1)  . ')' . substr($trace[$i], strpos($trace[$i], ' ')), $level);
					if ($messageAddWithoutError === FALSE) {
						$messageAdd = FALSE;
					}
				}
			} else {
				$trace = array_reverse($trace);
				$messageAddWithoutError = self::writeLog(substr($trace[0], strpos($trace[0], ' ') + 1), $level);
				if ($messageAddWithoutError === FALSE) {
					$messageAdd = FALSE;
				}
			}
			return $messageAdd;
		}
	}
 ?>