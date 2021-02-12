<?php
class FileHelper
{
	private string $pwd;
	
	public function __construct()
	{
		$this->pwd = getcwd();
	}

	public function loadFile(string $filename)
	{
		if(!file_exists("$this->pwd/$filename"))
			return '';
			
		return file_get_contents("$this->pwd/$filename");
	}
}
