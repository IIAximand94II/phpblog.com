<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>PHP Blog</title>
	<meta name="description" content="Responsive Html5 Css3 Templates">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="/public/css/zerogrid.css">
	<link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/responsive.css">
    <link rel="stylesheet" href="/public/css/mystyle.css">
	<link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
	<link href='/public/img/favicon.ico' rel='icon' type='image/x-icon'/>

    <script src="/public/js/html5.js"></script>
    <script src="/public/js/css3-mediaqueries.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
<div class="wrap-body zerogrid">
<!--------------Header--------------->
<?php require('includes/header.php')?>

<!--------------Content--------------->
<?php print_r($_SESSION);?>
<section id="content">
	<div class="wrap-content">
		<div class="row block">
			<div id="main-content" class="col-2-3">
				<div class="wrap-col">

                    <?=$content?>

				</div>
			</div>
			<div id="sidebar" class="col-1-3">
				<div class="wrap-col">
					<div class="box">
						<div class="heading"><h2>Categories</h2></div>
						<div class="content">
							<ul>
                                <?php new \app\lib\Menu();?>
							</ul>
						</div>
					</div>
					<div class="box">
						<div class="heading"><h2>Popular Post</h2></div>
						<div class="content">
                            <?php new \app\lib\TopPosts();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--------------Footer--------------->
<?php require('includes/footer.php')?>
</div>

<?php foreach($scripts as $script){
    echo $script;
}?>
</body>
</html>