<html>
  <head>
    <title>EmptyLeg - Booking Confirmation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body bgcolor="#f8f6f0">
  <table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_01.jpg" width="500" height="226" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_02.jpg" width="76" height="30" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_03.jpg" width="345" height="30" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_04.jpg" width="79" height="30" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_05.jpg" width="76" height="73" alt=""></td>
      <td valign="top" style="background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;" width="345" height="73">
        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF">
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; text-transform: uppercase; font-size: 17px; color: #c59d3d; line-height: 35px; margin: 0px;">EmptyLeg Booking</p>
            </td>
            <td valign="top">
              <p style="font-family: 'Arial'; font-size: 14px; color: #5f6062; line-height: 25px; margin: 0px; text-align: right;">{{$emptyleg->created_at}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; text-transform: uppercase; font-size: 18px; color: #515c9f; line-height: 25px; margin: 0px;">Confirmation</p>
            </td>
            <td valign="top">
              <p style="font-family: 'Arial'; font-size: 14px; color: #5f6062; line-height: 25px; margin: 0px; text-align: right;"></p>
            </td>
          </tr>
        </table>
      </td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_07.jpg" width="79" height="73" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_23.jpg" width="76" height="34" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_24.jpg" width="345" height="34" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_25.jpg" width="79" height="34" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_08.jpg" width="76" height="172" alt=""></td>
      <td valign="top" style="background:#FFF;" width="345" height="171">
        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF"> 
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Service</p>
            </td>
            <td>
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">Emptyleg Charter</p>
            </td>
          </tr>               
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Booking No</p>
            </td>
            <td>
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">#{{$emptyleg->id}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Travel Date</p>
            </td>
            <td>
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$emptyleg->end_date}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">Travel Time</p>
            </td>
            <td>
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$emptyleg->end_time}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">From Airport</p>
            </td>
            <td>
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$emptyleg->departure}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 22px; margin: 0px;">To Airport</p>
            </td>
            <td>
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 22px; margin: 0px; text-align: right;">{{$emptyleg->destination}}</p>
            </td>
          </tr>          
        </table>
      </td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_10.jpg" width="79" height="172" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_11.jpg" width="76" height="27" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_12.jpg" width="345" height="27" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_13.jpg" width="79" height="27" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_14.jpg" width="76" height="111" alt=""></td>
      <td valign="top" width="345" height="111" style="text-align: center; background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;">
        <p style="font-family: 'Arial'; font-size: 12px; color: #5f6062; line-height: 16px; margin: 0px;">
          <span style="color: #c29734;">Hello {{$emptyleg->contact_person}}, Thank you for your booking.</span>
          <br>We look forward to have you onboard. Our team will get in touch shortly. </p><br>
          <p style="font-family: 'Arial'; font-size: 12px; color: #5f6062; line-height: 16px; margin: 0px;">If you have any questions, you can send us an email to <span class="nobr"><a href="mailto:contact@accessoslo.no" class="external-link" rel="nofollow" title="Follow link">contact@accessoslo.no</a> or call us at +47 91 222 999</p>
          <p style="font-family: 'Arial'; font-size: 12px; color: #5f6062; line-height: 16px; margin: 0px;">Read our <a href="{{URL('/terms')}}"> Terms of Service</a> for more information</p>
      </td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_16.jpg" width="79" height="111" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_17.jpg" width="76" height="116" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_18.jpg" width="345" height="116" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_19.jpg" width="79" height="116" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_20.jpg" width="76" height="41" alt=""></td>
      <td valign="top" style="background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;">
        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF">
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 14px; color: #afafaf; line-height: 16px; margin: 10px 0px 0px 0px;">Total estimation</p>
            </td>
            <td valign="top" style="background: #fff;">
                @if ($emptyleg->currency == "AUD" || $emptyleg->currency == "USD" || $emptyleg->currency == "CAD")
                <p style="font-family: 'Arial';font-size: 18px; color: #c29734; line-height: 16px; margin: 10px 0px 0px 0px; text-align: right;">${{$emptyleg->price}}</p>
                @elseif ($emptyleg->currency == "EUR")
                <p style="font-family: 'Arial';font-size: 18px; color: #c29734; line-height: 16px; margin: 10px 0px 0px 0px; text-align: right;">€{{$emptyleg->price}}</p>
                @elseif ($emptyleg->currency == "GBP")
                <p style="font-family: 'Arial';font-size: 18px; color: #c29734; line-height: 16px; margin: 10px 0px 0px 0px; text-align: right;">£{{$emptyleg->price}}</p>
                @elseif ($emptyleg->currency == "NOK" || $emptyleg->currency == "DKK")
                <p style="font-family: 'Arial';font-size: 18px; color: #c29734; line-height: 16px; margin: 10px 0px 0px 0px; text-align: right;">kr{{$emptyleg->price}}</p>
                @elseif ($emptyleg->currency == "CNY" || $emptyleg->currency == "JPY")
                <p style="font-family: 'Arial';font-size: 18px; color: #c29734; line-height: 16px; margin: 10px 0px 0px 0px; text-align: right;">¥{{$emptyleg->price}}</p>
                @endif
			</td>
          </tr>                    
        </table>
      </td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_22.jpg" width="79" height="41" alt=""></td>
    </tr>    
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_35.jpg" width="76" height="36" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_36.jpg" width="345" height="36" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_37.jpg" width="79" height="36" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_38.jpg" width="76" height="53" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_39.jpg" width="345" height="53" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_40.jpg" width="79" height="53" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_41.jpg" width="76" height="46" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_42.jpg" width="345" height="46" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="https://accessoslo.fantasylab.io/assets/images/template2_43.jpg" width="79" height="46" alt=""></td>
    </tr>    
    <tr>
      <td colspan="3" valign="top" width="500" height="31" style="background: #f8f6f0;padding: 0px; margin: 0px; outline: none; border: none;"></td>
    </tr>
  </table>
  </body>
</html>