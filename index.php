<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title ( '|', true,'right' ); ?><?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">
<?php wp_head(); ?>
</head>

<body>

<?php
global $wp;
$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );

if( $current_url === get_home_url() ) {
    echo '**top**';
} else {
    $home = esc_url( get_home_url() );
    echo "<div><a href=\"$home\">top</a></div>";
}
?>


<div class="row" id="main">
<div id="content">
<?php
if( is_404() ){
    get_template_part('inc/404');
}elseif(is_singular()){
    get_template_part('inc/post');
}else{
    get_template_part('inc/posts');
}
?>
</div>
<aside id="sidebar">
<?php get_template_part('inc/sidebar'); ?>
</aside>
</div>


</body>

</html>
