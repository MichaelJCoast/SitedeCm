<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="stylesheet" href="/assets/stylesheets/email_media_queries.css" data-immutable="true">
  <!-- If you delete this meta tag, Half Life 3 will never be released. -->
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <style>
.button-19 {
  appearance: button;
  background-color: #b91c1c;
  border: solid transparent;
  border-radius: 16px;
  border-width: 0 0 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: din-round,sans-serif;
  font-size: 15px;
  font-weight: 700;
  letter-spacing: .8px;
  line-height: 20px;
  margin: 0;
  outline: none;
  overflow: visible;
  padding: 13px 16px;
  text-align: center;
  text-transform: uppercase;
  touch-action: manipulation;
  transform: translateZ(0);
  transition: filter .2s;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: middle;
  white-space: nowrap;
  width: 100%;
  text-decoration: none;
}

.button-19:after {
  background-clip: padding-box;
  background-color: #ef4444;
  border: solid transparent;
  border-radius: 16px;
  border-width: 0 0 4px;
  bottom: -4px;
  color: #FFFFFF;
  content: "";
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: -1;
}

.button-19:main,
.button-19:focus {
  user-select: auto;
}

.button-19:hover:not(:disabled) {
  filter: brightness(1.1);
  -webkit-filter: brightness(1.1);
}

.button-19:disabled {
  cursor: auto;
}

a, a:hover, a:focus, a:active {
    text-decoration: none;
    color: #FFFFFF;
 }
</style>
</head>

<body>
  <table class="wrapper" bgcolor="#ECEEF1" style="background-color:#ECEEF1;width:100%;">
    <tr>
      <td>
        <!-- HEADER -->
        <table class="head-wrap" style="margin: 0 auto;">
          <tr>
            <td></td>
            <td class="header container logo" style="font-family:Source Sans Pro, Helvetica, sans-serif;color:#6f6f6f;display:block;margin:0 auto;max-width:600px;padding:20px">
              <div class="content logo" style="display:block;margin:0 auto;max-width:650px;-webkit-font-smoothing:antialiased;padding:20px">
                <table>
                  <tr>
                    <td>
                      <img alt="necm logo" border="0" class="wistia-logo" height="46" src="https://user-images.githubusercontent.com/26013801/183935837-60d31df9-f593-4fd0-a5f5-57d89f548cb8.svg" width="200" style="display:block">
                    </td>
                  </tr>
                </table>
              </div>
            </td>
            <td></td>
          </tr>
        </table>
        <!-- /HEADER -->
        <!-- BODY -->
        <table class="body-wrap" style="margin:0 auto;margin-bottom: 80px;">
          <tr>
            <td></td>
            <td class="container transaction-mailer" bgcolor="#FFFFFF" style="font-family:Source Sans Pro, Helvetica, sans-serif;color:#6f6f6f;display:block;max-width:600px;margin:0 auto;padding:40px;border:1px solid #CED3D8;">
              <div class="content" style="display:block;margin:0 auto;max-width:650px;padding:20px;-webkit-font-smoothing:antialiased">
                <div class="receipt">
                  <div class="head">

                    <h1 class="light title" style="margin:0;padding:0;margin-bottom:20px;font-weight:700;line-height:130%;-webkit-font-smoothing:antialiased;margin-top:10px;color:#b91c1c;font-size:26px;text-align:left">Confirmação de Encomenda</h1>

                    <div class="account-item" style="margin:10px 0;font-size:18px">
                      <span class="light" style="padding-right:5px;color:#434343">Nome:</span>

                      <span class="item-detail" style="padding-right:5px;color:#434343">{{ $order->name }}</span>
                    </div>
                    <div class="account-item" style="margin:10px 0;font-size:18px">
                      <span class="light" style="padding-right:5px;color:#434343">E-mail:</span>

                      <span class="item-detail" style="padding-right:5px;color:#434343">{{ $order->email }}</span>
                    </div>
                  </div>
                  <div class="divider" style="margin-top:30px;padding-top:10px;border-top:1px solid #CCC">
                    <div class="message">
                      <p style="color:#434343;text-align:left;line-height:150%;padding:0;font-weight:400;font-size:18px">Entra em contacto via <strong>Instagram</strong> com o teu núcleo e junto connosco, vê a melhor altura para efetuares o pagamento depois de confirmares a encomenda abaixo.</p>
                    </div>
                  </div>
                  <div class="billing">
                    <div class="divider" style="margin-top:30px;padding-top:10px;border-top:1px solid #CCC"> <strong style="color:black;display:inline-block;font-size:18px;margin-bottom:5px;margin-top:5px">Encomenda</strong>

                      <p style="color:#434343;line-height:150%;text-align:left;padding:0;font-weight:400;font-size:18px;margin-bottom:5px;margin-top:5px">{{ $order->order }}</p>
                    </div>
                    <div class="divider" style="margin-top:30px;padding-top:10px;border-top:1px solid #CCC">
                      <div class="grand-total">
                        <strong style="color:black;display:inline-block;font-size:18px;margin-bottom:5px;margin-top:5px">Total</strong>

                        <strong class="total" style="margin-top:5px;color:black;display:inline-block;margin-bottom:5px;font-size:18px;float:right">{{ $order->total }}€</strong>
                      </div>
                    </div>
                  </div>
                  <div class="foot">
                    <br>
                      <a class="button-19" href="{{$order->verification_url}}" role="button">Confirma a tua Encomenda</a>
                  </div>
                </div>
              </div>
              <!-- /content -->
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </table>
        <!-- /BODY -->
      </td>
    </tr>
  </table>
  <!-- /wrapper -->

</body>

</html>

<!-- HTML !-->
