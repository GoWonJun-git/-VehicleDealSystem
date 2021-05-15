<?php
	include_once "./config.php";
?>
<!DOCTYPE html>
<html>
	<head>	
		<meta charset="UTF-8">
        <title>Sign Up Page</title>

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
			<div class="col-lg-2"></div>
			<div class="col-lg-7">
				<div class="jumbotron" style="padding-top: 20px;">
					<form name="sale"  method="post" action="sale_ok.php">
						<h3 style="text-align: center">차량판매 화면</h3>
						<div class="col-lg-3"></div>

						<!-- 차량 사진 입력창. -->
						<form method="post" enctype="multipart/form-data" onsubmit="return formSubmit(this);">
							<div class="form-group">
								<div id="file-js-example" class="file has-name is-info">
									<label class="file-label">
										<input class="file-input" type="file" name="picture" id="picture">
										<span class="file-cta">
											<span class="file-label">
												차량 사진 선택
											</span>
										</span>
										<span class="file-name">
											선택된 파일이 없습니다.
										</span>
									</label>
								</div>
							</div>
						</form>

						<!-- 차량 브랜드 입력창. -->
						<div class="form-group">
							<label for="brand">차량 브랜드 선택</label>
							<select class="form-control" id="brand" name="brand" onchange="selectModel(this)">
								<!-- kb 차차차 기준 판매 차량이 많은 브렌드 위주로 선택.-->
								<option value="0">차량의 브랜드를 선택해주세요</option>
								<option value="hyndai">현대</option>
								<option value="genesis">제네시스</option>
								<option value="kia">기아</option>
								<option value="gm_korea">한국GM</option>
								<option value="renaultsamsumg">르노삼성</option>
								<option value="ssangyong">쌍용</option>
								<option value="benz">벤츠</option>
								<option value="bmw">BMW</option>
								<option value="audi">아우디</option>
								<option value="volkswagen">폭스바겐</option>
								<option value="lexus">렉서스</option>
								<option value="toyota">도요타</option>
								<option value="landrover">랜드로버</option>
								<option value="mini">미니</option>
								<option value="volvo">볼보</option>
								<option value="jaguar">재규여</option>
								<option value="jeep">지프</option>
								<option value="porsche">포르쉐</option>
							</select>
						</div>

						<!-- 차량 모델 입력창. 
							 선택한 차량 브랜드에 맞는 모델들이 표시.-->
						<div class="form-group">
							<label for="model">차량 모델 선택</label>
							<select class="form-control" id="model" name="model">
								<option value="0">차량의 모델을 선택해주세요.</option>
							</select>
						</div>

						<!-- 차량 설명 입력창. -->
						<div class="form-group">
                            <textarea type="text" class="textarea has-fixed-size is-large" placeholder="차량 설명" name="description" id="description"></textarea>
                        </div>	

						<!-- 희망 가격 입력창. -->
						<div class="form-group">
							<input type="email" class="form-control" placeholder="희망 가격" name="price" id="price">
						</div>

						<!-- 차량판매 & 초기화 선택 박스.-->
						<span class="btn btn-primary form-control" onclick="check_input()">차량판매</span>&nbsp;
						<span class="btn btn-primary form-control" onclick="reset_form()">초기화</span>
					</form>
				</div>
			</div>
		</div>

		<!-- JS 영역 시작. -->
		<script>

            /*
            화면에서 차량 사진 파일이 저장될 시 파일의 이름을 변경하는 함수.
            */
            const fileInput = document.querySelector('#file-js-example input[type=file]');
            fileInput.onchange = () => {
                if (fileInput.files.length > 0) {
                const fileName = document.querySelector('#file-js-example .file-name');
                fileName.textContent = fileInput.files[0].name;
                }
            }

			/*
			선택한 차량 브랜드에 맞는 차량 모델을 표시하는 함수.
			*/
			function selectModel (brand) {
				// 각 브랜드에 맞는 차량 모델 기입.
				var hyndai = ["그랜저", "쏘나타", "스타렉스", "포터", "아반떼", "싼타페", "제네시스", "투싼", "에쿠스"];
				var genesis = ["G80", "EQ900", "G70", "G90", "GV80", "GV70"];
				var kia = ["카니발", "모닝", "K3", "K5", "K7", "K9", "봉고", "토렌토", "스포티지"];
				var gm_korea = ["쉐보레 스파크", "쉐보레 말리부", "쉐보레 크루즈", "마티즈", "마세티", "다마스"];
				var renaultsamsumg = ["SM3", "SM5", "SM6", "SM7", "QM3", "QM5", "QM6"];
				var ssangyong = ["코란도", "티볼리", "렉스턴", "체어맨", "액티언"];
				var benz = ["E-클래스", "C-클래스", "S-클래스", "CLS-클래스", "GLC-클래스", "CLA-클래스", "A-클래스"];
				var bmw = ["1시리즈", "2시리즈", "3시리즈", "4시리즈", "5시리즈", "6시리즈", "7시리즈", "GT"];
				var audi = ["A6", "A4", "A7", "A8", "Q5", "A5", "A3", "Q7", "Q3"];
				var volkswagen = ["골프", "티구안", "파사트", "CC", "제타", "비틀"];
				var lexus = ["ES", "LS", "RX", "IS", "NX", "GS", "CT", "UX"];
				var toyota = ["캠리", "프리우스", "시에나", "RAV 4", "86", "아발론"];
				var landrover = ["레인지로버 이보크", "디스커버리", "디스커버리 스포츠", "레인지로버 스포츠", "레인지로버", "레인지로버 벨라"];
				var mini = ["쿠퍼", "컨트리맨", "클럽맨", "쿠퍼 컨버터블", "쿠페", "로드스터", "페이스맨", "로버 미니"];
				var volvo = ["S60", "S90", "XC60", "XC90", "V40", "S80", "V60", "C30", "XC70", "XC40"];
				var jaguar = ["XF", "XJ", "XE", "F-PACE", "F-TYPE", "X-TYPE", "E-PACE", "S-TYPE", "I-PACE"];
				var jeep = ["체로키", "랭글러", "레니게이드", "캠패스", "커맨더", "글래디에이터"];
				var porsche = ["카이엔", "파니메라", "911", "마칸", "박스터", "카이맨", "타이칸"];

				// target을 model을 표시하는 영역으로 초기화.
				var target = document.getElementById("model");

				// 선택한 브랜드에 맞는 모델 Array로 model 변수를 초기화.
				if (brand.value == "hyndai") {
					var model = hyndai;
				}
				else if (brand.value == "genesis") {
					var model = genesis;
				}
				else if (brand.value == "kia") {
					var model = kia;
				}
				else if (brand.value == "gm_korea") {
					var model = gm_korea;
				}
				else if (brand.value == "renaultsamsumg") {
					var model = renaultsamsumg;
				}
				else if (brand.value == "ssangyong") {
					var model = ssangyong;
				}
				else if (brand.value == "benz") {
					var model = benz;
				}
				else if (brand.value == "bmw") {
					var model = bmw;
				}
				else if (brand.value == "audi") {
					var model = audi;
				}
				else if (brand.value == "volkswagen") {
					var model = volkswagen;
				}
				else if (brand.value == "lexus") {
					var model = lexus;
				}
				else if (brand.value == "toyota") {
					var model = toyota;
				}
				else if (brand.value == "landrover") {
					var model = landrover;
				}
				else if (brand.value == "mini") {
					var model = mini;
				}
				else if (brand.value == "volvo") {
					var model = volvo;
				}
				else if (brand.value == "jaguar") {
					var model = jaguar;
				}
				else if (brand.value == "jeep") {
					var model = jeep;
				}
				else if (brand.value == "porsche") {
					var model = porsche;
				}

				// model 변수의 값을 전달.
				target.options.length = 0;
				for (x in model) {
					var opt = document.createElement("option");
					opt.value = model[x];
					opt.innerHTML = model[x];
					target.appendChild(opt);
				}
			}

			/*
			값 작성 여부 체크.
			값이 작성되지 않았을 경우, 값이 이상한 경우 이를 알려주는 함수.
			*/
			function check_input() {
                if (!$("#picture").val()) {
			        alert("차량 사진을 입력해주세요.");
			        $("#picture").focus();
			        return;
			    }

				// 파일이 이미지 파일인지 확인.
				var pictureName = $("#picture").val();		  // 업로드 한 파일의 이름으로 변수 초기화.
				var extArray1 = ["pdf", "jpg", "gif", "png"]; // 업로드 할 수 있는 파일 확장자를 제한.
				var extArray2 = pictureName.split(".");		  // 업로드 한 파일의 이름에서 확장자만 추출해 와서 변수 초기화.
				var checkExt = false;
				// 업로드 파일의 확장자가 이미지 파일의 확장자와 일치하는지 확인.
				for(var i = 0; i < extArray1.length; i++) {
					if(extArray2[1] == extArray1[i]) {
						checkExt = true;
						break;
					}
				}
				// 이미지 파일이 아닐 경우 출력.
				if(checkExt == false) {
					alert("이미지 파일이 아닙니다.");
					return;
				}

				if (brand.value == "0") {
			        alert("브랜드를 입력해주세요.");
			        $("#brand").focus();
			        return;
			    }
				if (model.value == "0") {
			        alert("모델을 입력해주세요.");
			        $("#model").val().focus();
			        return;
			    }
				if (!$("#description").val()) {
			        alert("설명을 입력해주세요.");
			        $("#description").focus();
			        return;
			    }
				if (!$("#price").val()) {
			        alert("희망 가격을 입력해주세요.");
			        $("#price").focus();
			    	return;
			    }
			}
	
			// 초기화 함수.
			function reset_form() {
			    document.sale.picture.value = "";
                document.sale.brand.value = "";
                document.sale.model.value = "";
                document.sale.description.value = "";
                document.sale.price.value = "";
			    document.join.picture.focus();
			    return;
			}
		</script>
	</body>
</html>