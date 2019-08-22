<html>    
    <p>A new request has been made for Handling Request. Here are the details:</p>
    <p><b>Airport:</b>&nbsp;{{$charter->airport}}</p>
    <p><b>Aircraft Type:</b>&nbsp;{{$charter->aircraft_type}}</p>
    <p><b>Company:</b>&nbsp;{{$charter->company}}</p>
    <p><b>Aircraft Reg:</b>&nbsp;{{$charter->aircraft_reg}}</p>
    <p><b>Crew Configuration:</b>&nbsp;{{$charter->crew_config1}}/{{$charter->crew_config2}}</p>
    <p><b>Flight Type:</b>&nbsp;{{$charter->flight_type}}</p>
    <p><b>Hotac:</b>&nbsp;{{$charter->hotac}}</p>
    <p><b>Catering:</b>&nbsp;{{$charter->catering}}</p>
    <p><b>Contact Person:</b>&nbsp;{{$charter->person}}</p>  
    <p><b>Phone:</b>&nbsp;{{$charter->phone}}</p>
    <p><b>Email:</b>&nbsp;{{$charter->email}}</p>
    <p><b>Inbound:</b></p>
    <p><b>Flight no:</b>&nbsp;{{$charter->inbound_flight}}</p>
    <p><b>DOF:</b>&nbsp;{{$charter->inbound_date}}</p>
    <p><b>Destination:</b>&nbsp;{{$charter->inbound_orig}}</p>
    <p><b>STA (UTC):</b>&nbsp;{{$charter->inbound_utc}}</p>
    <p><b>Outbound:</b></p>
    <p><b>Flight no:</b>&nbsp;{{$charter->outbound_flight}}</p>
    <p><b>DOF:</b>&nbsp;{{$charter->outbound_date}}</p>
    <p><b>Destination:</b>&nbsp;{{$charter->outbound_orig}}</p>
    <p><b>STD (UTC):</b>&nbsp;{{$charter->outbound_utc}}</p>
    @if($charter->attach_doc != null)
    <p><b>Attachment:</b>&nbsp;<a href="{{URL('')}}{{$charter->attach_doc}}" download><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-2x" style="width: 20px;height: 20px;"><path fill="currentColor" d="M348.5 264l-148 148.5c-4.7 4.7-12.3 4.7-17 0L35.5 264c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l115.4 116V44c0-6.6 5.4-12 12-12h10c6.6 0 12 5.4 12 12v311.9L324.4 240c4.7-4.7 12.3-4.7 17 0l7.1 7.1c4.7 4.6 4.7 12.2 0 16.9zM384 468v-8c0-6.6-5.4-12-12-12H12c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12z"></path></svg></a>
    @else <p><b>Attachment:</b>&nbsp;Null
    @endif
    <p><b>Additional information:</b>&nbsp;{{$charter->comments}}</p>
</html>