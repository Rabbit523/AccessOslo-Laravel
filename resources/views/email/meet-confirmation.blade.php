<html>
<head>
<title>Meet & Greet - Arrival - Booking Confirmation</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#f8f6f0">
<table align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="top" colspan="3" width="500" height="44" style="background: #f8f6f0;padding: 0px; margin: 0px; outline: none; border: none;"></td>
	</tr>
	<tr>
		<td colspan="3">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Meet-&-Greet-Arrival-Booking-Confirmation_02.jpg" width="500" height="181" alt=""></td>
	</tr>
	<tr>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_03.png" width="77" height="33" alt=""></td>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_04.png" width="351" height="33" alt=""></td>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_05.png" width="72" height="33" alt=""></td>
	</tr>
	<tr>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_06.png" width="77" height="52" alt=""></td>
		<td valign="top" style="background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;">
			<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF">
				<tr>
					<td valign="top" style="background: #fff;">
            <p style="font-family: 'Arial'; text-transform: uppercase; font-size: 18px; color: #c59d3d; line-height: 25px; margin: 0px;">Meet & Greet</p>
          </td>
          <?php $date = $meet->updated_at;
$date_str = $date->format('Y-m-d');
$time_str = $date->format('H:i:s');?>
					<td>
						<p style="font-family: 'Arial'; font-size: 14px; color: #5f6062; line-height: 25px; margin: 0px; text-align: right;">{{$date_str}}</p>
					</td>
				</tr>
				<tr>
					<td valign="top" style="background: #fff;">
						<p style="font-family: 'Arial'; text-transform: uppercase; font-size: 18px; color: #515c9f; line-height: 25px; margin: 0px;">Confirmation</p>
					</td>
					<td>
						<p style="font-family: 'Arial'; font-size: 14px; color: #5f6062; line-height: 25px; margin: 0px; text-align: right;">{{$time_str}}</p>
					</td>
				</tr>
			</table>
		</td>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_08.png" width="72" height="52" alt=""></td>
	</tr>
	<tr>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_09.png" width="77" height="20" alt=""></td>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_10.png" width="351" height="20" alt=""></td>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_11.png" width="72" height="20" alt=""></td>
	</tr>
	<tr>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_12.png" width="77" height="255" alt=""></td>
		<td valign="top" style="background:#FFF;">
			<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF">
				<tr>
					<td valign="top" style="background: #fff;">
						<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Service</p>
					</td>
					<td>
					@if($meet->is_arrival == "true")
					<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">Meet & Greet - Arrival</p>
					@endif
					@if($meet->is_departure == "true")
					<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">Meet & Greet - Departure</p>
					@endif
					</td>
				</tr>
				<tr>
					<td valign="top" style="background: #fff;">
						<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Inbound:</p>
					</td>
				</tr>
				<tr>
					<td valign="top" style="background: #fff;">
						<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Flight No</p>
					</td>
					<td>
						<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$meet->in_flight_number}}</p>
					</td>
        </tr>
        <tr>
					<td valign="top" style="background: #fff;">
						<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Airline</p>
					</td>
					<td>
						<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$meet->in_airline}}</p>
					</td>
				</tr>
				<tr>
					<td valign="top" style="background: #fff;">
						<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Date of Flight</p>
					</td>
					<?php $num_date = strtotime($meet->in_date); $newTime = date('jS F Y', $num_date);?>
					<td>
						<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$newTime}}</p>
					</td>
				</tr>
				<tr>
					<td valign="top" style="background: #fff;">
						<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Time of Arrival</p>
					</td>
					<td>
						<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$meet->in_time}}</p>
					</td>
				</tr>
				<tr>
					<td valign="top" style="background: #fff;">
						<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Luggage</p>
					</td>
					<td>
						<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$meet->in_luggage}}</p>
					</td>
		</tr>
		@if($meet->is_departure == "true")
		<tr>
			<td valign="top" style="background: #fff;">
				<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Outbound:</p>
			</td>
		</tr>
		<tr>
			<td valign="top" style="background: #fff;">
				<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Flight No</p>
			</td>
			<td>
				<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$meet->out_flight_number}}</p>
			</td>
		</tr>
		<tr>
			<td valign="top" style="background: #fff;">
				<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Airline</p>
			</td>
			<td>
				<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$meet->out_airline}}</p>
			</td>
		</tr>
		<tr>
			<td valign="top" style="background: #fff;">
				<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Date of Flight</p>
			</td>
			<?php $num_date = strtotime($meet->out_date); $newTime = date('jS F Y', $num_date);?>
			<td>
				<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$newTime}}</p>
			</td>
		</tr>
		<tr>
			<td valign="top" style="background: #fff;">
				<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Time of Arrival</p>
			</td>
			<td>
				<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$meet->in_time}}</p>
			</td>
		</tr>
		<tr>
			<td valign="top" style="background: #fff;">
				<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Luggage</p>
			</td>
			<td>
				<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$meet->in_luggage}}</p>
			</td>
		</tr>
		@endif
        <tr>
          <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Travelers</p>
          </td>
          <td>
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 18px; margin: 0px; text-align: right;">{{$meet->travelers}}</p>
          </td>
        </tr>
        <tr>
          <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Contact Person</p>
          </td>
          <td>
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 18px; margin: 0px; text-align: right;">{{$meet->contact_person}}</p>
          </td>
        </tr>
        <tr>
          <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Phone</p>
          </td>
          <td>
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 18px; margin: 0px; text-align: right;">{{$meet->phone}}</p>
          </td>
        </tr>
        <tr>
          <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Email</p>
          </td>
          <td>
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 18px; margin: 0px; text-align: right;">{{$meet->email}}</p>
          </td>
        </tr>
        <tr>
          <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Company</p>
          </td>
          <td>
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 18px; margin: 0px; text-align: right;">{{$meet->company}}</p>
          </td>
        </tr>
			</table>
		</td>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_14.png" width="72" height="255" alt=""></td>
	</tr>
	<tr>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_15.png" width="77" height="22" alt=""></td>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_16.png" width="351" height="22" alt=""></td>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_17.png" width="72" height="22" alt=""></td>
	</tr>
	<tr>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_18.png" width="77" height="95" alt=""></td>
		<td valign="top" width="344" height="73" style="text-align: center; background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;">
      <p style="font-family: 'Arial'; font-size: 12px; color: #5f6062; line-height: 16px; margin: 0px;">
				Hello, {{$meet->contact_person}}, Thank you for your booking. <br>
				Our team will get in touch shortly.</p><br>
				<p style="font-family: 'Arial'; font-size: 12px; color: #5f6062; line-height: 16px; margin: 0px;">If you have any questions, you can send us an email to <span class="nobr"><a href="mailto:contact@accessoslo.no" class="external-link" rel="nofollow" title="Follow link">contact@accessoslo.no</a> or call us at +47 91 222 999</p>
				<p style="font-family: 'Arial'; font-size: 12px; color: #5f6062; line-height: 16px; margin: 0px;">Read our <a href="{{URL('/terms')}}"> Terms of Service</a> for more information</p>
		</td>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_20.png" width="72" height="95" alt=""></td>
	</tr>
	<tr>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_21.png" width="77" height="255" alt=""></td>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_22.png" width="351" height="255" alt=""></td>
		<td valign="top">
			<img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_23.png" width="72" height="255" alt=""></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</body>
</html>
