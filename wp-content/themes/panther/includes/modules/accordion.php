<?php $padding_top = $page_module['padding_top'];?>
<?php $padding_bottom = $page_module['padding_bottom'];?>
<?php $additional_styles = $page_module['additional_css_styles'];?>
<?php $additional_js = $page_module['additional_js'];?>
<?php $page_module_id = $page_module['id'] ? $page_module['id'] : $page_module['acf_fc_layout']."_".$key;?>
<?php $classes = $page_module['classes'];?>
<!-- Accordion -->
<?php if($additional_styles):?>
<style>
	<?php echo $additional_styles;?>
</style>
<?php endif;?>
<div id="<?php echo $page_module_id;?>" class="section accordion <?php echo $classes;?> <?php echo $padding_bottom=='large' ? 'padding-lg-bottom' : ($padding_bottom=='medium' ? 'padding-md-bottom' : ($padding_bottom=='small' ? 'padding-sm-bottom' : ''));?> <?php echo $padding_top=='large' ? 'padding-lg-top' : ($padding_top=='medium' ? 'padding-md-top' : ($padding_top=='small' ? 'padding-sm-top' : ''));?>" style="<?php if($page_module['background_color']):?>background-color:<?php echo $page_module['background_color'];?>;<?php endif;?>">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
				<div class="panel-group" id="accordion_<?php echo $page_module_id;?>" role="tablist" aria-multiselectable="true">
					<?php foreach($page_module['accordion'] as $key => $accordion):?>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading<?php echo $key;?>">
							<h4>
								<a data-toggle="collapse" data-parent="#accordion_<?php echo $page_module_id;?>" href="#<?php echo $page_module_id;?>_collapse<?php echo $key;?>" aria-expanded="true" aria-controls="collapse<?php echo $key;?>" <?php if($key!=0):?>class="collapsed"<?php endif;?>>
									<?php echo $accordion['header'];?>
								</a>
							</h4>
						</div>
						<div id="<?php echo $page_module_id;?>_collapse<?php echo $key;?>" class="panel-collapse collapse <?php if($key==0):?>in<?php endif;?>" role="tabpanel" aria-labelledby="heading<?php echo $key;?>">
							<div class="panel-body">
								<?php echo $accordion['content'];?>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if($additional_js):?>
<script type="text/javascript">
	<?php echo $additional_js;?>
</script>
<?php endif;?>
<!-- /Accordion -->
