<?php
if (file_exists('Test-sitiar.xml')) {
    echo '<link href="css/style.css" rel="stylesheet" type="text/css" >';
    $shop = simplexml_load_file("Test-sitiar.xml");
    echo "<div class='catalog'> ";
    foreach ($shop->xpath('//pos') as $pos) {

        echo <<<XML
<div class="pos" id="{$pos->uid}"><img src="css/table.png">
<div class="line"></div>
<div class="text">
 <div class="title">{$pos->title}</div>
 <div class="description">{$pos->descr}</div>
 <div class="price">{$pos->price}</div> </div>
 </div>
XML;
    }echo "</div>";

} else {
    exit('Failed to open Test-sitiar.xml.');
}
