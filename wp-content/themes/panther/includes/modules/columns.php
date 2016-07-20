<?php $padding_top = $page_module['padding_top'];?>
<?php $padding_bottom = $page_module['padding_bottom'];?>
<?php $background_style = $page_module['background_style'];?>
<?php $additional_styles = $page_module['additional_css_styles'];?>
<?php $additional_js = $page_module['additional_js'];?>
<?php $classes = $page_module['classes'];?>
<!-- Full Width Content -->
<?php if($additional_styles):?>
<style>
	<?php echo $additional_styles;?>
</style>
<?php endif;?>
<div id="<?php if($page_module['id']):?><?php echo $page_module['id'];?><?php else:?><?php echo $page_module['acf_fc_layout']."_".$key;?><?php endif;?>" class="section columns <?php echo $classes;?> <?php echo $padding_bottom=='large' ? 'padding-lg-bottom' : ($padding_bottom=='medium' ? 'padding-md-bottom' : ($padding_bottom=='small' ? 'padding-sm-bottom' : ''));?> <?php echo $padding_top=='large' ? 'padding-lg-top' : ($padding_top=='medium' ? 'padding-md-top' : ($padding_top=='small' ? 'padding-sm-top' : ''));?> <?php echo $background_style=='dark' ? 'dark-bg' : 'light-bg';?>" style="<?php if($page_module['background_image']):?>background: url('<?php echo $page_module["background_image"];?>') center center no-repeat;<?php endif;?> <?php if($page_module['background_color']):?>background-color:<?php echo $page_module['background_color'];?>;<?php endif;?> <?php if($page_module['background_size']):?>background-size:<?php echo $page_module['background_size'];?>;<?php endif;?>">
	<?php if($page_module['mobile_overlay']):?><div class="overlay"></div><?php endif;?>
	<div class="container">
		<div class="row">
			<?php foreach($page_module['columns'] as $column):?>
			<div class="column col-xs-12 col-sm-<?php echo $column['column_width'];?> <?php echo $column['column_offset'] ? 'col-sm-offset-'.$column['column_offset'] : '';?> <?php echo $column['column_ordering'] ? 'col-sm-'.$column['column_ordering'].'-'.$column['column_ordering_width'] : '';?><?php echo ($column['classes']) ? ' '. $column['classes'] : '';?>">
				<?php echo $column['content'];?>
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
<!-- /Full Width Content -->