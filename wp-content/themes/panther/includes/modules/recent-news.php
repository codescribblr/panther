<?php $padding_top = $page_module['padding_top'];?>
<?php $padding_bottom = $page_module['padding_bottom'];?>
<?php $additional_styles = $page_module['additional_css_styles'];?>
<?php $additional_js = $page_module['additional_js'];?>
<?php $categories = '';?>
<?php $posts_per_page = '';?>
<?php $recent_posts = '';?>
<?php $args = '';?>
<?php $classes = $page_module['classes'];?>
<!-- Recent News Events -->
<?php if($additional_styles):?>
<style>
	<?php echo $additional_styles;?>
</style>
<?php endif;?>
<div id="<?php if($page_module['id']):?><?php echo $page_module['id'];?><?php else:?><?php echo $page_module['acf_fc_layout']."_".$key;?><?php endif;?>" class="section recent-news-events <?php echo $classes;?> <?php echo $padding_bottom=='large' ? 'padding-lg-bottom' : ($padding_bottom=='medium' ? 'padding-md-bottom' : ($padding_bottom=='small' ? 'padding-sm-bottom' : ''));?> <?php echo $padding_top=='large' ? 'padding-lg-top' : ($padding_top=='medium' ? 'padding-md-top' : ($padding_top=='small' ? 'padding-sm-top' : ''));?>" style="<?php if($page_module['background_color']):?>background-color:<?php echo $page_module['background_color'];?>;<?php endif;?>">
	<div class="container">
		<div class="row">
			<?php $posts_per_page = ($page_module['limit_posts']) ? $page_module['limit_posts'] : -1;?>
			<?php $categories = ($page_module['categories_included']) ? $page_module['categories_included'] : '';?>
			<?php $args = $categories ? array('post_type'=>'post','posts_per_page'=>$posts_per_page, 'category__in'=>$categories) : array('post_type'=>'post','posts_per_page'=>$posts_per_page);?>
			<?php $recent_posts = new WP_Query($args);?>
			<?php if($recent_posts->have_posts()): while($recent_posts->have_posts()): $recent_posts->the_post();?>
			<div class="col-sm-12">
				<div class="">
					<div><?php echo get_the_date();?></div>
				</div>
				<div class="">
					<h2 style="text-align: left">
						<a href="<?php echo get_permalink();?>" class=""><?php echo get_the_title();?></a>
					</h2>
				</div>
				<div class="">
					<a href="<?php echo get_permalink();?>" class="btn btn-brown" title=""><?php echo ($page_module['read_more_link_text']) ? $page_module['read_more_link_text'] : 'Read More';?></a>
				</div>
			</div>
			<?php endwhile; endif; wp_reset_query();?>
		</div>
	</div>
</div>
<?php if($additional_js):?>
<script type="text/javascript">
	<?php echo $additional_js;?>
</script>
<?php endif;?>
<!-- /Recent News Events -->