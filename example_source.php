<?php

	$duckburg_things = array('race cars','lasers','aeroplanes');

	print_r($duckburg_things);

	$solve_a_mystery = round(rand(0,1));
	$rewrite_history = round(rand(0,1));

	if ($solve_a_mystery || $rewrite_history) {

		echo 'Woo-oo!' . PHP_EOL;

	}

	$uncle = 'Donald Duck';

	$nephews = get_nephews($uncle);

	foreach($nephews as $nephew) {

		echo $uncle . ' is '. $nephew . '\'s uncle' . PHP_EOL;

	}

	function get_nephews($duck) {
		
		switch ($duck) {
			case 'Angus McDuck':
				return array('Scrooge McDuck');
			case 'Scrooge McDuck':
				return array('Donald Duck');
			case 'Donald Duck':				
				return array('Huey Duck','Dewey Duck','Louie Duck');
		}

		return array();
		
	}	

?>