<?php $padding_top = $page_module['padding_top'];?>
<?php $padding_bottom = $page_module['padding_bottom'];?>
<?php $background_style = $page_module['background_style'];?>
<?php $content_location = $page_module['content_location'];?>
<?php $additional_styles = $page_module['additional_css_styles'];?>
<?php $additional_js = $page_module['additional_js'];?>
<?php $classes = $page_module['classes'];?>
<!-- Banner -->
<?php if($additional_styles):?>
<style>
	<?php echo $additional_styles;?>
</style>
<?php endif;?>
<div id="<?php if($page_module['id']):?><?php echo $page_module['id'];?><?php else:?><?php echo $page_module['acf_fc_layout']."_".$key;?><?php endif;?>" class="section banner <?php echo $classes;?> <?php echo $padding_bottom=='large' ? 'padding-lg-bottom' : ($padding_bottom=='medium' ? 'padding-md-bottom' : ($padding_bottom=='xlarge' ? 'padding-xl-bottom' : 'padding-sm-bottom'));?> <?php echo $padding_top=='large' ? 'padding-lg-top' : ($padding_top=='medium' ? 'padding-md-top' : ($padding_top=='xlarge' ? 'padding-xl-top' : 'padding-sm-top'));?> <?php echo $background_style=='dark' ? 'dark-bg' : 'light-bg';?>" style="background: url('<?php if($page_module['background_image']):?><?php echo $page_module["background_image"];?><?php else:?>//placehold.it/1900X602<?php endif;?>') center center no-repeat; <?php if($page_module['background_color']):?>background-color:<?php echo $page_module['background_color'];?>;<?php endif;?> <?php if($page_module['background_size']):?>background-size:<?php echo $page_module['background_size'];?>;<?php endif;?>">
	<?php if($page_module['mobile_overlay']):?><div class="overlay"></div><?php endif;?>
	<div class="container">
		<div class="row">
			<?php if($content_location=='left'):?>
			<div class="content col-sm-6 col-sm-offset-1 col-xs-12">
				<?php echo $page_module['content'];?>
			</div>
			<?php elseif($content_location=='center'):?>
			<div class="content col-xs-12 col-sm-<?php echo $page_module['content_width'];?> <?php if($page_module['content_offset'] > 0):?>col-sm-offset-<?php echo $page_module['content_offset'];?><?php endif;?>">
				<?php echo $page_module['content'];?>
			</div>
			<?php else:?>
			<div class="content col-sm-6 col-sm-offset-5 col-xs-12">
				<?php echo $page_module['content'];?>
			</div>
			<?php endif;?>
		</div>
	</div> <!-- end .container-->
</div>
<?php if($additional_js):?>
<script type="text/javascript">
	<?php echo $additional_js;?>
</script>
<?php endif;?>
<!-- /Banner-->