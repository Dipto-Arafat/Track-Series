<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="<?php echo e(asset('upload')); ?>/header.png" type="image/x-icon" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <title>TRACKSERIES|User Home</title>
</head>
<style>
  #navsearch input[type=search] {
    width: 500px !important;
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

  #filterdiv {
    position: absolute;
    width: 13.9%;
    background: white;
    height: 129px;
    overflow-y: auto;
    display: none;

    border: 1px solid gray;
    /*This is relative to the navbar now*/
    left: 5;
    right: 10;
    top: 55px;
  }




  .sidenav {
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 60px;
    left: 5px;
    background: #343A40;
    overflow-x: hidden;
    padding: 2px 0;
    border: 1px solid white;
  }

  .sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 19px;
    color: white;
    display: block;
    border: 2px solid white;
    margin: 0px 1px;
  }

  .dropdown-btn {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 19px;
    color: white;
    display: block;
    border: 2px solid white;
    margin: 0px 1px;
    background-color: #343A40;
    text-align: left;
    width: 99%;
  }

  .sidenav a:hover,
  .dropdown-btn:hover {
    color: #cecece;
  }

  .dropdown-container {
    display: none;
    background-color: #262626;
  }

  /* Optional: Style the caret down icon */
  .fa-caret-down {
    float: right;
    padding-right: 1px;
  }

  .main {
        margin-left: 300px;
        /* Same width as the sidebar + left position in px */
        font-size: 28px;
        /* Increased text to enable scrolling */
        padding: 0px 10px;
        margin-top: 70px;
        margin-right: 10px;
        text-align: center;
        white-space: nowrap;
        background-color: #343A40;
    }
</style>


<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <b><a class="navbar-brand" href="<?php echo e(route('tsrm.index')); ?>">TRACKSERIES</a></b>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('user.home')); ?>"><i class="fas fa-home"></i>Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline mx-auto" id="navsearch">


        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1" title="Click To Filter Your Search"><i
              class="fas fa-filter fa-lg"></i></span>
        </div>

        <div class='filteringdiv form-group' id='filterdiv'>
          <select class="form-control col-md-13" id="sel1" name="sellist1">
            <option value='sany'>Search By Anything</option>
            <option value='suser'>Search User</option>
            <option value='smovies'>Search Movie</option>
            <option value='sseries'>Search Series</option>
          </select>

        </div>

        <input id='create-input' class="form-control mr-sm-2" type="search" placeholder="Search Anything"
          aria-label="Search">
        <div class='resultdiv' id='resdiv'></div>
      </form>
    </div>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo e(route('user.viewprofile')); ?>">View Profile</a>
          <a class="dropdown-item" href="<?php echo e(route('user.editprofile')); ?>">Edit Profile</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('tsrm.logout')); ?>"><i class="fas fa-sign-out-alt"></i>Log Out</a>
      </li>
    </ul>

  </nav>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SIGN UP MESSAGES</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p id='supmsg'>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


  <div class="sidenav">
      <a href="#about"><i class="fas fa-thumbtack fa-sm"></i> Track</a>
      <a href="reviews"><i class="fas fa-star-half-alt fa-sm"></i> Reviews</a>
      <a href="follower"><i class="far fa-hand-point-right fa-sm"></i> Follower</a>
      <a href="following"><i class="far fa-hand-point-left fa-sm"></i> Following</a>
      <a href="followedmovie"><i class="fas fa-film"></i> Movies</a>
      <a href="followedseries"><i class="fas fa-video fa-sm"></i> Series</a>  
    </div>
  

    <div class="main">
        <div style="display: inline-block;margin-top:10px">
            <h1 style='color: aliceblue'>EDIT PROFILE</h1>
            <br>
            <img id="output" src="<?php echo e(asset('upload')); ?>/<?php echo e($userinfo->picture); ?>" alt="PROFILE PICTURE" width="300" height="250"><br>

            <form method='post' enctype="multipart/form-data" action="/tsrm/user/profilepicture">
                <?php echo e(csrf_field()); ?>

                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="filename">
                    <label class="custom-file-label" for="customFile">Choose Photo</label>
                </div><br>
                <button type="submit" class="btn btn-primary btn-lg">SAVE</button>
            </form>
            <br>
            <fieldset style='border: 1px solid black;padding: 10px'>
                <form style='padding:5px' method='post' action='/tsrm/user/editprofile'>
                    <?php echo e(csrf_field()); ?>

                    <h3 syle='display:inline-block'>NAME</h3>
                    <div class="form-row">
                        <div class="col-6">
                            <h3> FIRST NAME</h3>
                            <input type="text" class="form-control" placeholder="FIRST NAME" value='<?php echo e($userinfo->fname); ?>' name='fname'>
                        </div>
                        <div class="col-6">
                            <h3> SURNAME</h3>
                            <input type="text" class="form-control" placeholder="SURNAME" value='<?php echo e($userinfo->lname); ?>' name='lname'>
                        </div>
                    </div>
                    <h3> PASSWORD</h3>
                    <div class="form-row">
                        <div class="col-12">
                            <input type="password" class="form-control" placeholder="PASSWORD" name='pass' value='<?php echo e(Session::get('xpass')); ?>'>
                        </div>
                    </div>



                    <h3>GENDER</h3>

                    <div class='form-row'>
                        <div class='col-4'>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="radio" class="custom-control-input" value='Male' <?php if($userinfo->gender == 'Male'): ?>
