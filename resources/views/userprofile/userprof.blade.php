
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="author" content="Dipto Arafat">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('upload')}}/header.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Trackseries|User Profile</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <b><a class="navbar-brand" href="/tsrm">TRACKSERIES</a></b>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.home')}}"><i class="fas fa-home"></i>Home</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{route('tsrm.logout')}}"><i class="fas fa-sign-out-alt"></i>Log Out</a>
            </li>
        </ul>

    </nav>
    <br><br><br>
    <div class="msdashboard">
        <fieldset style='margin-left:10px;margin-top:10px;margin-right:10px;margin-bottom: 10px'>
            <img alt='USER PROFILE PICTURE' class='followerimage' src='{{asset('upload')}}/{{$userinfo->picture}}'
                    width='500px'
                    height='250px' style='display: block'>
                    <br>
                    <h3>{{$userinfo->fname}} {{$userinfo->lname}}<h3>
                        @if(Session::get('xuser')->user_id == $userinfo->user_id)

                        @elseif($followflag == false)
                        <input type='button' class='signbutton' id='{{$userinfo->user_id}}' value='FOLLOW'
                            onclick='followuser(this)'>
                        @else
                        <input type='button' class='signbutton' id='{{$userinfo->user_id}}' value='UNFOLLOW'
                            onclick='unfollowuser(this)'>
                        @endif
                    </fieldset>
        <fieldset style='margin-left:10px;margin-top:10px;margin-right:10px;margin-bottom: 10px'>
                <button type="button" class="btn btn-info btn-block" onclick="sectionfocusone()">Profile Info</button>
        
            <button type="button" class="btn btn-info btn-block" onclick="sectionfocustwo()">Posted Reviews</button>  
        </fieldset>              
        </div>


        <div class="scrollable">
        
            <fieldset id='sectionone' style='margin-left:30px;margin-right:30px;margin-top:20px;margin-bottom:20px;text-align:center'>
                <h4 style='font-weight:bold;font-family:cursive'>DETAILS<h4>
                        <table class="user_table" height="400" width="500" align="center">
                            <tr>
                                <td><b class="table_data">FIRST NAME</b></td>
                                <td><b class="table_data">{{$userinfo->fname}}</b></td>
                            </tr>
                            <tr>
                                <td><b class="table_data">SURNAME</b></td>
                                <td><b class="table_data">{{$userinfo->lname}}</b></td>
                            </tr>
                            <tr>
                                <td><b class="table_data">Mail ID</b></td>
                                <td><b class="table_data">{{$userinfo->mail}}</b></td>
                            </tr>
                            <tr>
                                <td><b class="table_data">GENDER</b></td>
                                <td><b class="table_data">{{$userinfo->gender}}</b></td>
                            </tr>
                            <tr>
                                <td><b class="table_data">DOB</b></td>
                                <td><b class="table_data">{{$userinfo->dob}}</b></td>
                            </tr>
                            <tr>
                                <td><b class="table_data">COUNTRY</b></td>
                                <td><b class="table_data">{{$userinfo->country}}</b></td>
                            </tr>
                        </table>
            </fieldset>

            <fieldset id='sectiontwo' style='margin-left:30px;margin-right:30px;margin-top:20px;margin-bottom:20px;text-align:center'>
                    <h4 style='font-weight:bold;font-family:cursive'>REVIEWS({{count($userreview)}})</h4>
                    <hr>
                    <fieldset>
                        <table class='signup_table' height='400' width='500' align='center'>
    
                            @for($k=0;$k<count($userreview);$k++)
                            <tr>
                                <td style='text-align:left'><a href="/tsrm/msprof/{{$userreview[$k]->ms_id}}">
                                        {{$userreview[$k]->ms_name}}</a><br>
                                    @for($ii = 1;$ii <= 5;$ii++)
                            @if($ii <= $userreview[$k]->rating)
                                    <span class='fa fa-star' id='{{$ii}}' style='color:orange'></span>
                                
                            @else
                                    <span class='fa fa-star' id='{{$ii}}' style='color:black'></span>
                                    
                            @endif
                            @endfor
                                    <h4>Review Date:{{$userreview[$k]->date}}</h4>
                                    <p>{{$userreview[$k]->comment}}</p>
                                    <hr width='100%'>
                                </td>
                            </tr>
                            @endfor
    
                        </table>
                    </fieldset>
    
                </fieldset>



        </div>

        <style>
            fieldset {
                background: white;
                border-radius: 15px;
                border-color: black;
                border-style: solid;
                position: center;
            }

            .commenttextbox {
                width: 100%;
                height: 150px;
                padding: 12px 20px;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 4px;
                background-color: #f8f8f8;
                font-size: 16px;
                resize: none;
                font-family: Georgia;
            }

            b {
                color: white;
                float: left;
                margin-left: 10px;
            }

            .table_data {
                color: black;
                float: center;
                margin-left: 10px;
            }

            td {
                text-align: center;
                font-weight: bold;
                font-family: cursive;
                font-size: 20px;
                padding: 5px;
            }

            h3 {
                text-align: center;
            }

            #navsearch input[type=search] {
                width: 530px !important;
            }

            .input-group-prepend {
                height: 38px !important;
            }

            #resdiv {
                position: absolute;
                width: 43%;
                background: white;
                max-height: 400px;
                overflow-y: auto;
                display: none;

                border: 1px solid gray;

                /*This is relative to the navbar now*/
                left: 5;
                right: 10;
                top: 55px;
            }




            .msdashboard {
                float: left;
                background-color: #343A40;
                width: 400px;
                height: 500px;
                position: fixed;
                border-color: 2px solid teal;
                margin-left: 15px;
                border-style: solid;
                border-radius: 10px;
            }

            .scrollable {
                float: right;
                background-color: #343A40;
                width: 65%;
                min-height: 100%;
                overflow-y: hidden;
                border-color: teal;
                border-style: solid;
                border-radius: 10px;
            }

            .signbutton {
                background-color: #000000;
                border: none;
                color: white;
                padding: 13px 40px;
                text-align: center;
                font-family: Georgia;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                cursor: pointer;
            }

            .user_table {
                border-collapse: collapse;
                padding: 5px;
                background-color: white;
                margin-left: 220px;
            }

            /* Three column layout */
            .side {
                text-align: center;
                width: 15%;
                margin-top: 10px;
            }

            .middle {
                margin-top: 10px;
                float: left;
                width: 70%;
            }

            /* Place text to the right */
            .right {
                text-align: center;
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* The bar container */
            .bar-container {
                width: 100%;
                background-color: #f1f1f1;
                text-align: center;
                color: white;
            }

            /* Responsive layout - make the columns stack on top of each other instead of next to each other */
            @media (max-width: 400px) {

                .side,
                .middle {
                    width: 100%;
                }

                .right {
                    display: none;
                }
            }

            img {
                display: inline-block;
                margin-left: auto;
                margin-right: auto;
                width: 30%;
                border-radius: 2px;
                vertical-align: top;
            }

            .followerimage {
                display: inline-block;
                margin-left: auto;
                margin-right: auto;
                width: 80%;
                border-radius: 2px;
                vertical-align: top;
            }

            .usereditprofile {
                float: left;
            }

            .content {
                display: none;
                margin-left: 50px;
                background-color: white;
            }
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>

            function sectionfocusone(){
                document.getElementById('sectionone').scrollIntoView();
            }

            function sectionfocustwo(){
                document.getElementById('sectiontwo').scrollIntoView();
            }

            function unfollowuser(v) {
                m = document.getElementById(v.id);
                $.ajax({
                    url: '/tsrm/profile/unfollowUser/' + v.id,
                    contentType: 'application/json',
                    
                    success: function (response) {
                        if (response == 'true') {
                            m.value = "FOLLOW";
                            m.setAttribute('onclick', 'followuser(this)');
                        }
                    }
                });


            }
            function followuser(v) {
                m = document.getElementById(v.id);
                $.ajax({
                    url: '/tsrm/profile/followUser/' + v.id,
                    contentType: 'application/json',
                    
                    success: function (response) {
                        if (response == 'true') {
                            m.value = "UNFOLLOW";
                            m.setAttribute('onclick', 'unfollowuser(this)');
                        }
                    }
                });


            }
</script>
