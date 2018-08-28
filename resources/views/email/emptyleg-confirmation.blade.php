<html>
  <head>
    <title>EmptyLeg - Booking Confirmation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body bgcolor="#f8f6f0">
    <table align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top" colspan="3" width="500" height="44" style="background: #f8f6f0;padding: 0px; margin: 0px; outline: none; border: none;"></td>
      </tr>
      <tr>
        <td colspan="3">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Aircraft-Booking-Confirmation_02.jpg" width="500" height="181" alt=""></td>
      </tr>
      <tr>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_03.png" width="77" height="33" alt=""></td>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_04.png" width="351" height="33" alt=""></td>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_05.png" width="72" height="33" alt=""></td>
      </tr>
      <tr>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_06.png" width="77" height="52" alt=""></td>
        <td valign="top" style="background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;">
          <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF">
            <tr>
              <td valign="top" style="background: #fff;">
                <p style="font-family: 'Arial'; text-transform: uppercase; font-size: 18px; color: #c59d3d; line-height: 25px; margin: 0px;">EmptyLeg Booking</p>
              </td>
              <td>
                <p style="font-family: 'Arial'; font-size: 14px; color: #5f6062; line-height: 25px; margin: 0px; text-align: right;">{{$emptyleg->created_at}}</p>
              </td>
            </tr>
            <tr>
              <td valign="top" style="background: #fff;">
                <p style="font-family: 'Arial'; text-transform: uppercase; font-size: 18px; color: #515c9f; line-height: 25px; margin: 0px;">Confirmation</p>
              </td>
              <td>
                <p style="font-family: 'Arial'; font-size: 14px; color: #5f6062; line-height: 25px; margin: 0px; text-align: right;"></p>
              </td>
            </tr>
          </table>
        </td>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_08.png" width="72" height="52" alt=""></td>
      </tr>
      <tr>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_09.png" width="77" height="20" alt=""></td>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_10.png" width="351" height="20" alt=""></td>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_11.png" width="72" height="20" alt=""></td>
      </tr>
      <tr>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_12.png" width="77" height="170" alt=""></td>
        <td valign="top" style="background:#FFF;">
          <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF">
            <tr>
              <td valign="top" style="background: #fff;">
                <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Service</p>
              </td>
              <td>
                <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">Emptyleg Charter</p>
              </td>
            </tr>
            <tr>
              <td valign="top" style="background: #fff;">
                <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Booking No</p>
              </td>
              <td>
                <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">#{{$emptyleg->id}}</p>
              </td>
            </tr>
            <tr>
              <td valign="top" style="background: #fff;">
                <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Travel Date</p>
              </td>
              <td>
                <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">{{$emptyleg->end_date}}</p>
              </td>
            </tr>
            <tr>
              <td valign="top" style="background: #fff;">
                <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Travel Time</p>
              </td>
              <td>
                <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">{{$emptyleg->end_time}}</p>
              </td>
            </tr>
            <tr>
              <td valign="top" style="background: #fff;">
                <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">From Airport</p>
              </td>
              <td>
                <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">{{$emptyleg->departure}}</p>
              </td>
            </tr>
            <tr>
              <td valign="top" style="background: #fff;">
                <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">To Airport</p>
              </td>
              <td>
                <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">{{$emptyleg->destination}}</p>
              </td>
            </tr>            
          </table>
        </td>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_14.png" width="72" height="170" alt=""></td>
      </tr>
      <tr>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_15.png" width="77" height="22" alt=""></td>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_16.png" width="351" height="22" alt=""></td>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_17.png" width="72" height="22" alt=""></td>
      </tr>
      <tr>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_18.png" width="77" height="78" alt=""></td>
        <td valign="top" width="344" height="73" style="text-align: center; background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;">
          <p style="font-family: 'Arial'; font-size: 12px; color: #5f6062; line-height: 16px; margin: 0px;">
            Hello {{$emptyleg->contact_person}}, Thank you for your booking. <br>
            You will soon receive a price estimation. We look forward to have you onboard. Our team will get in touch shortly.</p>
        </td>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_20.png" width="72" height="78" alt=""></td>
      </tr>
      <tr>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_21.png" width="77" height="255" alt=""></td>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_22.png" width="351" height="255" alt=""></td>
        <td valign="top">
          <img style="display:block; outline: none; margin: 0px; padding: 0px; border: none;" src="/assets/images/Business-Helicopter-Booking-Confirmation_23.png" width="72" height="255" alt=""></td>
      </tr>
      <tr>
        <td valign="top">
          <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_20.jpg" width="76" height="41" alt=""></td>
        <td valign="top" style="background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;">
          <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF">
            <tr>
              <td valign="top" style="background: #fff;">
                <p style="font-family: 'Arial'; font-size: 14px; color: #afafaf; line-height: 16px; margin: 10px 0px 0px 0px;">Total estimation</p>
              </td>
              <td valign="top" style="background: #fff;">
                @if ($emptyleg->currency == "AUD" || $emptyleg->currency == "USD" || $emptyleg->currency == "CAD")
                <p style="font-family: 'Arial';font-size: 18px; color: #c29734; line-height: 16px; margin: 10px 0px 0px 0px; text-align: right;">{{$emptyleg->price}}$</p>
                @elseif ($emptyleg->currency == "EUR")
                <p style="font-family: 'Arial';font-size: 18px; color: #c29734; line-height: 16px; margin: 10px 0px 0px 0px; text-align: right;">{{$emptyleg->price}}€</p>
                @elseif ($emptyleg->currency == "GBP")
                <p style="font-family: 'Arial';font-size: 18px; color: #c29734; line-height: 16px; margin: 10px 0px 0px 0px; text-align: right;">{{$emptyleg->price}}£</p>
                @elseif ($emptyleg->currency == "NOK" || $emptyleg->currency == "DKK")
                <p style="font-family: 'Arial';font-size: 18px; color: #c29734; line-height: 16px; margin: 10px 0px 0px 0px; text-align: right;">{{$emptyleg->price}}kr</p>
                @elseif ($emptyleg->currency == "CNY" || $emptyleg->currency == "JPY")
                <p style="font-family: 'Arial';font-size: 18px; color: #c29734; line-height: 16px; margin: 10px 0px 0px 0px; text-align: right;">{{$emptyleg->price}}¥</p>
                @endif
              </td>
            </tr>                    
          </table>
        </td>
        <td valign="top">
          <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_22.jpg" width="79" height="41" alt=""></td>
      </tr>
    </table>
  <!-- End Save for Web Slices -->
  </body>
</html>