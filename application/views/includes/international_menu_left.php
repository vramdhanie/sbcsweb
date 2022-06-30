<?php
defined('SYSPATH') or die('No direct script access.');
/**
 * Creates a UL List of Campus Links
 * This list is included in the main menu of the site.
 *
 * @category   View
 * @package    Menu
 * @subpackage
 * @copyright  Copyright (c) 2010 School of Business and Computer Science Limited (http://www.sbcs.edu.tt)
 * @license    TBD
 * @version    $Id:$
 * @link
 * @since      File available since Site Design 2.0
 */
?>

<h5 id="" class="ui-state-default ui-corner-top teal">
    <?php
    /*
     *
     *
     */
    echo HTML::anchor('international', I18n::get('international.menu'));
    ?>
</h5>

<ul>
    <?php
    foreach($pages as $p) {
        echo "<li class='international_list_item'>" .
                HTML::anchor('staticpage/page/' . $s->id, $s->name) .
                "</li>";
    }
    ?>
</ul>
