<!DOCTYPE html>
<html lang="en">
<head>
    <title>InfoAlerts</title>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
      
        <!-- Styles -->
        <style>
            html, body {
   
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
             
            }

            .side-nav li>a{
                margin: 10px 0px 0px 0px;
                width: 100%;
                color:whitesmoke;
            }
            .side-nav li>a>i.material-icons {
                color: whitesmoke;
            }

            .side-nav {
                background-color: grey;
                margin-top: 4%;
            }
            main, header, footer{
                padding-left: 300px;
            }
            main {
                flex: 1 0 auto;
            }
            @media only screen and (max-width : 992px){
                header, main, footer {
                    padding: 0;
                }
            }
            .announcement>a, .announcement>a>i {
                left: 37%;
                margin-right: 20px;
            }
            .announcement {
                margin-top: 1%;
            }
            h3 {
                margin-top: 20%;
            }
            h4 {

                margin-top: 5px;
            }
        </style>
</head>
<body>
<div class = 'row'>
    <div class = 'col s9'>
        <span class = "flow-text">
            <h4>Welcome {{$name}}!</h4>
        </span>
    </div>
    <div class="col s3">
        <span class="flow-text">
            <h4 class="right-align btnLogout"><a href="{{url('logout')}}" class="btn-floating btn-xsm waves-effect waves-light red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Logout"><i class="material-icons">block</i></a>     InfoAlerts</h4>
        </span>
    </div>
</div>
<!-- side nav -->
<ul class="side-nav fixed">

    <li><a class="tab waves-effect waves-light"><i class="material-icons md-light md-inactive">home</i>Home</a></li>
    <li><a href="{{url('responseQuery', $id)}}" class="tab waves-effect waves-green hoverable"><i class="material-icons">message</i>Check Responses</a></li>
    <li><a href="{{url('registration_view', $id)}}" class="tab waves-effect waves-yellow hoverable"><i class="material-icons">add</i>Add Employee</a></li>
</ul>

<!-- main comtent -->
<main>   
   <h3 class="center-align">Welcome to the Admin Page!</h3>
   <div class="announcement">
       <a href="{{url('responseQuery', $id)}}" class="btn-floating btn-large waves-effect waves-light blue tooltipped" data-position="left" data-delay="50" data-tooltip="Check Responses"><i class="material-icons">message</i></a>
       <a href="{{url('publish', $id)}}" class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Make A Announcement"><i class="material-icons">publish</i></a>
       <a href="{{url('registration_view', $id)}}" class="btn-floating btn-large waves-effect waves-light green tooltipped" data-position="right" data-delay="50" data-tooltip="Add Employee"><i class="material-icons">add</i></a>
   </div>
</main>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
</body>
</html>

