Emojify variable names
=======

Replace PHP variable names with emojis.  This is probably a bad idea.

# Why?

https://twitter.com/waldojaquith/status/352175554532876288

Example usage:

	<?php

		require_once('emojify.class.php');
		
		$example = file_get_contents('example_source.php');
		
		$emojify = new emojify($example);
		
		echo $emojify->run();

	?>

You can also set things to exclude from replacement:

	$emojify = new emojify($example,'do_not_replace_this');

	$emojify = new emojify($example,array('do_not','replace_these'));

	$emojify->exclude('do_not_replace_this');

	$emojify->exclude(array('do_not','replace_these'));