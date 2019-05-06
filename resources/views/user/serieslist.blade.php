<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="{{asset('upload')}}/header.png" type="image/x-icon" />

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
        background-color: #343A40;
    }
</style>


<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <b><a class="navbar-brand" href="{{route('tsrm.index')}}">TRACKSERIES</a></b>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('user.home')}}"><i class="fas fa-home"></i>Home <span class="sr-only">(current)</span></a>
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="viewprofile">View Profile</a>
          <a class="dropdown-item" href="editprofile">Edit Profile</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('tsrm.logout')}}"><i class="fas fa-sign-out-alt"></i>Log Out</a>
      </li>
    </ul>

  </nav>

  <div class="sidenav">
    <a href="{{route('user.track')}}"><i class="fas fa-thumbtack fa-sm"></i> Track</a>
    <a href="{{route('user.reviews')}}"><i class="fas fa-star-half-alt fa-sm"></i> Reviews</a>
    <a href="{{route('user.follower')}}"><i class="far fa-hand-point-right fa-sm"></i> Follower</a>
    <a href="{{route('user.following')}}"><i class="far fa-hand-point-left fa-sm"></i> Following</a>
    <a href="{{route('user.followedmovie')}}"><i class="fas fa-film"></i> Movies</a>
    <a href="{{route('user.followedseries')}}"><i class="fas fa-video fa-sm"></i> Series</a>  
  </div>

  <div class="main">
      
          <h4 style='text-align:center;color:white'>SERIES LIST</h4>
      
          <br>
        <table class="table table-dark table-striped table-borderless table-hover table-sm">
          <thead>
            <tr>
              <th scope="col">SERIAL</th>
              <th scope="col">NAME</th>
              <th scope="col">RELEASE DATE</th>
              <th scope="col">ACTION</th>
            </tr>
          </thead>
          @if($data)
            @for($a=0;$a<count($data);$a++)
            <tr>
                <td >{{$a+1}}</td>
                <td ><a href='{{route('tsrm.msprof',['id' => $data[$a]->ms_id])}}'>{{$data[$a]->ms_name}}</a></td>
                <td >{{$data[$a]->ms_release_date}}</td>
                <td ><a href="{{route('user.unfollowseries',['id' => $data[$a]->ms_id])}}" class="badge badge-secondary">UNFOLLOW</a></td>
              </tr>
@endfor
@endif
        </table>
  </div>


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