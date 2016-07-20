<?php
/*
Get details on other author tags here: http://codex.wordpress.org/Author_Templates
*/
?>
<?php get_header(); ?>

<div class="container">

	<div id="content">

		<div id="inner-content" class="wrap clearfix">

			<div id="main" class="content-main clearfix" role="main">

				<?php if (function_exists("builder_breadcrumb_lists")) { ?>
				<?php builder_breadcrumb_lists(); ?>
				<?php } ?>

				<?php
				$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
				?>

				<div class="row author-details">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<?php echo get_avatar($curauth->ID, 180); ?>
					</div> <!-- end col-sm-9 col-md-9 col-lg-9 -->
					
					<div class="col-sm-9 col-md-9 col-lg-9">
						<h2><?php echo $curauth->display_name; ?></h2>
						<ul>
							<li><a href="<?php echo $curauth->user_url; ?>">Website</a></li>
							<li><a href="<?php echo $curauth->twitter; ?>">Twitter</a></li>
							<li><a href="<?php echo $curauth->facebook; ?>">Facebook</a></li>
						</ul>

						<p><?php echo $curauth->user_description; ?></p>

					</div> <!-- end col-sm-9 col-md-9 col-lg-9 -->
				</div> <!-- end .row .author-details -->

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

					<header class="article-header">

						<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<p class="byline vcard"><?php
						printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'panthertheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), panther_get_the_author_posts_link(), get_the_category_list(', '));
						?></p>

					</header> <!-- end article header -->

					<section class="entry-content clearfix">
						<?php the_content(__($more_link, 'panthertheme')); ?>
					</section> <!-- end article section -->

					<footer class="article-footer">
						<!--<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'panthertheme' ) . '</span> ', ' ', '' ); ?></p>-->

					</footer> <!-- end article footer -->

					<?php // comments_template(); // uncomment if you want to use them ?>

				</article> <!-- end article -->

			<?php endwhile; ?>

			<?php if (function_exists("builder_numbered_pages")) { ?>
			<?php builder_numbered_pages(); ?>

			<?php } else { ?>
			<nav>
				<ul class="pager">
					<li class="previous"><?php next_posts_link( __( '&laquo; Older Entries', 'panthertheme' ) ); ?></li>
					<li class="next"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'panthertheme' ) ); ?></li>
				</ul><!-- end of .pager -->
			</nav>

			<?php } ?>

		<?php else : ?>

		<article id="post-not-found" class="hentry clearfix">
			<header class="article-header">
				<h1><?php _e( 'Oops, Post Not Found!', 'panthertheme' ); ?></h1>
			</header>
			<section class="entry-content">
				<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'panthertheme' ); ?></p>
			</section>
			<footer class="article-footer">
				<p><?php _e( 'This is the error message in the index.php template.', 'panthertheme' ); ?></p>
			</footer>
		</article>

	<?php endif; ?>

</div> <!-- end #main -->

<?php get_sidebar(); ?>

</div> <!-- end #inner-content -->

</div> <!-- end #content -->

</div> <!-- end .container -->

<?php get_footer(); ?>
