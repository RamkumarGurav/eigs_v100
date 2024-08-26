<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8" />

  <title><?= _project_name_ ?></title>

</head>

<body style="background-color:#c5d6db; padding:20px;">

  <div style="margin:10px auto; width:700px;">

    <table border="0" cellspacing="0" cellpadding="0" style=" background-color:#fff; padding:10px; margin-top:20px;"
      width="100%">
      <tr>
        <td
          style="padding:10px; font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif; color:#F90; font-size:24px; letter-spacing:0px; font-style:italic; border-bottom:2px solid #e2e2e2;text-align:center;">
          <a style="text-decoration:none; color:#1670e4;text-align:center;"><img style="width: 140px;"
              src="#mainsite#assets/images/logo.png"></a>
        </td>
      </tr>
      <tr>
        <td
          style="padding:10px; text-align:left; font-family:Arial, Helvetica, sans-serif; font-size:15px; border-bottom:1px solid #e2e2e2; line-height:29px;">
          Dear #admin#<br /> <span style="font-size:18px;font-weight:600;color:#333;"> #message#</span>




        </td>
      </tr>
      #mailData#
      <tr>
        <td
          style="background-color:#fff; border-top:1px solid #e2e2e2; padding:10px 10px 10px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333;">
          <p><strong>Thank you</strong></p>
          <p><?= _project_name_ ?></p>
        </td>
      </tr>

      <!--<tr>
      <td style="background-color:#fff; border-top:1px solid #e2e2e2; padding:10px 10px 10px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333;">
        <p><strong>Address to deliver the material is given below for your reference:</strong></p>
                
            </td>
    </tr>-->
    </table>
  </div>

</body>

</html>