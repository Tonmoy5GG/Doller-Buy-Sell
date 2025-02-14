Click here for Reset YOur Password : <br>
<a href="{{ $link = url('member/password/reset',$token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>