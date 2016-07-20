<?php
/**
 * Search Form Template
**/

?>
<form method="get" action="<?php echo home_url( '/' ); ?>">
	<div class="row">
		<div class="col-lg-12">
			<p>
				<input type="text" class="form-control search-query" name="s" placeholder="<?php esc_attr_e('Type in Keywords', 'panthertheme'); ?>" />
			</p>
			<p class="align-center">
				<button type="submit" class="btn btn-default btn-lg" name="submit" id="search-submit" value="<?php esc_attr_e('Go', 'panthertheme'); ?>">Search</button>
			</p>
		</div>
	</div>
</form>