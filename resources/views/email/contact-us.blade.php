<html>
@if($type == "*.*")
<p>A new contact request has been made. Here are the details:<br></p>
@else
<p>A new contact request has been made for {{$type}}. Here are the details:<br></p>
@endif
<p><b>First name:</b>&nbsp;{{$first_name}}</p>
<p><b>Last name:</b>&nbsp;{{$last_name}}</p>
<p><b>Email:</b>&nbsp;{{$email}}</p>
<p><b>Phone:</b>&nbsp;{{$phone}}</p>
<p><b>Message:</b>&nbsp;{{$_message}}</p>
</html>