<html>
  <head>
    <title>Aircraft Chaters- Booking Estimation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body bgcolor="#f8f6f0">
  <table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_01.jpg" width="500" height="226" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_02.jpg" width="76" height="30" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_03.jpg" width="345" height="30" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_04.jpg" width="79" height="30" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_05.jpg" width="76" height="73" alt=""></td>
      <td valign="top" style="background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;" width="345" height="73">
        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF">
          <tr>
            <td valign="top" style="background: #fff;">
              @if ($destination->travel_type == "private")
              <span style="font-family: 'Arial'; text-transform: uppercase; font-size: 18px; color: #c59d3d; line-height: 35px; margin: 0px;">Detination</span>
              <span style="font-family: 'Arial'; text-transform: uppercase; font-size: 18px; color: #515c9f; line-height: 25px; margin: 0px;">Oslo</span>
              @else 
              <span style="font-family: 'Arial'; text-transform: uppercase; font-size: 18px; color: #c59d3d; line-height: 35px; margin: 0px;">Event & Group Travel</span>
              @endif
            </td>
            <td valign="top">
              <p style="font-family: 'Arial'; font-size: 14px; color: #5f6062; line-height: 25px; margin: 0px; text-align: right;"></p>
            </td>
          </tr>        
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; text-transform: uppercase; font-size: 14px; color: #afafaf; line-height: 20px; margin: 0px;">thank you</p>
              <p style="font-family: 'Arial'; text-transform: uppercase; font-size: 14px; color: #afafaf; line-height: 20px; margin: 0px;">for your request</p>
            </td>            
          </tr>
        </table>
      </td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_07.jpg" width="79" height="73" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_23.jpg" width="76" height="34" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_24.jpg" width="345" height="34" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_25.jpg" width="79" height="34" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_08.jpg" width="76" height="171" alt=""></td>
      <td valign="top" style="background:#FFF;" width="345" height="171">
        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#FFF">
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Service</p>
            </td>
            <td valign="top"> 
              @if ($destination->travel_type == "private")
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">Oslo Destination</p>              
              @else
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">Event & Group Travel</p>              
              @endif
            </td>
          </tr>
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Request No</p>
            </td>
            <td valign="top">
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">{{$destination->id}}</p>
            </td>
          </tr> 
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Email</p>
            </td>
            <td valign="top">
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">{{$destination->email}}</p>
            </td>
          </tr>                    
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Phone</p>
            </td>
            <td valign="top">
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: right;">{{$destination->phone}}</p>
            </td>
          </tr>
          <tr>
            <td valign="top" style="background: #fff;">
              <p style="font-family: 'Arial'; font-size: 12px; color: #c59d3d; line-height: 28px; margin: 0px;">Comments</p>
            </td>            
          </tr>  
          <tr>
            <td valign="top" colspan="2">
              <p style="font-family: 'Arial'; font-size: 12px; color: #afafaf; line-height: 28px; margin: 0px; text-align: left;">{{$destination->comments}}</p>
            </td>
          </tr>            
        </table>
      </td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_10.jpg" width="79" height="171" alt=""></td>
    </tr>    
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_11.jpg" width="76" height="27" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_12.jpg" width="345" height="27" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_13.jpg" width="79" height="27" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_14.jpg" width="76" height="111" alt=""></td>
      <td valign="top" width="345" height="111" style="text-align: center; background: #FFF;padding: 0px; margin: 0px; outline: none; border: none;">
        <p style="font-family: 'Arial'; font-size: 12px; color: #5f6062; line-height: 16px; margin: 0px;">
          <span style="color: #c29734;">Hello {{$destination->first_name}} {{$destination->last_name}}, </span>
          <br>Thank you for your request. Our team will get in touch shortly. We look forward to have you on board.</p>
      </td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_16.jpg" width="79" height="111" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_17.jpg" width="76" height="116" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_18.jpg" width="345" height="116" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_19.jpg" width="79" height="116" alt=""></td>
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
              <p style="font-family: 'Arial';font-size: 18px; color: #c29734; line-height: 16px; margin: 10px 0px 0px 0px; text-align: right;">{{$destination->total_cost}}€</p>
            </td>
          </tr>                    
        </table>
      </td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_22.jpg" width="79" height="41" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_23.jpg" width="76" height="34" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_24.jpg" width="345" height="34" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_25.jpg" width="79" height="34" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_26.jpg" width="76" height="29" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_27.jpg" width="345" height="29" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_28.jpg" width="79" height="29" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_29.jpg" width="76" height="46" alt=""></td>
      <td valign="top" style="background:#FFF;">
        <a style="background: #c29734; color: #FFF; text-transform: uppercase; font-family: 'Arial'; font-size: 11px; font-weight: bold;display: block; margin: 5px auto 0px; width: 95%; text-align: center; padding: 10px 0px; text-decoration: none;" href="" target="_blank">Confirm & Pay</a>	
      </td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_31.jpg" width="79" height="46" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_32.jpg" width="76" height="42" alt=""></td>
      <td valign="top" style="background:#FFF;">
        <a style="background: #47529b; color: #FFF; text-transform: uppercase; font-family: 'Arial'; font-size: 11px; font-weight: bold;display: block; margin: 5px auto 0px; width: 95%; text-align: center; padding: 10px 0px; text-decoration: none;" href="" target="_blank">CONFIRM & ADD EXTRA SERVICE</a></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_34.jpg" width="79" height="42" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_35.jpg" width="76" height="36" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_36.jpg" width="345" height="36" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_37.jpg" width="79" height="36" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_38.jpg" width="76" height="53" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_39.jpg" width="345" height="53" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_40.jpg" width="79" height="53" alt=""></td>
    </tr>
    <tr>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_41.jpg" width="76" height="46" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_42.jpg" width="345" height="46" alt=""></td>
      <td valign="top">
        <img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_43.jpg" width="79" height="46" alt=""></td>
    </tr>
    <tr>
      <td colspan="3">
        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" background="#f8f6f0">
          <tr>
            <td valign="top" width="166" height="38" style="background: #f8f6f0;padding: 0px; margin: 0px; outline: none; border: none;"></td>
            <td valign="top">
              <a href="" target="_blank"><img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_46.jpg"
                width="33" height="38" alt="Facebook"></a>
            </td>
            <td valign="top">
              <a href="" target="_blank"><img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_47.jpg"
                width="34" height="38" alt="Instagram"></a>
            </td>
            <td valign="top">
              <a href="" target="_blank"><img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_48.jpg"
                width="34" height="38" alt="Google Plus"></a>
            </td>
            <td valign="top">
              <a href="" target="_blank"><img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_49.jpg"
                width="33" height="38" alt="LinkedIn"></a>
            </td>
            <td valign="top">
              <a href="" target="_blank"><img style="display:block; margin:0px; padding:0px; outline:none; border:none;" src="/assets/images/template2_50.jpg"
                width="35" height="38" alt="Youtube"></a>
            </td>
            <td valign="top" width="165" height="38" style="background: #f8f6f0;padding: 0px; margin: 0px; outline: none; border: none;"></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="3" valign="top" width="500" height="31" style="background: #f8f6f0;padding: 0px; margin: 0px; outline: none; border: none;"></td>
    </tr>
  </table>
  </body>
</html>