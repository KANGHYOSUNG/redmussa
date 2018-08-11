<html lang="ko" >
<head>
    <meta name="description" content="">
    <meta name="author" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
	<!--<meta name="viewport" content="width=640, target-densitydpi=device-dpi, user-scalable=no" >-->
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/import.css"  />

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script type="text/javascript" src="./js/html5shiv.js"></script>
	<![endif]-->

	<!--[if lt IE 8]>
	<script src="./js/IE8.js"></script>
	<![endif]-->

	<script src="assets/js/jquery.1.11.0.min.js"></script>

</head>
<body>
<!-- wrap : s -->
<div id="wrap">
<div class="userBox">
	<span>admin님이 로그인 했습니다.</span> <a href="logout_chk.php" target="_self" class="btnC">로그아웃</a>
</div>
<!--
<ul class="menu">
    <li><a href="main.php" target="_self">HOME</a></li>
    <li><a href="list.php" target="_self">당첨 좌석 관리</a></li>
    <li><a href="ctrl.php" target="_self">화면 제어</a></li>
</ul>
-->
<!-- content : s -->
    <div id="content">
    	<div class="tableList">
            <? foreach($table as $game => $seats) {?>
            <div class="btnCntL">
    			<a href="">저장</a>
    		</div>
            <div class="tableCnt">
        		<h3 class="tableNum"><?=$game?></h3>
        		<ul>
                    <? foreach($seats as $num => $seat) { ?>
        			<li><a href="" class="<?=($seat==1)?'on':''?>"><?=$num?></a></li>
                    <? } ?>
        		</ul>
        	</div>
         <? } ?>
    	</div>
    </div>
<!-- content : e -->
</div>
<!-- wrap : s -->
</body>
</html>
<script>

</script>
