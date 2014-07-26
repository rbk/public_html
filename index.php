<?php

	require_once( './index/functions.php' );
	$projects = new Projects('index');
	// if( isset($_GET['refresh']) ){
		$projects->rewrite_json_file();
	// }

?>
<!DOCtype html>
<html lang="EN" ng-app>
<head>
	<title>Public Html Folder</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="<?php echo $projects->css_url;?>/style.css" media="all" />
	<script src="<?php echo $projects->js_url; ?>/angular.js"></script>
	<script src="<?php echo $projects->js_url; ?>/app.js"></script>
</head>
	<body ng-controller="projects">
		<div class="wrap">
			<form><input type="text" ng-model="query"></form><br/>


			<ul class="project-list">
				<li class="flipInX animated"><a href="http://localhost:3000">localhost:3000</a></li>
				<li class="flipInX animated" ng-repeat="project in projects | filter:query">
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
