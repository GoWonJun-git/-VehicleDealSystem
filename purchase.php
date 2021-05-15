<!doctype html>

<html class="ko">

	<head>
	<meta charset="UTF-8">
	<title>Purchase Page</title>
	</head>

    <body>
		<h1>차량 구매</h1>
		
		<?php 
			header('Content-Type: text/html; charset=UTF-8');
			include('simple_html_dom.php');
			//가져올 url 설정 
			$url = 'https://tv.zum.com/ranking'; 
			$html = @file_get_html($url); 

			unset($arr_result); 
			$arr_result = $html->find('div.tv_wrap>a'); 
			if(count($arr_result) > 0){ 
				foreach($arr_result as $e){ 
					echo $e->children(0)->plaintext.':'; 
					echo $e->children(1)->children(1)->plaintext.'<br/>'; 
				} 
			} 
			else { 
				echo "<br/>"; 
			} 
			unset($arr_result); $arr_result = $html->find('div.list_wrap>div.list');
			if(count($arr_result) > 0){ 
				foreach($arr_result as $e){ 
					echo $e->children(1)->plaintext.':'; 
					echo $e->children(2)->children(1)->children(0)->plaintext.'<br/>'; 
				} 
			} 
			else {
				echo "<br/>"; 
			} 
			exit; 
		?>


    </body>
</html>