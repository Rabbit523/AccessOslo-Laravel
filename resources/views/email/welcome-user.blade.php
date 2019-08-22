<html>
<p><b>Hi, {{ $name }}.</b></p>
<p>Welcome to Access Oslo.<br>Your account has been successfully created.<br></p>
@if(Auth::User())
<a href="{{url('/member/manage-account')}}">Go to My Account.</a>
@else
<a href="{{url('/login')}}">Login to your account.</a>
@endif
<p><b>Your Access Oslo Team.</b></p>
<p><b>Call us at +47 91 222 999 or send us an email at <span class="nobr"><a href="mailto:contact@accessoslo.no" class="external-link" rel="nofollow" title="Follow link">contact@accessoslo.no</a></span>&nbsp;for support.</b></p>
</html>