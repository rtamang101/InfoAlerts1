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

            h3 {
                margin-top: 20%;
            }
            .modal {
                display: block;
                margin-top: 15%;
                color: skyblue;
                position: relative;
                width: 80%
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

    <li><a href="{{url('admin', $id)}}" class="tab waves-effect waves-orange hoverable"><i class="material-icons">home</i>Home</a></li>
    <li><a href="get_messages" class="tab waves-effect waves-green hoverable"><i class="material-icons">message</i>Check Responses</a></li>
    <li><a href="{{url('registration_view', $id)}}" class="tab waves-effect waves-yellow hoverable"><i class="material-icons">add</i>Add Employee</a></li>
</ul>

<!-- main comtent -->
<main>


        <!-- Modal Trigger -->
        <!-- <a class="waves-effect waves-light btn" href="#modal1">Modal</a> -->

        <!-- Modal Structure -->
        <div id="modal1" class="modal center-align">
            <div class="modal-content">
                <h4>{{$modalAction}}</h4>
                <p>{{$success}}</p>
            </div>
            <div class="modal-footer">
                <a href="{{$url_announcement}}" class="modal-action modal-close waves-effect waves-green btn-flat">{{$btn1}}</a>
                <a href="{{$url_home}}" class="modal-action modal-close waves-effect waves-green btn-flat">{{$btn2}}</a>
            </div>
        </div>


</main>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('.modal').modal('open');
    });
        
</script>
<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
</body>
</html>