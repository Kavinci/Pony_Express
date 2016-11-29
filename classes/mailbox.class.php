<?php
/*
    This class handles the messaging process much like a real post office
*/
class postOfficeClass
{
	private $dirPath;
	//This will be removed. These functions will be called by other classes for functionality
	public function __construct($path)
	{
		$this->dirPath = $path;
		echo "Hello World from the Post Office";
	}

	//Public function for receiving data and calling private functions that coordinate DB writing
	public function inProcessor($sender, $recipient, $header, $content, $senderStatus, $recipientStatus, $globalStatus)
	{
		$ID = masterInbox($sender, $recipient, $header, $content, $senderStatus, $recipientStatus, $globalStatus);
		senderInbox($ID, $sender, $recipient, $header, $content, $senderStatus, $recipientStatus, $globalStatus);
		recipientInbox($ID, $sender, $recipient, $header, $content, $senderStatus, $recipientStatus, $globalStatus);
	}

	//Public function for sending data internally to other classes for display
	public function outProcessor($metadata)
	{
		if($metadata == this.sender)
        }

	//Private functions that write to the database to be called by the inprocessesor
	private function masterInbox()
	{

		//return global Message ID for inboxes
	}

	//Private functions that write to each inbox
	private function senderInbox()
	{

	}

	private function recipientInbox()
	{

	}

	//Private functions for outProcessor to call and read from the DB
	private function readDB()
	{

	}
}

