<!doctype html>
<html lang="en">

<head></head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="icon" href="<?php echo e(asset('upload')); ?>/header.png" type="image/x-icon" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
	integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<title>Trackseries|Sign Up</title>
</head>
<style>
	body {
		margin: 0;
		padding: 0;
		font-family: sans-serif;
		background: url(<?php echo e(asset('upload')); ?>/second.jpg);
		background-size: cover;
	}

	.box {
		position: absolute;
		top: 55%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 400px;
		height: 600px;
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
		top: 0;
		left: 0;
		padding: 5px, 0;
		font-size: 15 px;
		color: #fff;
		pointer-events: none;
		transition: 0.5s;
	}

	.box .inputBox input:focus,
	.box .inputBox input:valid {
		border-bottom: 1px solid #03a9f4;
	}

	.box .inputBox input:invalid {
		border-bottom: 1px solid red;
	}

	#error {
		color: red;
	}
</style>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<b><a class="navbar-brand" href="<?php echo e(route('tsrm.index')); ?>">TRACKSERIES</a></b>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a style="border: 1px solid" class="nav-link mr-1" href="<?php echo e(route('tsrm.login')); ?>"><i class="fas fa-sign-in-alt"></i>Log In</a>
				</li>
				<li class="nav-item active">
					<a style="border: 1px solid" class="nav-link mr-1" href="#"><i class="fas fa-user-plus"></i>Sign Up<span
							class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Modal -->
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
	<!--Sign Up Page-->>
	<div class='box'>
		<h2>Sign Up</h2>
		<form method="post">
			<?php echo e(csrf_field()); ?>

			<div class='inputBox'>
				<label>First Name</label>
				<input type="text" name="fname" id="fname" tabindex="1" pattern="[A-Za-z]+" required
					title="Please Enter Your First Name" placeholder="First Name" autocomplete="off">
			</div>
			<div class='inputBox'>
				<label>Surname</label>
				<input type="text" name="lname" id="lname" tabindex="2" pattern="[A-Za-z]+" required placeholder="Surname"
					title="Please Enter Your Surname" autocomplete="off">
			</div>
			<div class='inputBox'>
				<label>Email</label>
				<input type="email" name="mail" id="mail" tabindex="3" placeholder="Email" required
					title="Please Enter Your Registered Mail Address" autocomplete="off">
			</div>
			<div class='inputBox'>
				<label>Password</label>
				<input type="password" name="pass" id="pass" tabindex="4" required minlength="8" maxlength="26"
					placeholder="Password" title="Please Enter Your Password" autocomplete="off">
			</div>
			<div class='inputBox'>
				<label>Confirm Password</label>
				<input type="password" name="cnfrmpass" id="cnfrmpass" tabindex="5" required minlength="8"
					placeholder="Confirm Password" maxlength="26" title="Please Confirm Your Password" autocomplete="off">

			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-light center-block" name="signup"><i
						class="fas fa-sign-in-alt"></i>SUBMIT</button>
			</div>
			<br>
			<?php if(count($errors)>0): ?>
				<?php 	$lol = '';		?>	
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php	$lol = $message;  ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<input type="hidden" id="custId" name="custId" value="<?php echo e($lol); ?>">
			<?php endif; ?>
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
<?php /* F:\Spring 18-19\ATP 3\FINAL\Project\Dipto\Project V 29.4.19\resources\views/signup/index.blade.php */ ?>