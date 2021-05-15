<?php
if(isset($_POST['pc'])) {
     $toPostcode = $_POST['pc'];
    // do stuff with $toPostcode
    // use the API
    // get response
    echo $toPostcode;
}
?>
<html>
<head>

</head>
<body>

    <form method="post">
        <div class="form-group">
			<label>차량 부품 타입 선택</label>
			<select class="form-control" id="pc" name="pc">
				<option value="0">부품 타입을 선택해주세요.</option>
				<option value="하체">하체</option>
				<option value="브레이크">브레이크</option>
				<option value="엔진">엔진</option>
				<option value="전기">전기</option>
				<option value="용품">용품</option>
				<option value="내/외장">내/외장</option>
				<option value="기타">기타</option>
			</select>
		</div>
        <input class="form-postcode-submit" type="submit" onclick="click()">
    </form>

    <script>

        function click() {
            var pc = pc.value;
            $.ajax({
                type: 'post',
                data: {
                    pc:pc
                },
            });
        }
    </script>
</body>
</html>