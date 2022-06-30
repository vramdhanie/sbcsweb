<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * The Include Controller
 *
 * The Include controller is used to include content from multiple sources
 * on a view. This controller does not decorate its views.
 *
 * @category   View
 * @package    Includes
 * @subpackage
 * @copyright  Copyright (c) 2010 School of Business and Computer Science Limited (http://www.sbcs.edu.tt)
 * @license    TBD
 * @version    $Id:$
 * @link
 * @since      File available since Site Design 2.0
 */
class Controller_Include extends Controller_Ajax {

    function action_index() {
        $this->request->response = 'Somethings Missing';
    }

    function action_logout() {
        $v = View::factory('includes/logout');
        $this->request->response = $v->render();
    }

    function action_lefttop() {
        $v = View::factory('pages/lefttop');
        $this->request->response = $v->render();
    }

    function action_leftbottom() {
        $v = View::factory('pages/leftbottom');
        $this->request->response = $v->render();
    }

    function action_homeright() {
        $v = View::factory('pages/homeright');

        $this->request->response = $v->render();
    }

    function action_campus_menu() {
        $v = View::factory('includes/campus_menu');
        $v->campuses = ORM::factory('campus')->find_all();
        $this->request->response = $v->render();
    }

    function action_campus_menu_left() {
        $v = View::factory('includes/campus_menu_left');
        $v->campuses = ORM::factory('campus')->find_all();
        $this->request->response = $v->render();
    }

    function action_course_menu_right($id) {
        $v = View::factory('includes/course_menu_right');
        $v->course = ORM::factory('course')->find($id);
        $pid = $v->course->myacademiclevel->myprogramme->id;
        $v->programme = ORM::factory('academicprogramme')->find($pid);
        $v->levels = $v->programme->academiclevels->order_by('number', 'asc')->find_all();
        $this->request->response = $v->render();
    }

    function action_course_menu_left($id) {
        $v = View::factory('includes/course_menu_left');
        $v->course = ORM::factory('course')->find($id);
        $pid = $v->course->myacademiclevel->myprogramme->id;
        $v->programme = ORM::factory('academicprogramme')->find($pid);
        $did = $v->programme->mydepartment->id;
        $v->department = ORM::factory('academicdepartment')->find($did);
        $academicbodies = DB::select('academicbody.name', 'academicbody.id', 'academicbody.description', 'academicbody.icon_id')
                        ->from('academicprogramme')->join('academicbody')
                        ->on('academicbody', '=', 'academicbody.id')
                        ->where('status', '=', 'PUBLISHED')
                        ->where('academicprogramme.department', '=', $did)
                        ->order_by('academicbody.displayorder', 'asc')
                        ->distinct(TRUE)->execute();
        $v->academicbodies = $academicbodies;
        $this->request->response = $v->render();
    }

    function action_subject_menu() {
        $v = View::factory('includes/subject_menu');
        $v->subjects = ORM::factory('subject')->order_by('name', 'asc')->find_all();
        $this->request->response = $v->render();
    }

    function action_subject_menu_left() {
        $v = View::factory('includes/subject_menu_left');
        $v->subjects = ORM::factory('subject')->order_by('name', 'asc')->find_all();
        $this->request->response = $v->render();
    }

    function action_studentservice_menu() {
        $v = View::factory('includes/studentservice_menu');
        $v->staticpages = ORM::factory('staticpage')->with('spage')->where('menu', '=', 'Student Services')->and_where('spage.status', '=', 'PUBLISHED')->find_all();
        $this->request->response = $v->render();
    }

    function action_studentservice_menu_left() {
        $v = View::factory('includes/studentservice_menu_left');
        $v->staticpages = ORM::factory('staticpage')->with('spage')->where('menu', '=', 'Student Services')->and_where('spage.status', '=', 'PUBLISHED')->find_all();
        $this->request->response = $v->render();
    }

    /**
     * Gets the subject and passes it to the view
     * @param integer $id The ID of the subject
     */
    function action_programme_menu($id) {
        $v = View::factory('includes/programme_menu');
        $v->subject = ORM::factory('subject')->find($id);
        $this->request->response = $v->render();
    }

    function action_programme_menu_left($id) {
        $v = View::factory('includes/programme_menu_left');
        $v->programme = ORM::factory('academicprogramme')->find($id);
        $did = $v->programme->mydepartment->id;
        $v->department = ORM::factory('academicdepartment')->find($did);
        $this->request->response = $v->render();
    }

    function action_aboutus_menu() {
        $v = View::factory('includes/aboutus_menu');
        $v->pages = ORM::factory('staticpage')->with('spage')
                        ->where('menu', '=', 'About Us')
                        ->where('spage.status', '=', 'PUBLISHED')
                        ->find_all();
        $this->request->response = $v->render();
    }
    
    function action_international_menu() {
        $v = View::factory('includes/international_menu');
        $v->pages = ORM::factory('staticpage')->with('spage')
                        ->where('menu', '=', 'International')
                        ->where('spage.status', '=', 'PUBLISHED')
                        ->find_all();
        $this->request->response = $v->render();
    }
    
    function action_international_menu_left() {
        $v = View::factory('includes/international_menu_left');
        $v->pages = ORM::factory('staticpage')->with('spage')
                        ->where('menu', '=', 'International')
                        ->where('spage.status', '=', 'PUBLISHED')
                        ->find_all();
        $this->request->response = $v->render();
    }
    
     function action_alumni_menu() {
        $v = View::factory('includes/alumni_menu');
        $v->pages = ORM::factory('staticpage')->with('spage')
                        ->where('menu', '=', 'Alumni')
                        ->or_where('spage.id', '=', '481')
                        ->or_where('spage.id', '=', '498')
                        ->or_where('spage.id', '=', '650')
                        ->or_where('spage.id', '=', '651')
                        ->find_all();
        $this->request->response = $v->render();
    }

    function action_aboutus_menu_left() {
        $v = View::factory('includes/aboutus_menu_left');
        $v->pages = ORM::factory('staticpage')->with('spage')
                        ->where('menu', '=', 'About Us')
                        ->where('spage.status', '=', 'PUBLISHED')
                        ->find_all();
        $this->request->response = $v->render();
    }

    function action_department_menu() {
        $v = View::factory('includes/department_menu');
        $v->academicdepartments = ORM::factory('academicdepartment')->with('mydepartment')->find_all();
        $this->request->response = $v->render();
    }

    function action_department_menu_left() {
        $v = View::factory('includes/department_menu_left');
        $v->academicdepartments = ORM::factory('academicdepartment')->with('mydepartment')->find_all();
        $this->request->response = $v->render();
    }

    function action_vacancy_menu() {
        $v = View::factory('includes/vacancy_menu');
        $v->vacancies = ORM::factory('vacancy')
                        ->where('status', '=', 1)
                        ->where('deadline', '>', date('y-m-d'))
                        ->find_all();
        $this->request->response = $v->render();
    }

    function action_article_menu($amt) {
        $v = View::factory('includes/article_menu');
        $n = ORM::factory('article')->with('mypage')->where('mypage.status', '=', 'PUBLISHED')->order_by('articledate', 'desc')->find_all();
        $top = array();
        if (count($n) > $amt) {
            for ($i = 0; $i < $amt; $i++) {
                $top[$i] = $n[$i];
            }
        }
        $v->articles = $top;
        $this->request->response = $v->render();
    }

    function action_contactus_menu() {
        $v = View::factory('includes/contactus_menu');
        $v->branches = ORM::factory('staticpage')
                        ->where('menu', '=', 'Campus')
                        ->find_all();
        $this->request->response = $v->render();
    }

    function action_contactus_menu_left() {
        $v = View::factory('includes/contactus_menu_left');
        $v->branches = ORM::factory('staticpage')
                        ->where('menu', '=', 'Campus')
                        ->find_all();
        $this->request->response = $v->render();
    }

    function action_academicbody_icon($id) {
        $v = View::factory('includes/academicbody_icon');
        $v->academicbody = ORM::factory('academicbody')->find($id);
        $this->request->response = $v->render();
    }

    function action_academicbody_menu() {
        $v = View::factory('includes/academicbody_menu');
        $v->academicbody = ORM::factory('academicbody')->find_all();
        $this->request->response = $v->render();
    }

    function action_event_menu() {
        $v = View::factory('includes/event_menu');
        $v->events = DB::select('simpleevent.name', 'simpleevent.id')
                        ->from('simpleevent')
                        ->where('eventdate', '>=', date('Y-m-d'))
                        ->execute();
        $this->request->response = $v->render();
    }

    function action_testimonial() {
        $v = View::factory('includes/testimonial');
        $today = date("y-m-d");
        $t = ORM::factory('advertisement')
                        ->where('adstype', '=', FALSE)
                        ->where('status', '=', 'PUBLISHED')
                        ->where('expirydate', '>', $today)->find_all();
        $dataset = array();
        foreach ($t as $i => $test) {
            $dataset[] = array('filename' => $test->myimage->filename, 'url' => $test->url);
        }
        shuffle($dataset);

        $v->testimonials = array_slice($dataset, 0, 1);
        $this->request->response = $v->render();
    }

}

// End Include
