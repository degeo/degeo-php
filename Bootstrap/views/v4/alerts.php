<?php
( isset( $alerts ) && is_array( $alerts ) ) OR $alerts = [];

foreach( $alerts as $alert ):
	echo view( 'DeGeo\Bootstrap\Views\v4\alert', array( 'alert' => $alert ) );
endforeach;