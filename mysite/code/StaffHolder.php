<?php

class StaffHolder extends Page{
	private static $db = array();
	private static $has_one = array();
	private static $allowed_childfren = array('StaffPage');
}

class StaffHolder_Controller extends Page_Controller{
	
}