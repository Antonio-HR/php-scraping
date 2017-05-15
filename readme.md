# Scrapear con la librería PHP Simple HTML DOM Parser
Simple HTML DOM Parser es una librería de PHP -un lenguaje de servidor muy útil para construir aplicaciones web- que permite scrapear webs de una forma muy sencilla. ¿Qué se necesita antes de empezar?
1. Tener un servidor web instalado: Internet Information Services, o Apache son algunos ejemplos.
2. Instalar PHP en el servidor.
3. Un editor de texto / entorno de desarrollo (Eclipse) con depurador para PHP ayuda a encontrar fallos y mejorar la funcionalidad de nuestro script.

Para aprender en profundidad sobre cómo usar la librería, acudir a la [documentación](http://simplehtmldom.sourceforge.net/manual.htm). A continuación se describen los pasos seguidos para scrapear un listado simple como este de la [Wikipedia](https://es.wikipedia.org/wiki/Categor%C3%ADa:Ministros_del_franquismo).

1. Descargar el listado de la [Wikipedia](https://es.wikipedia.org/wiki/Categor%C3%ADa:Ministros_del_franquismo). (Click derecho, guardar como .html).

2. Descargar la librería [PHP Simple HTML DOM Parser](http://simplehtmldom.sourceforge.net/) y guardarla en un directorio localizado.

3. Crear un fichero que se llame index.php en el que escribiremos las siguientes instrucciones que configurarán el script que scrapea.

..*`require_once '/lib/simpleHtmlDom/simple_html_dom.php';` Requerir la librería.
..*`$html = new simple_html_dom();` instanciación del objeto simple_html_dom().
..*`$url = "html/ministros.html";` guardar en una variable $url el html descargado.
..*`$html->load_file($url);` le pasamos como parámetro el html al método load_file del objeto $html. Está función cargará la información almacenada en la variable $url para tratarla a continuación.
..*`$element = $html->find('div[id=mw-pages] li a');` Almacenamos en la variable $element, el elemento que queremos scrapear. En este caso al ser un anchor, dentro de un elemento de lista que se encuentra alojado dentro de un div cuyo id es mw-pages, lo invocaremos de esta manera. Para aprender más sobre la estructura del DOM y su inspección sigue este [enlace](https://www.youtube.com/watch?v=nV9PLPFTnkE).
..*`$result = "nombre;\r\n";` Almacenamos la cabecera del fichero csv que queremos tener al final. En este caso, se llamara nombre, ponemos ; para estructurar y los caracteres escapados de salto de línea.
..*Creamos un bucle para recorrer el elemento (el li anteriormente mencionado) y almacenarlo en la variable $result junto a la cabecera del paso anterior. A continuación, imprimimos el resultado, hacemos un echo.
```foreach ($element as $elementHTML){
		$result .= $elementHTML->innertext.";\r\n";
	}
echo $result;
```
El resultado en el navegador debería ser algo parecido a esto:

[logo]: /img/ejemplo.png "ejemplo"

A continuación, con botón derecho guardamos el contenido como .csv. Ya lo podemos importar a excel para hacer análisis de datos.