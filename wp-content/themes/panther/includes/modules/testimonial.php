<?php $padding_top = $page_module['padding_top'];?>
<?php $padding_bottom = $page_module['padding_bottom'];?>
<?php $background_style = $page_module['background_style'];?>
<?php $additional_styles = $page_module['additional_css_styles'];?>
<?php $additional_js = $page_module['additional_js'];?>
<?php $classes = $page_module['classes'];?>
<!-- Testimonial -->
<?php if($additional_styles):?>
<style>
	<?php echo $additional_styles;?>
</style>
<?php endif;?>
<div id="<?php if($page_module['id']):?><?php echo $page_module['id'];?><?php else:?><?php echo $page_module['acf_fc_layout']."_".$key;?><?php endif;?>" class="section banner testimonial <?php echo $classes;?> <?php echo $padding_bottom=='large' ? 'padding-lg-bottom' : ($padding_bottom=='medium' ? 'padding-md-bottom' : ($padding_bottom=='small' ? 'padding-sm-bottom' : ''));?> <?php echo $padding_top=='large' ? 'padding-lg-top' : ($padding_top=='medium' ? 'padding-md-top' : ($padding_top=='small' ? 'padding-sm-top' : ''));?> <?php echo $background_style=='dark' ? 'dark-bg' : 'light-bg';?>" style="background: transparent url('<?php if($page_module['background_image']):?><?php echo $page_module["background_image"];?><?php else:?>//placehold.it/1900X602<?php endif;?>') center center no-repeat; <?php if($page_module['background_color']):?>background-color:<?php echo $page_module['background_color'];?>;<?php endif;?>">
	<div class="container">
		<div class="row">
			<?php $rand = mt_rand(0, count($page_module['testimonials'])-1); 
			$testimonial = $page_module['testimonials'][$rand];?>
			<div class="content col-md-10 col-md-offset-1 col-xs-12">
				<p class="subheader"></p>
				<p class="testimony">&ldquo;<?php echo $testimonial['content'];?>&rdquo;</p>
				<p class="author h6"><?php echo $testimonial['author'];?></p>
				<p class="date h6"><?php echo $testimonial['date'];?></p>
			</div>
		</div>
	</div> <!-- end .container-->
</div> 
<?php if($additional_js):?>
<script type="text/javascript">
	<?php echo $additional_js;?>
</script>
<?php endif;?>
<!-- /Testimonial-->