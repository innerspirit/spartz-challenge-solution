<html>
	<head>
		<title>API website</title>
	</head>
	<body>
		<h1>API v1</h1>

		<p>This is the front end for the API. To access the API, make an HTTP REST request to one of the urls:</p>
		<ul>
			<li>/v1/states/{state}/cities</li>
			<li>/v1/states/{state}/cities/{city}</li>
			<li>/v1/users/{user}/visits</li>
		</ul>

		<p>
			For example, you may want to try:
		</p>
		<ul>
			<li><a href="/v1/states/NY/cities">/v1/states/NY/cities</a></li>
			<li><a href="/v1/states/NY/cities/New%20York">/v1/states/NY/cities/New York</a></li>
			<li><a href="/v1/users/1/visits">/v1/users/1/visits</a></li>
		</ul>
	</body>
</html>
