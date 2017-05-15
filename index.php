<?php
//librer�a
	require_once '/lib/simpleHtmlDom/simple_html_dom.php';
	//instanciacion de simple_html_dom
	$html = new simple_html_dom();
	//cargar la url
	$url = "html/ministros.html";
	$html->load_file($url);
	//encontrar el elemento html deseado
	$element = $html->find('div[id=mw-pages] li a');
	$result = "nombre;\r\n"; 
	
	foreach ($element as $elementHTML){
		$result .= $elementHTML->innertext.";\r\n";
	}
	
	echo $result;
	
