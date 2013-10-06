<?php

	require_once( './richard/functions.php' );
	$projects = new Projects('richard');

?>
<!DOCtype html>
<html lang="EN" ng-app>
<head>
	<title>Richards Public Html Folder</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="<?php echo $projects->css_url;?>/style.css" media="all" />
	<script src="<?php echo $projects->js_url;?>/angular.js"></script>
	<script src="<?php echo $projects->js_url;?>/app.js"></script>
</head>
	<body ng-controller="projects">
		<div class="wrap">
		
			<ul class="project-list">
				<li ng-repeat="project in projects">
					<a href="{{project.url}}">{{project.name}}</a>
				</li>
			</ul>

		</div>
	</body>
</html>