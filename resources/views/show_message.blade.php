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
           /* .announcement>a, .announcement>a>i {
                left: 37%;
                margin-right: 20px;
            }*/
/*            .announcement {
                margin-top: 1%;
            }*/
            .card {
                float: left;
                width: 49%;
                margin-right: 10px;
            }
            .announcementWrapper {
                margin-left: 13px;
            }

            .card-action>button{
                width: 100%;
                height: 100%;
                text-align: center;
                padding: 0;
                margin: 0;
            }

            h3 {
                margin-top: 20%;
            }
            h4 {

                margin-top: 5px;
            }
            .card-title {
                font-weight: bold;
            }
            .right {
                font-weight: small;
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

    <li><a href="{{url('client', $user_id)}}" class="tab waves-effect waves-orange hoverable"><i class="material-icons">home</i>Home</a></li>
    <li><a class="tab waves-effect waves-green md-inactive md-light"><i class="material-icons">message</i>Announcements</a></li>
    <li><a href="{{url('archive', $user_id)}}" class="tab waves-effect waves-yellow hoverable"><i class="material-icons">layers</i>Archives</a></li>
</ul>

<!-- main comtent -->
<main>   
    @if($new_count==0)
     <h3 class="center-align">
         {{$noNew}}
     </h3>
    @endif
  <div class="announcementWrapper">   
        @foreach($newAnnouncements as $ann)
        <form method="post" type="post" action="{{Action('UserController@send_response')}}">
          <div class="card blue-grey darken-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">{{$ann->title}}</span>
              <p>{{$ann->text}}</p>
              <span class="right">{{$ann->created_at}}</span>
            </div>
            <div class="card-action">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="user_id" value="{{$user_id}}">
                <input type="hidden" name="message_id" value="{{$ann->id}}">
                <input type="hidden" name="dep_id" value="{{$dep_id}}">

              <button class="btn-flat btn-medium waves-effect waves-green white-text" name="responce" value="read" type="submit"><i class="material-icons">check</i>   Mark As Read</button>


            </div>
          </div>
        </form>
        @endforeach
  </div>

</main>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
</body>
</html>