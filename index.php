<?php
	include_once "./config.php";
?>
<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
		<title>Main Page</title>

        <!-- Bulma 표준 css head. -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

		<?php include_once "./fragments/head.php";?>

		<style>
			#cen{text-align:center;}
		</style>
    </head>

    <body>
		<!-- 표준 네비게이션 바. -->
		<nav class="navbar navbar-default">
			<?php include_once "./fragments/header.php";?>
		</nav>

		<!-- 검색 창. -->
		<div class="columns">
			<div class="column is-half">
				<input class="input is-large" type="text" placeholder="Large input">
			</div>
			<div class="column">
				<button class="button is-link is-large">Link</button>
			</div>
		</div>

		<!-- 추천 상품 표시 -->
		<div class="container">
			<h1 id="cen">추천 상품</h1>
		</div>

		<!-- 추천할 차량의 사진과 이름과 금액 표시.-->
		<div class="columns">
			<div class="column">
				<figure class="image is-128x128"><img src="image/1번.jpg"></figure>
				<h2>1번</h2>
			</div>
			  <div class="column">
				<figure class="image is-128x128"><img src="image/2번.jpg"></figure>
			  </div>
			  <div class="column">
				<figure class="image is-128x128"><img src="image/3번.jpg"></figure>
			  </div>
		</div>




    </body>
</html>