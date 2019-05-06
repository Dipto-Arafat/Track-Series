Hello <b>{{$data['fname']}} {{$data['lname']}}</b>
<p>Please Click this link to verify your trackseries account</p>

<a href='http://localhost:8000/tsrm/confirm/{{$data['mail']}}/{{$data['token']}}' target='_blank'>Click Here</a>

<p>Please do not reply to this mail</p>