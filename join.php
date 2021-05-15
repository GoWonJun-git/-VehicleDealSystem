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

		<!-- 회원가입 창 영역. -->
		<div class="container"> 
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div class="jumbotron" style="padding-top: 20px;">
					<form name="join"  method="post" action="join_ok.php">
						<h3 style="text-align: center">회원가입 화면</h3>
						<div class="col-lg-4"></div>

						<!-- id 입력창. -->
						<div class="form-group">
							<input type="text" class="form-control" placeholder="아이디" name="id" id="id">
						</div>

						<!-- id 중복 여부 확인 함수로 이동. -->
						<div class="form-group">
							<span id="id_check_msg" data-check="0"></span>
						</div> 

						<!-- password 입력창. -->    
						<div class="form-group">
							<input type="password" class="form-control" placeholder="비밀번호" name="pass" id="pass">
						</div>

						<!-- password 재입력창. -->
						<div class="form-group">
							<input type="password" class="form-control" placeholder="비밀번호 확인" name="pass_confirm" id="pass_confirm">
						</div>

						<!-- password 일치 여부 확인 함수로 이동. -->
						<div class="form-group">
							<span id="pass_check_msg" data-check="0"></span>
						</div>    

						<!-- 이름 입력창. -->
						<div class="form-group">
							<input type="text" class="form-control" placeholder="이름" name="name" id="name">
						</div>

						<!-- 전화번호 입력창. -->
						<div class="form-group">
							<input type="tel" class="form-control" placeholder="전화번호" name="phone" id="phone">
						</div>	

						<!-- E-Mail 입력창. -->
						<div class="form-group">
							<input type="email" class="form-control" placeholder="이메일" name="email" id="email">
						</div>

						<!-- 성별 체크 박스. -->
						<div class="form-group" style="text-align: center">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-primary active">
									<input type="radio" name="gender" id="gender1" autocomplete="off" value="남자" checked>남자
								</label>
								<label class="btn btn-primary">
									<input type="radio" name="gender" id="gender2" autocomplete="off" value="여자">여자
								</label>
							</div>
						</div>

						<!-- 회원가입 & 초기화 선택 박스.-->
						<span class="btn btn-primary form-control" onclick="check_input()">회원가입</span>&nbsp;
						<span class="btn btn-primary form-control" onclick="reset_form()">초기화</span>
					</form>
				</div>
			</div>
		</div>

		<!-- JS 영역 시작. -->
		<script>

			/* 아이디 중복 체크(비동기통신)
			   문서가 로드되면 function을 실행.
			   아이디가 id인것을 찾아 포커즈를 빠져나갈때 발생하는 이벤트.
			 */
			$(function(){
				$("#id").blur(function(){
					if($(this).val()==""){
						$("#id_check_msg").html("아이디를 입력하세요.").css("color","red").attr("data-check","0");
						$(this).focus();
					}else{
						checkIdAjax();				
					}
				});
			});

			/* 
			비밀번호 일치 체크(비동기통신) 
			*/
			$(function(){
				$("#pass_confirm").blur(function(){
					if( $(this).val()!=$("#pass").val() ) {
						$("#pass_check_msg").html("비밀번호가 일치하지 않습니다.").css("color","red");
					}else if( ($("#this").val()=="") || ($("#pass").val()=="") ){
						$("#pass_check_msg").html("비밀번호를 입력하세요.").css("color","red");
					}else{
						$("#pass_check_msg").html("비밀번호가 일치합니다.").css("color","blue");
					}
				});
			});

			/* 
			아이디 중복 체크(비동기통신) 
			id값을 post로 전송해서 서버와 통신하여 중복 결과 json 형태로 받아오는 함수.
			비동기 통신 방법, 객체로 보낼때 {} 사용
			*/
			function checkIdAjax(){
				$.ajax({
					url : "./ajax/check_id.php",
					type : "post",
					dataType : "json",
					data : {
						"id" : $("#id").val()
					},
					success : function(data){
						if(data.check){
							$("#id_check_msg").html("사용 가능한 아이디입니다.").css("color", "blue").attr("data-check","1");
						}else{
							$("#id_check_msg").html("중복된 아이디입니다.").css("color", "red").attr("data-check","0");
							$("#id").focus();
						}
					}
				});
			}

			/*
			값 작성 여부 체크.
			값이 작성되지 않았을 경우 작성되지 않은 값을 알려주는 함수.
			*/
			function check_input() {
				if (!$("#id").val()) {
			        alert("아이디를 입력해주세요.");
			        $("#id").focus();
			        return;
			    }
				if (!$("#pass").val()) {
			        alert("비밀번호를 입력해주세요.");
			        $("#pass").val().focus();
			        return;
			    }
				if (!$("#pass_confirm").val()) {
			        alert("비밀번호확인을 입력해주세요.");
			        $("#pass_confirm").focus();
			        return;
			    }
				if (!$("#name").val()) {
			        alert("이름 입력해주세요.");
			        $("#name").focus();
			    	return;
			    }
			    if (!$("#phone").val()) {
			        alert("전화번호를 입력해주세요.");
			        $("#phone").focus();
			        return;
			    }
			    if (!$("#email").val()) {
			        alert("이메일 주소를 입력해주세요.");
			        $("#email").focus();
			        return;
			    }
			    if ( $("#pass").val() != $("#pass_confirm").val()) {
			        alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
			        $("#pass").focus();
			        $("#pass").select();
			        return;
			    }
				document.join.submit();
			}
	
			function reset_form() {
			    document.join.id.value = "";  
			    document.join.pass.value = "";
			    document.join.pass_confirm.value = "";
			    document.join.name.value = "";
			    document.join.phone.value = "";
			    document.join.email.value = "";
				document.join.gender.value = "";
			    document.join.id.focus();
			    return;
			}
		</script>
	</body>
</html>