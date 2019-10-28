<?php
isset( $navitems ) OR $navitems = array();
?>
<ul class="nav my-3">
	<?php foreach( $navitems as $navitem ): ?>
	<li class="nav-item">
		<a class="nav-link<?php echo ( !empty( $navitem['active'] ) )? ' active' : ''; ?><?php echo ( !empty( $navitem['disabled'] ) )? ' disabled' : ''; ?>"
			href="<?php echo $navitem['href']; ?>"
			<?php echo ( !empty( $navitem['target'] ) )? ' target="' . $navitem['target'] . '"' : ''; ?>>
			<?php echo $navitem['label']; ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>