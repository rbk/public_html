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
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo $projects->css_url;?>/style.css" media="all" />
	<script src="<?php echo $projects->js_url; ?>/jquery.js"></script>
	<script src="<?php echo $projects->js_url; ?>/angular.js"></script>
	<script src="<?php echo $projects->js_url; ?>/app.js"></script>
</head>
	<body ng-controller="projects">
		<div class="wrap">
			<form><input type="text" autofocus ng-model="query"></form><br/>
			<ul class="project-list">
				<li class="project animated" ng-repeat="project in projects | filter:query">
					<a target="_blank" class="highlight-{{project.highlight}}" href="{{project.url}}">{{project.name}}</a>
				</li>
			</ul>
		</div>
		<footer>
			<small>2015 <a href="http://richardkeller.net" target="_blank">richardkeller.net</a></small>
		</footer>
	</body>
</html>
