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
            .query {
                margin:auto;
                margin-top: 2%;
                margin-left: 30px;
            }
            h4 {
                margin-top: 5px;
            }
            .head {
                margin-top: 100px;
                font-size: 2.28rem;
            }
            .responseWrapper {
                width:90%;
                margin: auto;
                margin-top: 20px;
            }
            table {
                width: 90%;
                margin: auto;
                margin-top: 25px;
            }
            .material-icons.redtomato {
                color:#f44336;
            }

            .material-icons.meangreen {
                color: #0cdd5f;
            }

            .collapsible-header{

                padding: 10px;
                background-color: darkgreen;
                color: white;
                font-weight: bold;
            }
            .divider {
                margin-top: 25px;
                margin-bottom: 15px;
            }
        
        </style>
</head>
<body>
<div class = 'row'>
    <div class = 'col s9'>
        <span class = "flow-text">
            <h4>Welcome {{$adminInfo->name}}!</h4>
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

    <li><a href="{{url('admin', $adminInfo->id)}}" class="tab waves-effect waves-orange hoverable"><i class="material-icons">home</i>Home</a></li>
    <li><a href="{{url('responseQuery', $adminInfo->id)}}" class="tab waves-effect waves-green hoverable"><i class="material-icons">message</i>Check Responses</a></li>
    <li><a href="{{url('registration_view',$adminInfo->id)}}" class="tab waves-effect waves-yellow hoverable"><i class="material-icons">add</i>Add Employee</a></li>
</ul>

<!-- main comtent -->
<main>

<div class="responseWrapper">
 
    <ul class="collapsible popout" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><h5>Announcement Title: {{$annInfo->title}}</h5></div>
      <div class="collapsible-body">
      <span>{{$annInfo->text}}</span>
      <div class="divider"></div>
      <span>Recepients: {{$depInfo->name}}</span>
      <span class="right">Announced Date: {{$annInfo->created_at}}</span>
      </div>
    </li>
    </ul>

    <table class="centered highlight bordered">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Read/Unread</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unreadUsers as $unreds)
            <tr>
                <th class="center-align">{{$unreds->name}}</th>
                <th class="center-align"><i class="material-icons redtomato">cancel</i>  Unread</th>
            </tr>
            @endforeach
            @foreach($readUsers as $reds)
            <tr>
                <th class="center-align">{{$reds->name}}</th>
                <th class="center-align"><i class="material-icons meangreen">check_circle</i>  Read</th>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    
</div>

</main>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
</body>
</html>