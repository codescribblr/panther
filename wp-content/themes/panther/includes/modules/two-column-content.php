<?php $padding_top = $page_module['padding_top'];?>
<?php $padding_bottom = $page_module['padding_bottom'];?>
<?php $additional_styles = $page_module['additional_css_styles'];?>
<?php $additional_js = $page_module['additional_js'];?>
<?php $classes = $page_module['classes'];?>
<!-- Two Column Content -->
<?php if($additional_styles):?>
<style>
	<?php echo $additional_styles;?>
</style>
<?php endif;?>
<div id="<?php if($page_module['id']):?><?php echo $page_module['id'];?><?php else:?><?php echo $page_module['acf_fc_layout']."_".$key;?><?php endif;?>" class="section two-column-content <?php echo $classes;?> <?php echo $padding_bottom=='large' ? 'padding-lg-bottom' : ($padding_bottom=='medium' ? 'padding-md-bottom' : ($padding_bottom=='small' ? 'padding-sm-bottom' : ''));?> <?php echo $padding_top=='large' ? 'padding-lg-top' : ($padding_top=='medium' ? 'padding-md-top' : ($padding_top=='small' ? 'padding-sm-top' : ''));?>" style="<?php if($page_module['background_color']):?>background-color:<?php echo $page_module['background_color'];?>;<?php endif;?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<?php echo $page_module['content1'];?>
			</div>
			<div class="col-sm-6 col-xs-12">
				<?php echo $page_module['content2'];?>
			</div>
		</div>
	</div>
</div>
<?php if($additional_js):?>
<script type="text/javascript">
	<?php echo $additional_js;?>
</script>
<?php endif;?>
<!-- /Two Column Content -->