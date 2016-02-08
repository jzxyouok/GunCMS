
<script type="text/javascript">
    $(document).ready(function () {
		$("#LogOutGoods_Form").validation(); 	
        $("#LogOutGoods_Submit").click(function () {
			if ($("form").valid()==false){//验证不通过
			   return false;
			}else{
				var options = {
					url: 'inc/views.php',
					type: 'post',
					dataType: 'text',
					data: $("#LogOutGoods_Form").serialize(),
					success: function (msg) {
						if (msg.length > 0)
							$("#responseText").html(msg);
					}
				};
				$.ajax(options);
				
				return false;
			}

        });
    });
</script>

<body class="textc" style="background:#CCC;">


<div class="container">    
<form role="form" action="./inc/views.php" method="post" id="LogOutGoods_Form">
	<fieldset>
      <div id="legend" class="">
        <legend class="">供货出库</legend>
      </div>
	  <div class="form-group">
		<label for="goodsID">货物编号</label>
		<input name="goodsID" type="text" check-type="required" required-message="货物编号不能为空！" class="form-control" id="goodsID" placeholder="Enter goods'id">
	  </div>
	  <div class="form-group">
		<label for="goodsName">货物名称</label>
		<input name="goodsName" type="text" check-type="required" required-message="货物名称不能为空！" class="form-control" id="goodsName" placeholder="Enter goods's name">
	  </div>
	   <div class="form-group">
		<label for="goodsNum">货物数量</label>
		<input name="goodsNum" type="text" check-type="required" required-message="货物数量不能为空！" class="form-control" id="goodsNum" placeholder="Enter goods'num">
	  </div>
	  <div class="form-group">
		<label for="goodsPrice">货物价格</label>
		<input name="goodsPrice" type="text" check-type="required" required-message="货物价格不能为空！" class="form-control" id="goodsPrice" placeholder="Enter goods's price">
	  </div>
	  <p><input type="hidden" value="1" name="page" /></p>
	  <button type="submit" id="LogOutGoods_Submit" class="btn btn-default">提交</button>
	  <p id="responseText"></p>
	 	   
  </fieldset>
</form>
</div>



</body>