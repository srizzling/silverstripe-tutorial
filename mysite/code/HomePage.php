<?php
class HomePage extends Page{
	
}

class HomePage_Controller extends Page_Controller{
	public function LatestNews($num=1){
		$holder = ArticleHolder::get()->First();
		return ($holder) ? ArticlePage::get() -> filter('ParentID', $holder->ID) -> sort('Date DESC')->limit($num) : false;
	}
}
