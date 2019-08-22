<html>

<head>
	<title>Aircraft Charter - Booking Confirmation</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body bgcolor="#f8f6f0">
	<table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td valign="top" colspan="3">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_01.jpg"
				    width="500" height="44" alt="Access Oslo">
			</td>
		</tr>
		<tr>
			<td valign="top" colspan="3">
				@if($charter->booking_type == "helicopter")
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Helicopter-Booking-Confirmation_02.png"
					width="500" height="181" alt="Access Oslo">				
				@else
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_02.jpg"
					width="500" height="181" alt="Access Oslo">
				@endif
			</td>
		</tr>
		<tr>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_03.jpg"
				    width="79" height="33" alt="Access Oslo">
			</td>
			<td valign="top" width="344" height="33" style="background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;"></td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_05.jpg"
				    width="77" height="33" alt="Access Oslo">
			</td>
		</tr>
		<tr>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_06.jpg"
				    width="79" height="52" alt="Access Oslo">
			</td>
			<td valign="top" style="background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;">
				<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF">
					<tr>
						<td valign="top" style="background: #fff;">
							<p style="font-family: 'Arial'; text-transform: uppercase; font-size: 18px; color: #c59d3d; line-height: 1; margin: 0px;">Booking</p>
						</td>
						<td>
							<p style="font-family: 'Arial'; font-size: 14px; color: #5f6062; line-height: 1; margin: 0px; text-align: right;">{{$charter->created_at}}</p>
						</td>
					</tr>
					<tr>
						<td valign="top" style="background: #fff;">
							<p style="font-family: 'Arial'; text-transform: uppercase; font-size: 18px; color: #515c9f; line-height: 1; margin: 0px;">CONFIRMATION</p>
						</td>
						<td>
							<p style="font-family: 'Arial'; font-size: 14px; color: #5f6062; line-height: 1; margin: 0px; text-align: right;"></p>
						</td>
					</tr>
				</table>
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_08.jpg"
				    width="77" height="52" alt="Access Oslo">
			</td>
		</tr>
		<tr>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_09.jpg"
				    width="79" height="18" alt="Access Oslo">
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_10.jpg"
				    width="344" height="18" alt="Access Oslo">
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_11.jpg"
				    width="77" height="18" alt="Access Oslo">
			</td>
		</tr>
		<tr>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_12.jpg"
				    width="79" height="175" alt="Access Oslo">
			</td>
			<td valign="top" style="background:#FFF;">
				<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF">
					<tr>
						<td valign="top" style="background: #fff;">
							<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Service</p>
						</td>
						<td>
							@if($charter->booking_type == "executive")
							<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">Executive Charter</p>
							@elseif($charter->booking_type == "group")
							<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">Group Charter</p>
							@elseif($charter->booking_type == "helicopter")
							<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">Helicopter Charter</p>
							@endif
						</td>
					</tr>
					<tr>
						<td valign="top" style="background: #fff;">
							<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Booking No</p>
						</td>
						<td>
							<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">#{{$charter->id}}</p>
						</td>
					</tr>
					<tr>
						<td valign="top" style="background: #fff;">
							<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Travel Date</p>
						</td>
						<td>
							<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">{{$charter->date}}</p>
						</td>
					</tr>
					<tr>
						<td valign="top" style="background: #fff;">
							<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">From Airport</p>
						</td>
						<td>
							<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">{{$charter->departure}}</p>
						</td>
					</tr>
					<tr>
						<td valign="top" style="background: #fff;">
							<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">To Airport</p>
						</td>
						<td>
							<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">{{$charter->destination}}</p>
						</td>
					</tr>
					<tr>
						<td valign="top" style="background: #fff;">
							<p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Passengers</p>
						</td>
						<td>
							<p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">{{$charter->travellers}}</p>
						</td>
					</tr>
				</table>
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_14.jpg"
				    width="77" height="175" alt="Access Oslo">
			</td>
		</tr>
		<tr>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_15.jpg"
				    width="79" height="16" alt="Access Oslo">
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_16.jpg"
				    width="344" height="16" alt="Access Oslo">
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_17.jpg"
				    width="77" height="16" alt="Access Oslo">
			</td>
		</tr>
		<tr>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_18.jpg"
				    width="79" height="27" alt="Access Oslo">
			</td>
			<td valign="top" width="344" height="27" style="background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;">
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_20.jpg"
				    width="77" height="27" alt="Access Oslo">
			</td>
		</tr>
		<tr>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_21.jpg"
				    width="79" height="110" alt="Access Oslo">
			</td>
			<td valign="top" width="344" height="73" style="text-align: center; background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;">
				<p style="font-family: 'Arial'; font-size: 12px; color: #5f6062; line-height: 16px; margin: 0px;">
					<span style="color: #c29734;">Hello {{$charter->contact_person}}, </span>
					<br>Thank you for your booking. We look forward to have you onboard. Our team
					will get in touch shortly.</p><br>
				<p style="font-family: 'Arial'; font-size: 12px; color: #5f6062; line-height: 16px; margin: 0px;">If you have any questions, you can send us an email to <span class="nobr"><a href="mailto:contact@accessoslo.no" class="external-link" rel="nofollow" title="Follow link">contact@accessoslo.no</a> or call us at +47 91 222 999</p>
				<p style="font-family: 'Arial'; font-size: 12px; color: #5f6062; line-height: 16px; margin: 0px;">Read our <a href="{{URL('/terms')}}"> Terms of Service</a> for more information</p>
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_23.jpg"
				    width="77" height="110" alt="Access Oslo">
			</td>
		</tr>
		<tr>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_24.jpg"
				    width="79" height="115" alt="Access Oslo">
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_25.jpg"
				    width="344" height="115" alt="Access Oslo">
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_26.jpg"
				    width="77" height="115" alt="Access Oslo">
			</td>
		</tr>
		<tr>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_27.jpg"
				    width="79" height="76" alt="Access Oslo">
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_28.jpg"
				    width="344" height="76" alt="Access Oslo">
			</td>
			<td valign="top">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_29.jpg"
				    width="77" height="76" alt="Access Oslo">
			</td>
		</tr>
		<tr>
			<td valign="top" colspan="3">
				<img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_30.jpg"
				    width="500" height="30" alt="Access Oslo">
			</td>
		</tr>
		<tr>
			<td valign="top" colspan="3">
				<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#f8f6f0">
					<tr>
						<td valign="top" width="165" height="37" style="background: #f8f6f0;padding: 0px; margin: 0px; outline: none; border: none;"></td>
						<td valign="top">
							<a href="" target="_blank"><img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_32.jpg"
							    width="37" height="37" alt="Facebook"></a>
						</td>
						<td valign="top">
							<a href="" target="_blank"><img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_33.jpg"
							    width="33" height="37" alt="Instagram"></a>
						</td>
						<td valign="top">
							<a href="" target="_blank"><img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_34.jpg"
							    width="31" height="37" alt="Google Plus"></a>
						</td>
						<td valign="top">
							<a href="" target="_blank"><img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_35.jpg"
							    width="33" height="37" alt="LinkedIn"></a>
						</td>
						<td valign="top">
							<a href="" target="_blank"><img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/Business-Aircraft-Booking-Confirmation_36.jpg"
							    width="40" height="37" alt="Youtube"></a>
						</td>
						<td valign="top" width="161" height="37" style="background: #f8f6f0;padding: 0px; margin: 0px; outline: none; border: none;"></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>

</html>