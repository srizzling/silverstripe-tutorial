<?php
class StaffPage extends Page{
	private static $db = array ();

	private static $has_one = array (
		'Photo' => 'Image'
	);


	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Images", new UploadField('Photo'));
		return $fields;
	}
}

class StaffPage_Controller extends Page_Controller{
}

