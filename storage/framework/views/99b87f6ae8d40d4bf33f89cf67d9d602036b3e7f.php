<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="author" content="Dipto Arafat">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset('upload')); ?>/header.png" type="image/x-icon" />
    <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Trackseries|Movie Series</title>
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
                    <a class="nav-link" href="<?php echo e(route('user.home')); ?>"><i class="fas fa-home"></i>Home</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('tsrm.logout')); ?>"><i class="fas fa-sign-out-alt"></i>Log Out</a>
            </li>
        </ul>

    </nav>
    <br><br><br>
    <div class="msdashboard">
        <fieldset style='margin-left:10px;margin-top:10px;margin-right:10px;margin-bottom: 10px'>
            <img alt='MOVIE/SERIES PICTURE' class='followerimage' src='<?php echo e(asset('upload')); ?>/<?php echo e($msinfo->ms_picture); ?>'
                    width='500px'
                    height='250px' style='display: block'>
                    <br>
                    <h3><?php echo e($msinfo->ms_name); ?><h3>
                            <?php if($followflag == false): ?>
                            <input type='button' class='signbutton' id='<?php echo e($msinfo->ms_id); ?>' value='FOLLOW'
                                onclick='followms(this)'>
		                    <?php else: ?>
                            <input type='button' class='signbutton' id='<?php echo e($msinfo->ms_id); ?>' value='UNFOLLOW'
                                onclick='unfollowms(this)'>
                            <?php endif; ?>
    <?php                        
    
    $one = 0;
    $two = 0;
    $three = 0;
    $four = 0;
    $five = 0;
    $total = 0;

    if(count($msreview)>0){
    
    for($i = 0;$i<count($msreview);$i++){
        if($msreview[$i]->rating == '1'){
            $one++;
            $total += 1;
        }
        else if($msreview[$i]->rating == '2'){
            $two++;
            $total += 2;
        }
        else if($msreview[$i]->rating == '3'){
            $three++;
            $total += 3;
        }
        else if($msreview[$i]->rating == '4'){
            $four++;
            $total += 4;
        }
        else if($msreview[$i]->rating == '5'){
            $total += 5;
            $five++;
        }
    }
}
    if($total != 0){
    $round = round($total/count($msreview));}
    else{
        $round = 0;
    }
    ?>
                            <br>
                            <h3>Avg. Rating:

                                <?php for($j = 1;$j <= 5; $j++): ?>
                <?php if($j <= $round): ?>
                                <span class='fa fa-star' style='color:orange'></span>
                <?php else: ?>
                                <span class='fa fa-star' style='color:black'></span>
                <?php endif; ?>
            <?php endfor; ?>
                            </h3>
                            <h3>You Rated:
                                <?php 
            $myrating = 0;
            if($myreview){
            if($myreview->rating>0){
                $myrating = $myreview->rating;
            }
        }
        else{
            $myrating = 0;
        }
            ?>

            <?php for($intg = 1;$intg <= 5;$intg++): ?>
				<?php if($intg <= $myrating): ?>
                                <span class='fa fa-star' id='<?php echo e(Session::get('xuser')->user_id); ?>*<?php echo e($msinfo->ms_id); ?>*<?php echo e($intg); ?>'
                                    onclick='changeRating(this)' style='color:orange'></span>
                
				<?php else: ?>
                                <span class='fa fa-star' id='<?php echo e(Session::get('xuser')->user_id); ?>*<?php echo e($msinfo->ms_id); ?>*<?php echo e($intg); ?>'
                                    onclick='changeRating(this)' style='color:black'></span>
                <?php endif; ?>
			<?php endfor; ?>
                            </h3>
                            <h3>COMMENT</h3>
                            <textarea class='commenttextbox' type='text' name='comment' id='com'
                                placeholder='Post Your Thoughts Here...' tabindex='1' title='Please Share Your Thoughts'
                                autocomplete='off'></textarea>
                            <input type='button' style='margin-left: 110px;margin-bottom: 10px' class='signbutton'
                                id='<?php echo e($msinfo->ms_id); ?>' value='POST' onclick='updateReview(this)'>
                            </fieldset>
        </div>


        <div class="scrollable">
            <fieldset style='margin-left:30px;margin-right:30px;margin-top:20px;margin-bottom:20px'>
                <h4 style='font-weight:bold;font-family:cursive;text-align: center'>RATING<h4>
                        <div class="row">
                            <div class="side">
                                <div>5 star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div style='width:<?php if($total == 0){echo '0%';}else{ $ops = $five/$total; $ops = round($ops * 100); echo $ops.'%';} ?>;height: 18px; background-color: #4CAF50;'>
                                </div>
                            </div>
                        </div>
                        <div class="side right">
                            <div><?php echo e($five); ?></div>
                        </div>
                        <div class="side">
                            <div>4 star</div>
                        </div>
                        <div class="middle">
                            <div class="bar-container">
                                <div
                                    style='width:<?php if($total == 0){echo '0%';}else{ $ops = $four/$total; $ops = round($ops * 100); echo $ops.'%';} ?>; height: 18px; background-color: #2196F3;'>
                                </div>
                            </div>
                        </div>
                        <div class="side right">
                            <div><?php echo e($four); ?></div> </div> <div class="side">
                                        <div>3 star</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div style='width:<?php if($total == 0){echo '0%';}else{ $ops = $three/$total; $ops = round($ops * 100); echo $ops.'%';} ?>;height: 18px; background-color: #00bcd4;'>
                                </div>
                            </div>
                        </div>
                        <div class="side right">
                            <div><?php echo e($three); ?></div>
                        </div>
                        <div class="side">
                            <div>2 star</div>
                        </div>
                        <div class="middle">
                            <div class="bar-container">
                                <div
                                    style='width:<?php if($total == 0){echo '0%';}else{ $ops = $two/$total; $ops = round($ops * 100); echo $ops.'%';} ?>; height: 18px; background-color: #ff9800;'>
                                </div>
                            </div>
                        </div>
                        <div class="side right">
                            <div><?php echo e($two); ?></div> </div> <div class="side">
                                                <div>1 star</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div style='width:<?php if($total == 0){echo '0%';}else{ $ops = $one/$total; $ops = round($ops * 100); echo $ops.'%';} ?>; height: 18px; background-color: #f44336;'>
                                </div>
                            </div>
                        </div>
                        <div class="side right">
                            <div><?php echo e($one); ?></div>
                        </div>
                    </div>
        </fieldset>

        <fieldset style=' margin-left:30px;margin-right:30px;margin-top:20px;margin-bottom:20px;text-align:center'>
                                                        <h4 style='font-weight:bold;font-family:cursive'>TRAILER<h4>
                                                                <center>
                                                                    <div id="player"></div>
                                                                </center>
            </fieldset>

            <fieldset style='margin-left:30px;margin-right:30px;margin-top:20px;margin-bottom:20px;text-align:center'>
                <h4 style='font-weight:bold;font-family:cursive'>DETAILS<h4>
                        <table class="user_table" height="400" width="500" align="center">
                            <tr>
                                <td><b class="table_data">NAME</b></td>
                                <td><b class="table_data"><?php echo e($msinfo->ms_name); ?></b></td>
                            </tr>
                            <tr>
                                <td><b class="table_data">CATEGORY</b></td>
                                <td><b class="table_data"><?php echo e($msinfo->ms_cat); ?></b></td>
                            </tr>
                            <tr>
                                <td><b class="table_data">DIRECTOR</b></td>
                                <td><b class="table_data"><?php echo e($msinfo->ms_director); ?></b></td>
                            </tr>
                            <tr>
                                <td><b class="table_data">ACTOR</b></td>
                                <td><b class="table_data"><?php echo e($msinfo->ms_actor); ?></b></td>
                            </tr>
                            <tr>
                                <td><b class="table_data">ACTRESS</b></td>
                                <td><b class="table_data"><?php echo e($msinfo->ms_actress); ?></b></td>
                            </tr>
                            <tr>
                                <td><b class="table_data">RELEASE DATE</b></td>
                                <td><b class="table_data"><?php echo e($msinfo->ms_release_date); ?></b></td>
                            </tr>
                            <tr>
                                <td><b class="table_data">REGION</b></td>
                                <td><b class="table_data"><?php echo e($msinfo->ms_country); ?></b></td>
                            </tr>
                        </table>
            </fieldset>

            <fieldset style='margin-left:30px;margin-right:30px;margin-top:20px;margin-bottom:20px;text-align:center'>
                <h4 style='font-weight:bold;font-family:cursive'>REVIEWS(<?php echo e(count($pepreview)); ?>)</h4>
                <hr>
                <fieldset>
                    <table class='signup_table' height='400' width='500' align='center'>

                        <?php for($k=0;$k<count($pepreview);$k++): ?>
                        <tr>
                            <td style='text-align:left'><a href="/tsrm/userprof/<?php echo e($pepreview[$k]->user_id); ?>">
                                    <?php echo e($pepreview[$k]->fname); ?> <?php echo e($pepreview[$k]->lname); ?></a><br>
                                <?php for($ii = 1;$ii <= 5;$ii++): ?>
						<?php if($ii <= $pepreview[$k]->rating): ?>
                                <span class='fa fa-star' id='<?php echo e($ii); ?>' style='color:orange'></span>
                            
						<?php else: ?>
                                <span class='fa fa-star' id='<?php echo e($ii); ?>' style='color:black'></span>
                                
                        <?php endif; ?>
                        <?php endfor; ?>
                                <h4>Review Date:<?php echo e($pepreview[$k]->date); ?></h4>
                                <p><?php echo e($pepreview[$k]->comment); ?></p>
                                <hr width='100%'>
                            </td>
                        </tr>
                        <?php endfor; ?>

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
                height: 710px;
                position: relative;
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
            function unfollowms(v) {
                m = document.getElementById(v.id);
                $.ajax({
                    url: '/tsrm/ms/unfollowMS/' + v.id,
                    contentType: 'application/json',
                    
                    success: function (response) {
                        if (response == 'true') {
                            m.value = "FOLLOW";
                            m.setAttribute('onclick', 'followms(this)');
                        }
                    }
                });


            }
            function followms(v) {
                m = document.getElementById(v.id);
                $.ajax({
                    url: '/tsrm/ms/followMS/' + v.id,
                    contentType: 'application/json',
                    
                    success: function (response) {
                        if (response == 'true') {
                            m.value = "UNFOLLOW";
                            m.setAttribute('onclick', 'unfollowms(this)');
                        }
                    }
                });


            }
        
            function myFunction() {
                location.reload();
            }

        </script>

        <!--YOUTUBE SCRIPT-->
        <script>
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // 3. This function creates an <iframe> (and YouTube player) after the API code downloads.
            var player;
            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    height: '390',
                    width: '640',
                    videoId: '<?php echo e($msinfo->video_id); ?>',
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            }

            // 4. The API will call this function when the video player is ready.
            function onPlayerReady(event) {
                //event.target.playVideo();
            }

            // 5. The API calls this function when the player's state changes.The function indicates that when playing a video (state=1),the player should play for six seconds and then stop.
            var done = false;
            function onPlayerStateChange(event) {
                if (event.data == YT.PlayerState.PLAYING && !done) {
                    //setTimeout(stopVideo, 6000);
                    done = true;
                }
            }
            function stopVideo() {
                player.stopVideo();
            }
        </script>


        <script>
            //Change Rating
            function changeRating(v) {
                $.ajax({
                    url: '/tsrm/ms/changerating/' + v.id,
                    contentType: 'application/json',
                    success: function (response) {
                        if (response == 'true') {
                            myFunction();
                        }
                    }
                });

            }
        </script>

        <script>
            //Change Rating
            function updateReview(v) {
                var comment = document.getElementById('com').value;
                $.ajax({
                    url: '/tsrm/ms/changecomment/' + v.id +'/'+comment,
                    contentType: 'application/json',
                    success: function (response) {
                        if (response == 'true') {
                            myFunction();
                        }
                    }
                });

            }
        </script>

<?php /* F:\Spring 18-19\ATP 3\FINAL\Project V 29.4.19\resources\views/ms/msprof.blade.php */ ?>