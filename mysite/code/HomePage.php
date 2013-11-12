<?php
class HomePage extends Page{
	
}

class HomePage_Controller extends Page_Controller{
	private static $allowed_actions = array('BrowserPollForm','LatestNews');
	 public function BrowserPollForm() {
        

	 	if(Session::get('BrowserPollVoted')) return false;

        // Create fields
        $fields = new FieldList(
            new TextField('Name'),
            new OptionsetField('Browser', 'Your Favourite Browser', array(
                'Firefox' => 'Firefox',
                'Chrome' => 'Chrome',
                'Internet Explorer' => 'Internet Explorer',
                'Safari' => 'Safari',
                'Opera' => 'Opera',
                'Lynx' => 'Lynx'
            ))
        );
         
        // Create actions
        $actions = new FieldList(
            new FormAction('doBrowserPoll', 'Submit')
        );
     
     return new Form($this, 'BrowserPollForm', $fields, $actions);
    }

    public function doBrowserPoll($data, $form){
    	$submission = new BrowserPollSubmission();
        $form->saveInto($submission);
        $submission->write();
        Session::set('BrowserPollVoted', true);
        return $this->redirectBack();
    }

    public function BroswerPollResults(){
    	$results = new GroupedList(BrowserPollSubmission::get());
    	$total = $results -> Count();



    	$list = new ArrayList();
    	foreach ($results-> groupBy('Browser') as $browserName => $browserSubmissions) {
    		$percentage = (int) ($browserSubmissions->Count() / $total * 100);
    		$list->push(new ArrayData(array(
           	'Browser' => $browserName,
            	'Percentage' => $percentage,
            	'Total' => $total
        	)));
    	}
    	return $list;
    }



	public function LatestNews($num=1){
		$holder = ArticleHolder::get()->First();
		return ($holder) ? ArticlePage::get() -> filter('ParentID', $holder->ID) -> sort('Date DESC')->limit($num) : false;
	}
}
