<?php
defined('SYSPATH') or die('No direct script access.');
/**
 * This is the View for International Page.
 *
 *
 * @category   View
 * @package    International
 * @subpackage
 * @copyright  Copyright (c) 2010 School of Business and Computer Science Limited (http://www.sbcs.edu.tt)
 * @license    TBD
 * @version    $Id:$
 * @link
 * @since      File available since Site Design 2.0
 */
?>

<?php
foreach ($staticpages as $s) {
?>
    <div class="separator">    
        <h4><?php echo HTML::anchor('international/page/' . $s->spage->id, $s->spage->title) ?></h4>
        <p>
        <?php
        echo Text::limit_words(strip_tags($s->spage->description), 40, '...');
        ?>
    </p>
    <?php
        echo HTML::anchor('international/page/' . $s->spage->id, 'Read More')
    ?>


    </div>
<?php
    }
?>
