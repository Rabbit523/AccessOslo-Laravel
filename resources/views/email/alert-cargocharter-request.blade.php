<html>    
    <p>A new request has been made for Cargo Charter. Here are the details:</p>       
    <p><b>Departure Airport:</b>&nbsp;{{$charter->departure}}</p>
    <p><b>Destination Airport:</b>&nbsp;{{$charter->destination}}</p>
    <p><b>Date:</b>&nbsp;{{$charter->date}}</p>    
    <p><b>Dimensions (cm):</b>&nbsp;{{$charter->width}}*{{$charter->height}}*{{$charter->depth}}</p>
    <p><b>Weight (kg):</b>&nbsp;{{$charter->weight}}</p>
    <p><b>Dangerous Goods:</b>&nbsp;{{$charter->is_danger}}</p>    

    <p><b>Company:</b>&nbsp;{{$charter->company}}</p>
    <p><b>Contact Person::</b>&nbsp;{{$charter->contact_person}}</p>    
    <p><b>Phone:</b>&nbsp;{{$charter->phone}}</p>
    <p><b>Email:</b>&nbsp;{{$charter->email}}</p>
</html>