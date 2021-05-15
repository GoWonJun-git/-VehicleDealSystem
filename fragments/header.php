<div class="navbar-header">
	<a class="navbar-brand" href="index.php">중고차거래 웹 사이트</a>
</div>   

<div class="collapse navbar-collapse">
	<ul class="nav navbar-nav">
		<li><a href="purchase.php">구매할 때</a><li>
		<li><a href="sale.php">판매할 때</a></li>
		<li><a href="vehiclePart.php">차량 부품 정보</a></li>
	</ul>

	<?php 
		if(!$userid){
	?>    
				
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">접속하기
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li><a href="login.php">로그인</a></li>
				<li><a href="join.php">회원가입</a></li>
			</ul>
		</li>
	</ul>

	<?php 
		}else if($userid){	
			$logged = $username."(".$userid.")";
	?>

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				<b><?=$logged ?></b>
				님의 회원관리
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li><a href="logout.php">로그아웃</a></li>
			</ul>
		</li>
	</ul>
<?php }?>
</div>