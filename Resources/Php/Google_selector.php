<?php
// example of how to use basic selector to retrieve HTML contents
include('../simple_html_dom.php');
 
ini_set('user_agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:19.0) Gecko/20100101 Firefox/19.0');


// get DOM from URL or file
$html = file_get_html('https://www.google.dk/search?q=typo3&start=10');

// find all link
foreach($html->find('div#search h3 a') as $e)
    echo $e->href . "<br>\n";


?>