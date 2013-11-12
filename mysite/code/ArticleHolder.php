<?php
class ArticleHolder extends Page{
	private static $allowed_children = array('ArticlePage');	
}

class ArticleHolder_Controller extends Page_Controller {

	private static $allowed_actions = array('test');

	public function test() {
    $rss = new RSSFeed($this->Children(), $this->Link(), "The coolest news around");
    return $rss->outputToBrowser();
}
}
