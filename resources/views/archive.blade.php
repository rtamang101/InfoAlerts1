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
            .archiveWrapper {
                margin: auto;
                margin-top: 60px;
                width: 80%;
            }
            h4 {

                margin-top: 5px;
            }
            .unreadHead {
                background-color: #ee0a1c;
                color: black;
                font-weight: bold
            }
            .unreadBody{
               /* background-color: tomato;*/
                color: black;
                font-weight: bold

            }
            .readHead {
                background-color: #5be05b;
                color: black;
                font-weight: bold;
            }
            .readBody {
                /*background-color: lightgreen;*/
                color: black;
                font-weight: bold;
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

    <li><a href="{{url('client', $id)}}" class="tab waves-effect waves-orange hoverable"><i class="material-icons">home</i>Home</a></li>
    <li><a href="{{url('get_message/'.$dep_id.'/'.$id)}}" class="tab waves-effect waves-green hoverable"><i class="material-icons">message</i><span class="{{$badgeName}}">{{$status}}</span>
    Announcements</a></li>
    <li><a class="tab waves-effect md-light md-inactive"><i class="material-icons">layers</i>Archives</a></li>
</ul>

<!-- main comtent -->
<main>   
 <div class="archiveWrapper">
     <ul class="collapsible popout" data-collapsible="accordion">
         @foreach($unread as $unreds)
         <li>
            <div class="collapsible-header unreadHead"><i class="material-icons md-light">cancel</i>{{$unreds->title}}</div>
            <div class="collapsible-body unreadBody"><span>{{$unreds->text}}</span></div>
         </li>
         @endforeach
         @foreach($read as $reds)
         <li>
            <div class="collapsible-header readHead"><i class="material-icons md-light">check_circle</i>{{$reds->title}}</div>
            <div class="collapsible-body readBody"><span>{{$reds->text}}</span></div>
         </li>
         @endforeach
     </ul>


 </div>

</main>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
</body>
</html>