<?php
isset( $navitems ) OR $navitems = array();
?>
<ul class="nav">
	<?php foreach( $navitems as $navitem ): ?>
	<li class="nav-item">
		<a class="nav-link<?php echo ( $navitem['active'] )? ' active' : ''; ?><?php echo ( $navitem['disabled'] )? ' disabled' : ''; ?>" href="<?php echo $navitem['href']; ?>"><?php echo $navitem['label']; ?></a>
	</li>
	<?php endforeach; ?>
</ul>