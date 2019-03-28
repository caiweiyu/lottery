<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<style>
		body{
			position:relative;
		}
		.container{
			position:absolute;
			left:0;
			right:0;
			top:200px;
			bottom:0;
			width:400px;
			margin:auto;
		}
	
	</style>
</head>
<body>
	<div><?php 
		session_start();
		$time = time();
		$key = 'sess_' . $time;
		$_SESSION[$key] = $time;
	 ?>
	 </div>
	<div class="container">
		<form class="form-horizontal" action="test.php" method="post">
		  <input type="hidden" name="session_key" value="<?php echo $key;?>">
		  <div class="form-group">
		    <!-- <label for="inputEmail3" class="col-sm-2 control-label">姓名</label> -->
		    <div class="col-sm-12">
		      <input type="text" class="form-control" name="username" id="inputEmail3" placeholder="用户名">
		    </div>
		  </div>
		  <div class="form-group">
			    <!-- <label for="inputPassword3" class="col-sm-2 control-label">手机号</label> -->
			    <div class="col-sm-12">
			      <input type="number" class="form-control" name="userphone" id="inputPassword3" placeholder="手机号">
			    </div>
		  </div>
		  <div class="form-group">
		  		<div class="col-sm-12">
			  		<textarea name="content" id="content" class="form-control" readonly="readonly" rows="3"></textarea>
			  	</div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-10">
		      <button type="submit" class="btn btn-primary">提交</button>
		    </div>
		  </div>
		</form>
	</div>
	<script>
	// js截取url地址的奖品文字内容
	function GetQueryString(name){
	     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
	     var r = window.location.search.substr(1).match(reg);
	     if(r!=null){
	     	return  decodeURI(r[2]); //escape
	        return null;
	     }
	}
	var val = GetQueryString("content");
	setTimeout(function(){
		document.getElementById('content').value = decodeURI(val);
	},100)
	// 调用方法
	</script>
</body>
</html>