<?php echo e('checked'); ?> <?php endif; ?>
              >
                                <label class="custom-control-label" for="customRadioInline1">
                                    <h5>Male</h5>
                                </label>
                            </div>
                        </div>
                        <div class='col-4'>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="radio" class="custom-control-input" value='Female' <?php if($userinfo->gender == 'Female'): ?>
                                    <?php echo e('checked'); ?>

                                    <?php endif; ?>            >
                                <label class="custom-control-label" for="customRadioInline2">
                                    <h5>Female</h5>
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline3" name="radio" class="custom-control-input" value='Others' <?php if($userinfo->gender == 'Others'): ?>
                                    <?php echo e('checked'); ?>

                                    <?php endif; ?>    >
                                <label class="custom-control-label" for="customRadioInline3">
                                    <h5>Others</h5>
                                </label>
                            </div>
                        </div>
                    </div>



                    <h3> BIRTHDAY</h3>
                    <div class="form-row">
                        <div class="col-4">
                            <h3> DAY</h3>
                            <?php $res = explode("/",$userinfo->dob); ?>
                            <input type="text" class="form-control" placeholder="DAY" value='<?php if(count($res)>=3): ?><?php echo e($res['0']); ?><?php endif; ?>' name='day'>
                        </div>
                        <div class="col-4">
                            <h3> MONTH</h3>
                            <input type="text" class="form-control" placeholder="MONTH" value='<?php if(count($res)>=3): ?><?php echo e($res['1']); ?><?php endif; ?>' name='month'>
                        </div>
                        <div class="col-4">
                            <h3>YEAR</h3>
                            <input type="text" class="form-control" placeholder="YEAR" value='<?php if(count($res)>=3): ?><?php echo e($res['2']); ?><?php endif; ?>' name='year'>
                        </div>
                    </div>

                    <h3>COUNTRY</h3>
                    <div class="form-row">
                        <div class="col-12">
                            <input type="text" class="form-control" placeholder="COUNTRY" value='<?php echo e($userinfo->country); ?>' name='country'>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col-12'>
                            <button type="submit" class="btn btn-primary btn-lg">UPDATE</button>
                        </div>
                    </div>

                </form>

            </fieldset>


        </div>
        
        <?php if(count($errors)>0): ?>
				<?php 	$lol = '';		?>	
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php	$lol = $message;  ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<input type="hidden" id="custId" name="custId" value="<?php echo e($lol); ?>">
		<?php endif; ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>


