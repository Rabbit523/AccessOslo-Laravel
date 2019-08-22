<html>
<p><b>Hi, {{ $name }}.</b></p>
<p>We received a request to reset your password on Access Oslo.</p>
<a href="{{url('/reset_password')}}/{{$token}}">Click here to reset your password.</a>
<p>If you didn’t request a password change, you can ignore this message and continue to use your current password. Someone probably typed in your email address by accident. </p>
<p><b>Your Access Oslo Team.</b></p>
<p><b>Call us at +47 91 222 999 or send us an email at </b><span><a href="mailto:contact@accessoslo.no" class="external-link" rel="nofollow" title="Follow link">contact@accessoslo.no</a></span><b>&nbsp;for support.</b></p>
</html>