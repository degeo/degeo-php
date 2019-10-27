<?php
( isset( $alert ) && is_array( $alert ) ) OR $alert = [];
?>
<div class="alert alert-<?php echo ( !empty( $alert['type'] ) )? $alert['type'] : 'primary'; ?> alert-dismissible fade show" role="alert">
	<?php echo ( !empty( $alert['content'] ) )? $alert['content'] : ''; ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
	</button>
</div>