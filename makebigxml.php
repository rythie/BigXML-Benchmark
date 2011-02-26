<?php
	/* create a large XML file */
	$filename = "big.rss";

	if(isset($argv[1]) && is_numeric($argv[1]))
	{
		$num_records = $argv[1];
		echo "Creating $num_records records\n";
	}
        else //default
	{
		$num_records = 100000; //100,000 records = 108Mb
		echo "Using default of $num_records records\n";
	}

	$data = '<?xml version="1.0" encoding="UTF-8" ?' . "> <rss> <channel>";
	file_put_contents($filename,$data);

	for($i = 0; $i < $num_records; $i++)
	{
		$data = "<item><pubDate>2011-01-01</pubDate><title>test $i</title><description>" .
				"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu magna quis purus sagittis mollis. Morbi sit amet nibh mauris.
				Donec non placerat mi. Ut eleifend gravida dapibus. Proin rhoncus egestas urna ac auctor. Pellentesque at sem orci. Donec nisi quam,
				congue vel consectetur vitae, fermentum nec lacus. Morbi id turpis tortor. Donec consectetur eros nec orci facilisis ut pulvinar eros
				consectetur. Ut sed malesuada leo. Integer laoreet tempor tincidunt. Duis eu lobortis odio. Proin ornare auctor laoreet. Class aptent
				taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.

				Donec adipiscing ornare diam nec posuere. Nullam iaculis elit commodo nisl lobortis cursus. Maecenas condimentum nulla in metus
				molestie ultrices. Vestibulum fringilla ipsum non tellus tincidunt euismod. Aliquam cursus condimentum convallis. Ut suscipit
				tristique elit. Sed purus leo, feugiat ac hendrerit non, viverra sed lectus. Curabitur gravida lacinia risus sed cursus. Sed orci
				aliquam." .
				"</description></item>";
		file_put_contents($filename,$data, FILE_APPEND);
	}

	$end_data = "</channel></rss>";
	file_put_contents($filename,$end_data, FILE_APPEND);

?>