<script>

  $(document).ready(function () {

    $('#create-input').keyup(function () {
      document.getElementById('resdiv').style.display = "block";
      var text = $(this).val().toLowerCase();
      if (text == "") { text = 1; }
      var filteringCode = $("#sel1").val();
      if (filteringCode == 'sany') {
        filteringCode = 1;
      }
      else if (filteringCode == 'suser') {
        filteringCode = 2;
      }
      else if (filteringCode == 'smovies') {
        filteringCode = 3;
      }
      else {
        filteringCode = 4;
      }
      $.ajax({
        url: '/tsrm/livesearch/' + text + "/" + filteringCode,
        contentType: 'application/json',
        success: function (response) {
          
          $(".resultdiv").html('');
          $(".resultdiv").append("<h6>SEARCH RESULT</h6>");
/*
          if (!Array.isArray(response.data) || !response.data.length) {
            $(".resultdiv").append("<h5>NO RESULTS FOUND</h5>");
          }
*/
          if(response.rflag == '1'){
            $(".resultdiv").append("<h6>USER</h6>");
            response.userdata.forEach(function (data) {
            $(".resultdiv").append("<a href='/tsrm/userprof/" + data.user_id + "'>" +data.fname+' '+data.lname + "</a><br>");
            
          });

          $(".resultdiv").append("<h6>MOVIE SERIES</h6>");
          response.msdata.forEach(function (data) {
            $(".resultdiv").append("<a href='/tsrm/msprof/" + data.ms_id + "'>" + data.ms_name + "</a><br>");
            
          });
          }
          if(response.rflag == '2'){
            $(".resultdiv").append("<h6>USER</h6>");
            response.userdata.forEach(function (data) {
            $(".resultdiv").append("<a href='/tsrm/userprof/" + data.user_id + "'>" +data.fname+' '+data.lname + "</a><br>");
          });
          }

          if(response.rflag == '3'){
            $(".resultdiv").append("<h6>MOVIES</h6>");
          response.msdata.forEach(function (data) {
            $(".resultdiv").append("<a href='/tsrm/msprof/" + data.ms_id + "'>" + data.ms_name + "</a><br>");
            
          });   
          }

          if(response.rflag == '4'){
            $(".resultdiv").append("<h6>SERIES</h6>");
          response.msdata.forEach(function (data) {
            $(".resultdiv").append("<a href='/tsrm/msprof/" + data.ms_id + "'>" + data.ms_name + "</a><br>");
            
          });   
          }

        }
      });
    });

  });


  $(document).mouseup(function (e) {
    var container = $(".resultdiv");
    var filtercontainer = $(".filteringdiv");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      container.hide();
    }


    if (!filtercontainer.is(e.target) && filtercontainer.has(e.target).length === 0) {
      filtercontainer.hide();
    }
  });





  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }


  $(".input-group-prepend").click(function () {
    document.getElementById('filterdiv').style.display = 'block';
  });



  $('#sel1').on('change', function () {
    if ($(this).val() == 'sany') {
      $("#create-input").attr("placeholder", "Search Anything");
    }
    else if ($(this).val() == 'suser') {
      $("#create-input").attr("placeholder", "Search User");
    }
    else if ($(this).val() == 'smovies') {
      $("#create-input").attr("placeholder", "Search Movies");
    }
    else {
      $("#create-input").attr("placeholder", "Search Series");
    }
    $("#filterdiv").hide();
  });


</script>

<script>
    $(document).ready(function () {
        if ($("#custId").length) {
            $("#supmsg").html($("#custId").val());
            $("#myModal").modal();
        }
        else { }
    });
</script>

<script type="application/javascript">
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);

        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    });
</script>

<?php /* F:\Spring 18-19\ATP 3\FINAL\Project\Dipto\Project V 29.4.19\resources\views/user/editprofile.blade.php */ ?>