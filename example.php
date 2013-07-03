<?php

require_once('emojify.class.php');

$example = file_get_contents('example_source.php');

$emojify = new emojify($example);

echo $emojify->run();

?>