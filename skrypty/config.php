	<?php

class Config implements JsonSerializable
{
	public $filesBackupLogFilePath = "path";
	public $databaseBackupLogFilePath = "path";
	public $virtualBackupLogFilePath = "path";
	public $networkAdress = "192.168.1.0";
	public $dbLogin = "UnicornBackup";
	public $dbPassword = "UnicornBackup!123";
	public $dbName = "Backup_hashcode";
	public $localUsername = "UnicornBackup";
	public $localPassword = "UnicornBackup!123";
	public $scriptDir = "/home/UnicornBackup/skrypty";
	public $defaultDir = "/home/UnicornBackup";
		
	public function jsonSerialize()
    {
        return [
            'filesBackupLogFilePath' => $this->filesBackupLogFilePath,
            'databaseBackupLogFilePath' => $this->databaseBackupLogFilePath
            'virtualBackupLogFilePath' => $this->virtualBackupLogFilePath
            'networkAdress' => $this->networkAdress
            'dbLogin' => $this->dbLogin
            'dbPassword' => $this->dbPassword
            'dbName' => $this->dbName
            'localUsername' => $this->localUsername
            'localPassword' => $this->localPassword
	    'scriptDir' => $this->scriptDir
	    'defaultDir' => $this->defaultDir
        ];
    }
	
	public static function fromJson($json)
    {
        $arr = json_decode($json, true);

        $object = new Config();
		
		$object->filesBackupLogFilePath = $arr['filesBackupLogFilePath'];
		$object->databaseBackupLogFilePath = $arr['databaseBackupLogFilePath'];
		$object->virtualBackupLogFilePath = $arr['virtualBackupLogFilePath'];
		$object->networkAdress = $arr['networkAdress'];
		$object->dbLogin = $arr['dbLogin'];
		$object->dbPassword = $arr['dbPassword'];
		$object->dbName = $arr['dbName'];
		$object->localUsername = $arr['localUsername'];
		$object->localPassword = $arr['localPassword'];
		$object->scriptDir = $arr['scriptDir'];
		$object->defaultDir = $arr['defaultDir'];
		
		return $object;
    }
}

?>