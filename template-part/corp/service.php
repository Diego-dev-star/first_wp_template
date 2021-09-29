<?php
/**
 * Created by PhpStorm.
 * User: mlata
 * Date: 16.12.2019
 * Time: 14:38
 */
?>

<!-- Side Thumb -->
    <div class="skills-side-thumb">
        <?php if ( function_exists('dynamic_sidebar') )
            dynamic_sidebar('corp-img');
        ?>
    </div>
    <!-- Skills Content -->
    <div class="container">
        <div class="row">
            <?php if ( function_exists('dynamic_sidebar') )
                dynamic_sidebar('corp-html');
            ?>
        </div>
    </div>