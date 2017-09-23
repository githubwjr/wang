<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./static/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./static/css/backend.css">

</head>
<body>
	
	<!-- 导航条 -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  	<div class="container-fluid">
	    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">后台管理系统</a>
    	</div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">控制面板</a></li>
        <li><a href="#">微信消息管理</a></li>
        <li><a href="#">用户管理</a></li>
        <li><a href="#">素材管理</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">聆听<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">个人资料</a></li>
            <li><a href="#">设置</a></li>
            <li><a href="#">退出</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
	
	<div class="container-fluid margin100 minheight">
	<!-- 左侧菜单 -->
		<div class="col-md-2 left">	
			<ul class="list-group">
			<li class="list-group-item"><a>自动回复</a></li>
			<li class="list-group-item"><a>添加自动回复</a></li>
			</ul>
		</div>
		<!-- 右边的主体部分 -->
		<div class="col-md-10">	
		<div class="panel panel-default">
		  <div class="panel-heading">消息列表</div>
		  <div class="panel-body">
		   		<table class="table table-bordered">
							<tr>
							<th>ID</th>
							<th>关键词</th>
							<th>调用次数</th>
							<th>操作</th>
							</tr>
							<tr>
								<td>1</td>
								<td>周国强</td>
								<td>1000</td>
								<td></td>
							</tr>
				</table>
		  </div>
				
		</div>
	</div>
	

	<!-- 尾部 -->
	<footer>
		<div class="container ">

			<p class="center">php1505c微信开发小组</p>
		</div>
	</footer>

	<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./static/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./static/js/backend.js"></script>
</body>
</html>