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
	<title>Trackseries|Log In</title>
</head>
<style>
	body {
		margin: 0;
		padding: 0;
		font-family: sans-serif;
		background: url({{asset('upload')}}/second.jpg);
		background-size: cover;
	}

	.box {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 400px;
		padding: 40px;
		background: rgba(0, 0, 0, 0.8);
		box-sizing: border-box;
		box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
		border-radius: 10px;
	}

	.box h2 {
		margin: 0 0 30px;
		padding: 0;
		color: #fff;
		text-align: center;
	}

	.box .inputBox {
		position: relative;
	}

	.box .inputBox input {
		width: 100%;
		padding: 10px, 0;
		font-size: 15px;
		color: #fff;
		margin-bottom: 30px;
		border: none;
		border-bottom: 1px solid #fff;
		outline: none;
		background: transparent;
	}

	.box .inputBox label {
		position: absolute;
		top: 0;
		left: 0;
		padding: 10px, 0;
		font-size: 15 px;
		color: #fff;
		pointer-events: none;
		transition: 0.5s;
	}

	.box .inputBox input:focus~label,
	.box .inputBox input:valid~label {
		top: -18px;
		left: 0;
		color: #03a9f4;
		font-size: 11px;
	}

	.box .inputBox input:focus,
	.box .inputBox input:valid {
		border-bottom: 1px solid #03a9f4;
	}

	.forget_pass {
		font-family: Georgia;
		font-size: 18px;
		color: white;
	}
</style>

<body>


	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<b><a class="navbar-brand" href="{{route('tsrm.index')}}">TRACKSERIES</a></b>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a style="border: 1px solid" class="nav-link mr-1" href="#"><i class="fas fa-sign-in-alt"></i>Log In<span
							class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a style="border: 1px solid" class="nav-link mr-1" href="{{route('tsrm.signup')}}"><i class="fas fa-user-plus"></i>Sign Up</a>
				</li>
			</ul>
		</div>
	</nav>

	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">LOG IN MESSAGES</h4>
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

	<!--Sign In Page-->
	<div class='box'>
		<h2>LOG IN</h2>
		<form method='post'>
			{{csrf_field()}}
			<div class='inputBox'>
				<input type="text" name="mail" id="mail" tabindex="1" required title="Please Enter Your Registered Mail Address"
					autocomplete="off">
				<label>Email</label>
			</div>
			<div class='inputBox'>
				<input type="password" name="pass" id="pass" tabindex="2" required maxlength="26"
					title="Please Enter Your Password">
				<label>Password</label>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-light center-block" tabindex="3" name="login"><i
						class="fas fa-sign-in-alt"></i>LOG
					IN</button>
			</div> <br>
			<div class="text-center">
				<a href="/tsrm/forgetpass" class="forget_pass" title="Reset Password">Forget Password?</a>
			</div>

			@if(count($errors)>0)
				@php 	$lol = '';		@endphp	
				@foreach($errors->all() as $message)
					@php	$lol = $message;  @endphp
				@endforeach
				<input type="hidden" id="custId" name="custId" value="{{$lol}}">
			@endif

			@if(Session::has('msg'))
				<input type="hidden" id="custId" name="custId" value="{{ Session::get('msg')}}">
			@endisset

		</form>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
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
		if ($("#custId").length) {
			$("#supmsg").html($("#custId").val());
			$("#myModal").modal();
		}
		else { }
	});

</script>

