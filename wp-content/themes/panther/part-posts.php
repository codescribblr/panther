<section id="posts_container" class="posts_container">
	<?php

	if( have_posts() ) : ?>
	<div class="post-holder">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8">
					<?php while( have_posts() ) : the_post();?>
					<article class="post <?php if(has_post_thumbnail()):?>with-image<?php endif;?>">
							<?php if(has_post_thumbnail()):?>
							<div class="post-image">
								<a class="info-link" href="<?php echo get_permalink( get_the_ID() ); ?>" title="<?php the_title_attribute(); ?>">
						 			<?php the_post_thumbnail('blog-thumb');?>
						 			<h2 class="post-title h4"><?php the_title(); ?></h2>
						 		</a>
						 	</div>
							<div class="post-body">
								<?php the_excerpt(); ?>
							</div>
							<header class="post-header <?php if(has_post_thumbnail()):?>with-image<?php endif;?>">
						 		<?php if(!has_post_thumbnail()):?>
								<a class="info-link" href="<?php echo get_permalink( get_the_ID() ); ?>" title="<?php the_title(); ?>"><h2 class="h4 post-title"><?php the_title(); ?></h2></a>
								<?php endif;?>
								<div class="post-date">
									 <p class="h5"><?php echo get_the_time('F j, Y'); ?></p>
								</div>
								<div class="post-categories">
									<p class="h5">Posted in: <?php echo get_the_category_list(', ');?></p>
								</div>

							</header>
							<?php else:?>
							<header class="post-header <?php if(has_post_thumbnail()):?>with-image<?php endif;?>">
						 		<?php if(!has_post_thumbnail()):?>
								<a class="info-link" href="<?php echo get_permalink( get_the_ID() ); ?>" title="<?php the_title(); ?>"><h2 class="h4 post-title"><?php the_title(); ?></h2></a>
								<?php endif;?>
								<div class="post-date">
									 <p class="h5"><?php echo get_the_time('F j, Y'); ?></p>
								</div>
								<div class="post-categories">
									<p class="h5">Posted in: <?php echo get_the_category_list(', ');?></p>
								</div>

							</header>
							<div class="post-body">
								<?php the_excerpt(); ?>
							</div>
							<?php endif;?>
					</article>
					<?php endwhile; ?>
				</div>
				<div class="col-xs-12 col-sm-4">
					<?php get_sidebar();?>
				</div>
			</div>
				
			<div class="row" style="text-align: center;">
				<?php if(function_exists("builder_numbered_pages")) { ?>
                     <?php builder_numbered_pages(); ?>
                  <?php } else { ?>
                     <nav>
                        <ul class="pager">
                           <li class="previous"><?php next_posts_link( __( '&laquo; Older Entries', 'panthertheme' ) ); ?></li>
                           <li class="next"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'panthertheme' ) ); ?></li>
                        </ul><!-- end of .pager -->
                     </nav>
                  <?php } ?>
			</div>
		</div>
	</div>
	<?php endif;?>
</section>