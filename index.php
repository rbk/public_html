<?php

	require_once( './richard/functions.php' );
	$projects = new Projects('richard');
	if( $_GET['refresh'] ){
		$projects->rewrite_json_file();
	}

?>
<!DOCtype html>
<html lang="EN" ng-app>
<head>
	<title>Richards Public Html Folder</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="<?php echo $projects->css_url;?>/style.css" media="all" />
	<script src="<?php echo $projects->js_url; ?>/angular.js"></script>
	<script src="<?php echo $projects->js_url; ?>/app.js"></script>
	<style>
		body {
			background: url( <?php echo $projects->images_dir; ?>/backgrounds/fundo.png );
			/*background-size: cover;*/
		}
	</style>
</head>
	<body ng-controller="projects">
		<div class="wrap">
			<form><input type="text" placeholder="SEARCH" ng-model="query"></form><br/>


			<ul class="project-list">
				<li ng-repeat="project in projects | filter:query">
					<!-- <span class="" ng-model="importance"></span> -->
					<!-- <a href="" class="subtract" ng-click="minusOne($index)">-</a> -->
					<a class="highlight-{{project.highlight}}" href="{{project.url}}">{{project.name}}</a>
				</li>
			</ul>
			<br/>
			<nav>
				<!-- <a href="#" class="mode button" ng-model="mode" ng-click="toggleEditMode()">{{modeText}}</a> -->
				<?php //echo '<a href="'. $project->path. '?refresh=true" class="button">Reset</a>'; ?>
			</nav>

		</div>
	</body>
</html>
