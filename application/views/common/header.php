<?php
defined('SYSPATH') or die('No direct script access.');
/**
 * The Site Header
 *
 * This Header will be displayed on ALL pages of the site.
 * The header will contain a logo and a search box.
 *
 * @category   View
 * @package    Common
 * @subpackage
 * @copyright  Copyright (c) 2010 School of Business and Computer Science Limited (http://www.sbcs.edu.tt)
 * @license    TBD
 * @version    $Id:$
 * @link
 * @since      File available since Site Design 2.0
 */
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.topmenubar').hover(
            function () {
                $(this).removeClass('ui-state-default ui-corner-top');
                $(this).addClass('ui-state-hover ui-corner-top');
            },
            function () {
                $(this).removeClass('ui-state-hover ui-corner-top');
                $(this).addClass('ui-state-default ui-corner-top');
            });
    });
</script>
<div id="header">
    <div id="logo_wrapper">        
        <?php echo HTML::anchor('/', Html::image('media/images/main_logo.jpg', array('id' => 'logo', 'style' => 'border:none'))); ?>
        <div id="spacer"></div>
        <div id="searchbox">
            <div id="searchwrapper">
                <?php echo Form::open('search', array('method' => 'get', 'id' => 'searchForm')); ?>
                <div class="searchlabel">
                    <?php echo Form::label('term', 'search sbcs.edu.tt'); ?>
                    <?php echo Form::input('term', '', array('id' => 'term')); ?>
                </div>

                <?php echo Form::image(NULL, '', array('src' => 'media/images/28B.png', 'title' => 'Search')); ?>
                <?php echo Form::close(); ?>
                </div>
            </div>
            <div id="mainmenu_wrapper_left">
                <div id="mainmenu">
                    <ul class='sf-menu'>
                        <li id="aboutus_menu"><?php echo Request::factory('include/aboutus_menu')->execute() ?></li>
                        <li id="department_menu"><?php echo Request::factory('include/department_menu')->execute() ?></li>
                        <li id="subject_menu"><?php echo Request::factory('include/subject_menu')->execute() ?></li>
                        <li id="campus_menu"><?php echo Request::factory('include/campus_menu')->execute() ?></li>
                        <li id="studentservice_menu"><?php echo Request::factory('include/studentservice_menu')->execute() ?></li>
                        <li id="international_menu"><?php echo Request::factory('include/international_menu')->execute() ?></li>
                        <li id="alumni_menu"><?php echo Request::factory('include/alumni_menu')->execute() ?></li>
                    </ul>
                </div>
            </div>
    </div>
</div>