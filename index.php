<?php

include 'simplehtmldom_1_9_1/simple_html_dom.php';

$html = file_get_html('https://blog.ivivu.com/category/viet-nam/');
$reponse = [
	'title' => 0,
	'url' => 0,
	'date' => 0,
	'link_image' => 0,
	'views' => 0,
	'description' => 0
];
// echo '<b>Danh sách các tiêu đề:</b><br>';

foreach($html->find('.entry-header>h2') as $item) {
	$reponse['title'] = $item->plaintext.'<br>';
}
// echo "<br><b>Danh sách các ảnh:</b><br>";
foreach($html->find('.overlay>a>img') as $item) {
	$reponse['link_image'] = $item->src.'<br>';
	// echo '<img src="'.$item->src.'">';
}

foreach ($html->find('.entry-header>h2>a') as $item) {
	$reponse['url'] = $item->href.'<br>';
}

foreach ($html->find('.date') as $item) {
	$reponse['date'] = $item->plaintext.'<br>';
}

foreach ($html->find('.views') as $item) {
	$reponse['views'] = $item->plaintext.'<br>';
}
foreach ($html->find('.entry-excerpt>p') as $item) {
	$reponse['description'] = $item->plaintext.'<br>';
}

var_dump($reponse);