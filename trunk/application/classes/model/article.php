<?php

class Model_Article extends ORM {

	// Add new deal session
	function get_all_articles()
    {
        $articles = ORM::factory('article')->find_all;
        return $articles;
	}// End of function
} 
