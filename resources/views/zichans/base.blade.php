<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>资产管理系统</title>
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- 	<link rel="stylesheet" type="text/css" href="...../public/bootstrap-3.3.5-dist/css/bootstrap.min.css"> -->
    <script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!--     <script type="text/javascript" src="...../public/jquery-1.11.3/jquery.min.js"></script> -->
<!--     <script type="text/javascript" src="...../public/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script> -->
    <script type="text/javascript">
		function getA()
		{
			var ajax = creatRequest();
			var parent_value = document.getElementById("bumen").value;
			var url = "keshi/"+parent_value;
			ajax.open("GET", url, true);
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4&&ajax.status == 200){
					updatepageA(ajax.responseText);//将从数据库中得到的数据更新html页面
					}
				
				}
			ajax.send(null);
		}

		function creatRequest()
		{
			var request;
			if(window.XMLHttpRequest)
				{
					request = new XMLHttpRequest();
				}else if(window.ActiveXObject){
					request = new ActiveXObject("Microsoft.XMLHTTP");
				}
			return request;

		}

		function updatepageA(keshiString){
				
				
				var keshiArray = new Array();
				if(keshiString!=""){
					keshiArray = keshiString.split("-");
					//alert(keshiArray.length);
					
					document.getElementById("keshi").options.length=0;
					for(var i=0; i<keshiArray.length-1; i++)
					{
						//创建新的选项
						
						
						document.getElementById("keshi").options[i]= new Option(keshiArray[i],keshiArray[i]);
// 						if(document.getElementById('keshiDefault').value == keshiArray[i])
// 						{
// 							document.getElementById("keshi").options[i].selected = true;
// 						}
					}
				}
			}	
    </script>
</head>
<body>

@yield('content')
<footer>
	<div class="text-center">
	研究院信息工程部@IT运营科
	</div>
</footer>
</body>
</html>
