<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- <link href="css/style.css" rel='stylesheet' type='text/css'> -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<script src="public/js/func.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .control-group {
            	margin-top: 20px;
            	
            }
        </style>
</head>
<body>
<div class="flex-center position-ref full-height">
	<!-- <div class="row">
		<div class="col-md-6"> -->

			<form class="form-horizontal" action="login" method="POST">

				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<fieldset>
					<!-- <div id="legend">
						<legend class="">Login Page</legend>
					</div> -->
					<div class="title m-b-md">
                    InfoAlerts
                	</div>
					<div class="control-group">
						<label class="control-label" for="email">E-mail</label>
						<div class="controls">
							<input type="email"  name="email" placeholder="john@smith.com" class="form-control input-lg">
							<!-- <p class="help-block">Please provide your E-mail</p> -->
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input type="password" id="password" name="password" placeholder="password" class="form-control input-lg">
							<!-- <p class="help-block">Password should be at least 6 characters</p> -->
						</div>
					</div>

					<div class="control-group">
						<!-- Button -->
						<div class="controls">
							<button class="btn btn-success" type="submit">Login</button>
						</div>
					</div>

				</fieldset>
			</form>

	<!-- 	</div>
	</div> -->
</div>


</body>
</html>











