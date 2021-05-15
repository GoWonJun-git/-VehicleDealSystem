<?php
	include_once "./config.php";
?>
<!DOCTYPE html>
<html>
	<head>	
		<meta charset="UTF-8">
        <title>vehicle Part Page</title>

        <!-- Bulma 표준 css head. -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

		<?php include_once "./fragments/head.php";?>
	</head>
	<body>
		<!-- 표준 네비게이션 바 (화면 상단에 위치, 화면에 의존하여 확대 및 축소) -->
		<nav class="navbar navbar-default">
			<?php include_once "./fragments/header.php";?>
		</nav>

		<!-- 차량 판매 창 영역. -->
		<div class="container"> 
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div class="jumbotron" style="padding-top: 20px;">
					<h3 style="text-align: center">차량 부품 정보</h3>
					<div class="col-lg-3"></div>


					<!-- 차량 부품 타입 선택창. -->
                    <form method="post">
						<div class="form-group">
							<label>검색하려는 부품명을 입력해주세요.</label>
							<input type="text" class="form-control" placeholder="부품 명을 입력하세요." id="vehiclePart" name="vehiclePart">
						</div>

						<!-- 차량 부품 검색 박스.-->
                        <input class="btn btn-primary form-control" type="submit" onclick="clickEvent()">
                    </form>
				</div>

                <?php
                    if(isset($_POST['vehiclePart'])) {
                        $vehiclePart = $_POST['vehiclePart'];

                        $conn = mysqli_connect("127.0.0.1", "root", "", "blockchain");
                        $sql = "SELECT * FROM vehiclePart WHERE partName LIKE '%". $vehiclePart. "%'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
								echo "부품 종류 : ". $row["partType"]. "<br>".
									"부품명 : ". $row["partName"]. "<br>".
									"설명 : ". $row["description"]. "<br><br>";
                            }
                        }
                        else{
                            echo "테이블에 데이터가 없습니다.";
                        }
                        // DB 접속 닫기.
                        mysqli_close($conn); 
                   }
                ?>

			</div>
		</div>

		<!-- JS 영역 시작. -->
		<script>
			/*
			제출 버튼 클릭 시 작동하는 함수.
            DropDown에서 선택된 값을 해당 페이지에 전송.
			*/
			function clickEvent() {
                var vehiclePart = vehiclePart.value;
                $.ajax({
                    type: 'post',
                    data: {
                        vehiclePart:vehiclePart
                    }
                });
			}
		</script>
	</body>
</html>