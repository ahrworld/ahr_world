<div style="width:100%; height:500px; background:#66FFCC; color:#FFF;" >
Click here to reset your password:<br>
<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
</div>