<?php
class LetterSlide
{
	public string $description;
	public string $nextSlideName;
	public string $phoneticDescription;
	
	public function __construct(
		string $description, 
		$phoneticDescription, 
		string $nextSlideName
	)
	{
		$this->description = $description;
		$this->phoneticDescription = is_null($phoneticDescription) ? $description : $phoneticDescription;
		$this->nextSlideName = $nextSlideName;
	}
}
