<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * This is the Controller for International Section.
 *
 *
 * @category   Controller
 * @package    International
 * @subpackage
 * @copyright  Copyright (c) 2010 School of Business and Computer Science Limited (http://www.sbcs.edu.tt)
 * @license    TBD
 * @version    $Id:$
 * @link
 * @since      File available since Site Design 2.0
 */
class Controller_International extends Controller_Internal {

    function action_index() {
        $v = View::factory('pages/international');
        $v->staticpages = ORM::factory('staticpage')->with('spage')->where('menu', '=', 'International')->and_where('spage.status', '=', 'PUBLISHED')->order_by('id','desc')->find_all();
        $this->template->content->page_heading = '<h1 class="ui-state-default ui-corner-top teal">'.I18n::get('international.heading').'</h1>';
        $this->template->content->middle_content = $v;
        $this->template->content->left_menu = Request::factory('include/international_menu_left')->execute();
       /* $testimonial = Request::factory('include/testimonial')->execute();
        $this->template->default_right_menu = array_merge($this->template->default_right_menu, array($testimonial));
        */
        $this->template->title = I18n::get('international.heading');
        $events = Request::factory('events/internalevent')->execute();
        $this->template->content->right_content = $events;
        $this->template->right = array_merge($this->template->right, array($events));
        $news = Request::factory('page/slimnews/3')->execute();
        $this->template->content->right_content = $news;
        $this->template->right = array_merge($this->template->right, array($news));
       
       
       
    }

    function action_page($id) {
        $v = View::factory('pages/page');
        $v->staticpage = ORM::factory('staticpage')->with('spage')->where('menu', '=', 'International')->and_where('spage.status', '=', 'PUBLISHED')->find($id);
        $this->template->content->page_heading = '<h1 class="ui-state-default ui-corner-top teal">'.$v->staticpage->spage->title.'</h1>';
        $this->template->content->middle_content = $v;
        $this->template->content->left_menu = Request::factory('include/international_menu_left')->execute();
        $testimonial = Request::factory('include/testimonial')->execute();
        $this->template->default_right_menu = array_merge($this->template->default_right_menu, array($testimonial));
        $this->template->title = $v->staticpage->spage->title;

        $events = Request::factory('events/internalevent')->execute();
        $this->template->content->right_content = $events;
        $this->template->right = array_merge($this->template->right, array($events));
        $news = Request::factory('page/slimnews/3')->execute();
        $this->template->content->right_content = $news;
        $this->template->right = array_merge($this->template->right, array($news));
    }

    
}