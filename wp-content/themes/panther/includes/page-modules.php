<?php if($page_modules = $page_modules ? $page_modules : get_field('page_modules', get_the_ID())):?>
<?php foreach($page_modules as $key => $page_module):?>
<?php include('modules/' . str_replace("_", "-", $page_module['acf_fc_layout']) . '.php');?>
<?php endforeach;?>
<?php endif;?>