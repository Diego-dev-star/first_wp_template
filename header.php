<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head >
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo get_bloginfo('title');?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_template_directory_uri() . '/favicon.png'?>"/>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Poppins:300,400,500,600,700" rel="stylesheet">
    <?php wp_head();?>
    <script type="text/javascript">
        var disqus_developer = 1; // this would set it to developer mode
    </script>
