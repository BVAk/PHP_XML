<?php
if (file_exists('Test-sitiar.xml')) {
    echo '<link href="css/style.css" rel="stylesheet" type="text/css" >';
    $shop = simplexml_load_file("Test-sitiar.xml");
    echo "<div class='catalog'> ";
    foreach ($shop->xpath('//pos') as $pos) {
        $desc = str_replace(array('<descr>', '</descr>'), '', $pos->descr->asXML());
        $price = floatval($pos->price);
        $price = number_format($price, 0, ' ', ' ');
        echo <<<XML
<div class="pos" id="{{$pos->uid}}"><img src="css/table.png">
<hr class="line"></hr>
<div class="text">
 <div class="title">{$pos->title}</div>
 <div class="description">{$desc}</div>
 <div class="price">{$price} грн.</div> </div>
 </div>
XML;
    }
    echo "</div>";
} else {
    exit('Failed to open Test-sitiar.xml.');
}
