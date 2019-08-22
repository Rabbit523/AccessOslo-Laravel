<html>
    @if($charter->booking_type == "executive")
    <p>A new request has been made for Executive Charter. Here are the details:</p>    
    @elseif($charter->booking_type == "group")
    <p>A new request has been made for Group Charter. Here are the details:</p>    
    @elseif($charter->booking_type == "helicopter")
    <p>A new request has been made for Helicopter Charter. Here are the details:</p>    
    @endif
    <p><b>Gender:</b>&nbsp;{{$gender}}</p>
    <p><b>Contact Person:</b>&nbsp;{{$charter->contact_person}}</p>
    <p><b>Company:</b>&nbsp;{{$charter->company}}</p>
    <p><b>Phone:</b>&nbsp;{{$charter->phone}}</p>
    <p><b>Email:</b>&nbsp;{{$charter->email}}</p>
    <p><b>Date of Departure:</b>&nbsp;{{$charter->date}}</p>
    <p><b>Local time of departure:</b>&nbsp;{{$charter->time}}</p>
    <p><b>Departure Airport:</b>&nbsp;{{$charter->departure}}</p>
    <p><b>Destination Airport:</b>&nbsp;{{$charter->destination}}</p>
    <p><b>Travelers:</b>&nbsp;{{$charter->travellers}}</p>
    <p><b>Flight Bonus:</b>&nbsp;{{$charter->bonus}}</p>
    <p><b>Flight Service:</b>&nbsp;{{$charter->flight_type}}</p>
    <p><b>Date of Return:</b>&nbsp;{{$charter->return_date}}</p>
    <p><b>Time of Return:</b>&nbsp;{{$charter->return_time}}</p>
</html>