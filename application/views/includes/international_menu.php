<?php defined('SYSPATH') or die('No direct script access.');
/**
 * International Menu
 * Creates the list of ALL International PAges to be rendered as a menu.
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

<?php
    echo HTML::anchor('international', I18n::get('international.menu'));
?>
<ul>
    <?php
    foreach($pages as $p) {
        echo "<li class='international_list_item'>" .
                HTML::anchor('staticpage/page/' . $s->id, $s->name) .
                "</li>";
    }
    ?>
</ul>