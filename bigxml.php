<?php
	/* XMLReader + SimpleXML hybrid testing program - run like this: php -f bigxml.php */

	//Config
	$path = "big.rss";

	//Code
	if(!is_file($path))
		echo "No file at $path found, please create with 'php -f makebigxml.php'\n";

	if(isset($argv[1]))
		$method = $argv[1];
	else
		$method = "none";

	if(in_array($method,array("hybrid","xmlreader")))
	{
		$reader = new XMLReader();
		$reader->open($path);
		while($reader->read())
		{
			if($reader->nodeType == XMLReader::ELEMENT && $reader->name == 'item')
			{
				if($method == 'hybrid') //5 seconds at 100Mb
				{
					$doc = new DOMDocument('1.0', 'UTF-8'); 
					$xml = simplexml_import_dom($doc->importNode($reader->expand(),true));
				}
			}
		}
	}
	elseif($method == "simplexml")
	{
		$xml = simplexml_load_file($path);
		$i = 0;
		foreach($xml->channel->item as $item)
		{
		}
	}
	else
	{
		echo "Usage: " . $argv[0] . " (simplexml|hybrid|xmlreader)\n";
		
		echo "Benchmark Usage: " . 
			"/usr/bin/time -f \"%E real,%U user,%S sys,%MKb Max. RSS\" php -f bigxml.php simplexml\n";
	}
?>
