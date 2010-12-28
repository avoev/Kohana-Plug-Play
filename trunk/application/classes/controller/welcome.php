<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Maintemplate {

    public function action_index()
    {
            $this->template->subtitle              = __('Welcome to Kohana Plug&Play');
            $this->template->content               = View::factory('content/articles');

            $count = ORM::factory('article')->count_all();

            // Create an instance of Pagination class and set values
            $pagination = Pagination::factory(array('total_items' => $count,'items_per_page' => 5));

            $articles = ORM::factory('article')->order_by('id','ASC')->limit($pagination->items_per_page)->offset($pagination->offset)->find_all();

            $page_links = $pagination->render('pagination/modern');

            $this->template->content = View::factory('content/articles')
                                              ->bind('page_links', $page_links)
                                              ->bind('articles', $articles);
       }

    public function action_article($id = 1)
    {
            $this->template->subtitle              = __('Article');
            $this->template->content               = View::factory('content/articles');

            $article = ORM::factory('article')
                            ->where('id', '=', $id)
                            ->find();

            $this->template->content = View::factory('content/article')
                                              ->bind('article', $article);
       }

} // End Welcome
