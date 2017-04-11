<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
       <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
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

			<form action="{{url('login')}}" method="POST">

				<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="title m-b-md">
                    InfoAlerts
                	</div>                    

                    <div class="row">
                        <div class="input-field col s12">
                        <input id="email" type="email" class="validate {{$invalid}}" name="email">
                        <label for="email" data-error="{{$errorEmail}}">Email</label>
                        </div>
                    </div>  

					<div class="row">
                        <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password">
                        <label for="password">Password</label>
                        </div>
                    </div>


				<button class="btn waves-effect waves-light" type="submit" name="action">Login</button>



		  </form>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>

</body>
</html>