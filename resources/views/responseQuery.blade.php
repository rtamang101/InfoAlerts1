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
            h3 {
                margin-top: 20%;
            }
            h4 {
                margin-top: 5px;
            }
            .head {
                margin-top: 100px;
                font-size: 2.28rem;
            }
        
        </style>
</head>
<body>
<div class = 'row'>
    <div class = 'col s9'>
        <span class = "flow-text">
            <h4>Welcome {{$user->name}}!</h4>
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

    <li><a href="{{url('admin', $user->id)}}" class="tab waves-effect waves-orange hoverable"><i class="material-icons">home</i>Home</a></li>
    <li><a class="tab waves-effect md-light md-inactive"><i class="material-icons">message</i>Check Responses</a></li>
    <li><a href="{{url('registration_view', $user->id)}}" class="tab waves-effect waves-yellow hoverable"><i class="material-icons">add</i>Add Employee</a></li>
</ul>

<!-- main comtent -->
<main>
    <div class="head center-align">
        <p>Please Pick an Announcement to sort responses.</p>
    </div>
    <div class="query"> 
    
     <div class="row">
        <form class="col s12" type="get" method="get" action="{{url('response', $user->id)}}">
            <div class="row">
                <div class="input-field col s4 push-s3">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <select id="sel1" name="id">
                      <option value="" disabled selected>Choose an Announcement</option>
                     @foreach($announcement as $ann)
                        <option value="{{$ann->id}}">{{$ann->title}}</option>
                     @endforeach
                    </select>
                    <label>Announcement</label>
                </div>
            </div>    
            <div class="row">    
                <div class="input-field col s2 push-s3">
                    <button class="btn waves-effect waves-light" name="action">Go
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>

</main>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('select').material_select();

    });

        
</script>
<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
</body>
</html>