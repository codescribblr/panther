<?php get_header(); ?>
<?php $page_modules = get_field('page_modules', get_option('page_for_posts')); ?>
<!-- contain main informative part of the site -->
<main role="main" id="main" data-template="archive">
		<?php include(get_stylesheet_directory().'/includes/page-modules.php'); ?> 
		<?php get_template_part( 'part', 'posts' ); ?>
</main>

<?php get_footer(); ?>
