<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Lỗi 404!</title>
	<link href="<?= BASE_URL ?>public/assets/images/favicon.png" rel="Shortcut Icon">
	<link href="<?= BASE_URL ?>public/assets/css/404.css" rel="stylesheet" type="text/css">
	<script src="<?= BASE_URL ?>public/assets/js/jquery.min.js"></script>
	<script type="text/javascript">
		$(function() {
			var h = $(window).height();
			$('body').height(h);
			$('.mianBox').height(h);
			centerWindow(".tipInfo");
		});

		//2.将盒子方法放入这个方，方便法统一调用
		function centerWindow(a) {
			center(a);
			//自适应窗口
			$(window).bind('scroll resize',
				function() {
					center(a);
				});
		}

		//1.居中方法，传入需要剧中的标签
		function center(a) {
			var wWidth = $(window).width();
			var wHeight = $(window).height();
			var boxWidth = $(a).width();
			var boxHeight = $(a).height();
			var scrollTop = $(window).scrollTop();
			var scrollLeft = $(window).scrollLeft();
			var top = scrollTop + (wHeight - boxHeight) / 2;
			var left = scrollLeft + (wWidth - boxWidth) / 2;
			$(a).css({
				"top": top,
				"left": left
			});
		}
	</script>

</head>

<body style="height: 754px;">
	<div class="mianBox" style="height: 754px;">
		<img src="<?= BASE_URL ?>public/assets/images/yun0.png" alt="" class="yun yun0">
		<img src="<?= BASE_URL ?>public/assets/images/yun1.png" alt="" class="yun yun1">
		<img src="<?= BASE_URL ?>public/assets/images/yun2.png" alt="" class="yun yun2">
		<img src="<?= BASE_URL ?>public/assets/images/bird.png" alt="" class="bird">
		<img src="<?= BASE_URL ?>public/assets/images/san.png" alt="" class="san">
		<div class="tipInfo" style="top: 102.5px; left: 579.5px;">
			<div class="in">
				<div class="textThis">
					<h2>Lỗi 404！</h2>
					<p>
						<a href="<?= BASE_URL ?>">Trang chủ</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="<?= BASE_URL . 'lien-he' ?>">Liên hệ</a>
					</p>

				</div>
			</div>
		</div>
	</div>



</body>

</html>