Hello <b><?php echo e($data['fname']); ?> <?php echo e($data['lname']); ?></b>
<p>Please Click this link to verify your trackseries account</p>

<a href='http://localhost:8000/tsrm/confirm/<?php echo e($data['mail']); ?>/<?php echo e($data['token']); ?>' target='_blank'>Click Here</a>

<p>Please do not reply to this mail</p>
<?php /* F:\Spring 18-19\ATP 3\FINAL\Project V 2.4.19\resources\views/mail/signup_mail.blade.php */ ?>