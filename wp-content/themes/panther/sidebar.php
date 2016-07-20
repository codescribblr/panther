<div id="sidebar1" class="sidebar well clearfix" role="complementary">

	<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

	<?php dynamic_sidebar( 'sidebar1' ); ?>

	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->

	<div class="alert alert-danger">
		<p><?php _e( 'Please activate some Widgets.', 'panthertheme' );  ?></p>
	</div>

	<?php endif; ?>

</div>