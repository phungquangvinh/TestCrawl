<?php

include 'simplehtmldom_1_9_1/simple_html_dom.php';
$html = file_get_html('https://www.ivivu.com/blog/2020/01/hoa-ban-trang-no-ro-o-da-lat/');

echo '<b>Tiêu đề:</b> ';

$title = $html->find('.entry-title', 0)->plaintext;
echo $title.'<br><br><b>Đăng lúc:</b> ';
$date = $html->find('.entry-header>div>div>p>span', 0)->plaintext;
echo $date.'<br><b>Tác giả:</b> ';
$author = $html->find('.entry-content>p>strong>a', 0)->href;
echo $author.'<br>';

foreach ($html->find('.wp-caption>img') as $item) {
	echo '<img src="'.$item->src.'">';
}

echo '<br><br><b>Nội dung:</b><br>';

foreach ($html->find('.wp-caption-text') as $item) {
	echo $item->plaintext.'<br>';
	$item->save();
}