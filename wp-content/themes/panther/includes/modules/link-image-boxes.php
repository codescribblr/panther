<?php $padding_top = $page_module['padding_top'];?>
<?php $padding_bottom = $page_module['padding_bottom'];?>
<?php $additional_styles = $page_module['additional_css_styles'];?>
<?php $additional_js = $page_module['additional_js'];?>
<?php $classes = $page_module['classes'];?>
<!-- Link Image Boxes -->
<?php if($additional_styles):?>
<style>
	<?php echo $additional_styles;?>
</style>
<?php endif;?>
<div id="<?php if($page_module['id']):?><?php echo $page_module['id'];?><?php else:?><?php echo $page_module['acf_fc_layout']."_".$key;?><?php endif;?>" class="section link-image-boxes <?php echo $classes;?> <?php echo $padding_bottom=='large' ? 'padding-lg-bottom' : ($padding_bottom=='medium' ? 'padding-md-bottom' : ($padding_bottom=='small' ? 'padding-sm-bottom' : ''));?> <?php echo $padding_top=='large' ? 'padding-lg-top' : ($padding_top=='medium' ? 'padding-md-top' : ($padding_top=='small' ? 'padding-sm-top' : ''));?>" style="<?php if($page_module['background_color']):?>background-color:<?php echo $page_module['background_color'];?>;<?php endif;?>">
	<div class="container">
		<div class="row">
			<?php foreach($page_module['boxes'] as $key => $box):?>
			<div class="col-sm-4 col-xs-12">
				<a class="link-image-box" href="<?php echo $box['link'];?>">
					<img class="img-responsive" src="<?php if($box['image']):?><?php echo $box['image'];?><?php else:?>//placehold.it/418X237<?php endif;?>">
				</a>
			</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
<?php if($additional_js):?>
<script type="text/javascript">
	<?php echo $additional_js;?>
</script>
<?php endif;?>
<!-- /Link Image Boxes -->