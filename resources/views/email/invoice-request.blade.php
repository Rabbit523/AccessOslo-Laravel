<html>
    <p><b>Payment:</b>&nbsp;Wire Transfer</p>
    <p><b>Service Type:</b>&nbsp;Executive Charter</p>
    <p><b>Contact Person:</b>&nbsp;{{$charter->contact_person}}</p>
    <p><b>Company:</b>&nbsp;{{$charter->company}}</p>
    <p><b>Phone:</b>&nbsp;{{$charter->phone}}</p>
    <p><b>Email:</b>&nbsp;{{$email}}</p>
    <p><b>Date of Departure:</b>&nbsp;{{$charter->date}}</p>
    <p><b>Local time of departure:</b>&nbsp;{{$charter->time}}</p>
    <p><b>Departure Airport:</b>&nbsp;{{$charter->departure}}</p>
    <p><b>Destination Airport:</b>&nbsp;{{$charter->destination}}</p>
    <p><b>Travelers:</b>&nbsp;{{$charter->travellers}}</p>
    <p><b>Flight Bonus:</b>&nbsp;{{$charter->bonus}}</p>
    <p><b>Flight Service:</b>&nbsp;{{$charter->flight_type}}</p>
    <p><b>Date of Return:</b>&nbsp;{{$charter->return_date}}</p>
    <p><b>Time of Return:</b>&nbsp;{{$charter->return_time}}</p>
    <p><b>Passengers:</b>
    @foreach ($passengers as $passenger)
    <p><b>Gender:</b>&nbsp;<span style="text-transform: capitalize;">{{$passenger->gender}}</span>&nbsp;
       <b>Name:</b>&nbsp;<span>{{$passenger->first_name}} {{$passenger->last_name}}</span>&nbsp;
       <b>Birth:</b>&nbsp;<span>{{$passenger->birth}}</span>&nbsp;
       <b>Nationality:</b>&nbsp;<span>{{$passenger->nationality}}</span>&nbsp;
       <b>Passport NO:</b>&nbsp;<span>{{$passenger->passport_no}}</span>&nbsp;
       <b>Passport Expiry:</b>&nbsp;<span>{{$passenger->passport_expiry}}</span>&nbsp;
    </p>
    @endforeach
</html>