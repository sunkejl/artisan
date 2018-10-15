<?php
	$level = 0;
	$xml = xml_parser_create ('UTF-8');

	xml_set_element_handler ($xml, 'start_handler', 'end_handler');
	xml_set_character_data_handler ($xml, 'character_handler');

function start_handler ($xml, $tag, $attributes)
{
    global $level;

    echo "\n". str_repeat('  ', $level). ">>>$tag";
	foreach ($attributes as $key => $value) {
		echo " $key='$value'";
	}
    $level++;    
}

function end_handler ($xml, $tag)
{
    global $level;

    $level--;
    echo "\n". str_repeat('  ', $level). "<<<$tag";
}

function character_handler ($xml, $data)
{
    global $level;

	echo "\n";
    $data = split ("\n", wordwrap($data, 76 - ($level * 2)));
    foreach ($data as $line) {
        echo str_repeat('  ', ($level + 1)). "|". $line. "|\n";
    }
}

	xml_parse($xml, file_get_contents('test2.xml'));
?>

