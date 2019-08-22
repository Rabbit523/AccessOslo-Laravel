<html>
<p><b>Hi, {{ $name }}.</b></p>
<p>Welcome to Access Oslo.<br>Your account has been successfully created.<br>You can login with the credentials below:</p>
<p><b>Registration email:</b> {{ $email}}</p>
<p><b>New password:</b> {{ $password}}</p>
<p>Click the link below to access your account.</p>
<a href="{{url('/login')}}">Go to My Account</a>
<p><b>Your Access Oslo Team.<b></p>
<p><b>Call us at +47 91 222 999 or send us an email at <span class="nobr"><a href="mailto:contact@accessoslo.no" class="external-link" rel="nofollow" title="Follow link">contact@accessoslo.no</a></span>&nbsp;for support.</b></p>
</html>

