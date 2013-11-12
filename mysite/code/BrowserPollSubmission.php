<?php
class BrowserPollSubmission extends DataObject{
	private static $db = array(
		'Name' => 'Text',
		'Browser' => 'Text'
	);
}