<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require $root.'/api/composer/vendor/autoload.php';


/**
* Classe qui permet l'envoi de mails
*/
class Mail extends PHPMailer
{
  /**
  * Objet Mail
  * @var object $mail
  */
  private static $mail = null;
  public function __construct(){
    self::$mail = new PHPMailer(true);
    self::$mail->SMTPDebug = 2;
    self::$mail->isSMTP();
    self::$mail->Host = 'smtp.gmail.com';
    self::$mail->SMTPAuth = true;
    self::$mail->Username = 'snworent@gmail.com';
    self::$mail->Password = 'BTSSIO2019';
    self::$mail->SMTPSecure = 'tls';
    self::$mail->Port = 587;
  }

  /**
  * Permet d'envoyer un mail à un nouvel inscrit
  * @param string $id
  * @param string $mail
  * @param string $nom
  */
  public function inscription($id, $mail, $nom){

    self::$mail->setFrom('snowrent@gmail.com', 'SnowRent');
    self::$mail->addAddress($mail, $nom);
    self::$mail->addBCC('vic20016@gmail.com');


    self::$mail->isHTML(true);
    self::$mail->Subject = 'Confirmez votre adresse mail';
    self::$mail->Body    = '<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
   <head>
      <title></title>
      <!--[if !mso]><!-- -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--<![endif]-->
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style type="text/css">  #outlook a { padding: 0; }  .ReadMsgBody { width: 100%; }  .ExternalClass { width: 100%; }  .ExternalClass * { line-height:100%; }  body { margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }  table, td { border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }  img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }  p { display: block; margin: 13px 0; }</style>
      <!--[if !mso]><!-->
      <style type="text/css">  @media only screen and (max-width:480px) {    @-ms-viewport { width:320px; }    @viewport { width:320px; }  }</style>
      <!--<![endif]--><!--[if mso]>
      <xml>
         <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
         </o:OfficeDocumentSettings>
      </xml>
      <![endif]--><!--[if lte mso 11]>
      <style type="text/css">  .outlook-group-fix {    width:100% !important;  }</style>
      <![endif]--><!--[if !mso]><!-->
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">
      <style type="text/css">        @import url(https://fonts.googleapis.com/css?family=Ubuntu);    </style>
      <!--<![endif]-->
      <style type="text/css">  @media only screen and (min-width:480px) {    .mj-column-per-100 { width:100%!important; }  }</style>
   </head>
   <body style="background: #FFFFFF;">
      <div class="mj-container" style="background-color:#FFFFFF;">
         <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:600px;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                        <tbody>
                           <tr>
                              <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
                                 <!--[if mso | IE]>
                                 <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td style="vertical-align:top;width:600px;">
                                          <![endif]-->
                                          <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                             <table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:top;" width="100%" border="0">
                                                <tbody>
                                                   <tr>
                                                      <td style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 0px;" align="center">
                                                         <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;" align="center" border="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td style="width:258px;"><img alt height="auto" src="http://206.189.30.61/api/Mail/images/logo.jpg" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;" width="258"></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <!--[if mso | IE]>
                                       </td>
                                    </tr>
                                 </table>
                                 <![endif]-->
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <!--[if mso | IE]>
               </td>
            </tr>
         </table>
         <![endif]-->      <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:600px;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                        <tbody>
                           <tr>
                              <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:27px 0px 27px 0px;">
                                 <!--[if mso | IE]>
                                 <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td style="vertical-align:top;width:600px;">
                                          <![endif]-->
                                          <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                             <table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:top;" width="100%" border="0">
                                                <tbody>
                                                   <tr>
                                                      <td style="word-wrap:break-word;font-size:0px;padding:15px 15px 15px 15px;" align="center">
                                                         <div style="cursor:auto;color:#000000;font-family:Ubuntu, sans-serif;font-size:11px;line-height:1.5;text-align:center;">
                                                            <p><span style="font-size:12px;">Nous avons bien pris en compte votre inscription sur le site <strong>SnowRent, </strong>cliquez sur le lien ci-dessous pour confirmer votre adresse email.</span></p>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <!--[if mso | IE]>
                                       </td>
                                    </tr>
                                 </table>
                                 <![endif]-->
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <!--[if mso | IE]>
               </td>
            </tr>
         </table>
         <![endif]-->      <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:600px;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                        <tbody>
                           <tr>
                              <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
                                 <!--[if mso | IE]>
                                 <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td style="vertical-align:top;width:600px;">
                                          <![endif]-->
                                          <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                             <table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:top;" width="100%" border="0">
                                                <tbody>
                                                   <tr>
                                                      <td style="word-wrap:break-word;font-size:0px;padding:20px 20px 20px 20px;" align="center">
                                                         <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:separate;width:auto;" align="center" border="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td style="border:0px solid #000;border-radius:4px;color:#fff;cursor:auto;padding:9px 26px;" align="center" valign="middle" bgcolor="#007BFF"><a href="http://cr-devtux16.leschartreux.net/~v.durand/inscription/completeprofil/mailverif.php?token='.$id.'" style="text-decoration:none;background:#007BFF;color:#fff;font-family:Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif;font-size:13px;font-weight:normal;line-height:120%;text-transform:none;margin:0px;" target="_blank">Confirmer mon adresse mail !</a></td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <!--[if mso | IE]>
                                       </td>
                                    </tr>
                                 </table>
                                 <![endif]-->
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <!--[if mso | IE]>
               </td>
            </tr>
         </table>
         <![endif]-->      <!--[if mso | IE]>
         <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">
            <tr>
               <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
                  <![endif]-->
                  <div style="margin:0px auto;max-width:600px;">
                     <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                        <tbody>
                           <tr>
                              <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
                                 <!--[if mso | IE]>
                                 <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td style="vertical-align:top;width:600px;">
                                          <![endif]-->
                                          <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                             <table role="presentation" cellpadding="0" cellspacing="0" style="vertical-align:top;" width="100%" border="0">
                                                <tbody>
                                                   <tr>
                                                      <td style="word-wrap:break-word;font-size:0px;padding:30px 10px 10px 10px;" align="center">
                                                         <div>
                                                            <!--[if mso | IE]>
                                                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" align="undefined">
                                                               <tr>
                                                                  <td>
                                                                     <![endif]-->
                                                                     <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;" align="center" border="0">
                                                                        <tbody>
                                                                           <tr>
                                                                              <td style="padding:4px;vertical-align:middle;">
                                                                                 <table role="presentation" cellpadding="0" cellspacing="0" style="background:none;border-radius:3px;width:22px;" border="0">
                                                                                    <tbody>
                                                                                       <tr>
                                                                                          <td style="font-size:0px;vertical-align:middle;width:22px;height:22px;"><a href="#"><img alt="facebook" height="22" src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/simplegrey/facebook.png" style="display:block;border-radius:3px;" width="22"></a></td>
                                                                                       </tr>
                                                                                    </tbody>
                                                                                 </table>
                                                                              </td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                     <!--[if mso | IE]>
                                                                  </td>
                                                                  <td>
                                                                     <![endif]-->
                                                                     <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;" align="center" border="0">
                                                                        <tbody>
                                                                           <tr>
                                                                              <td style="padding:4px;vertical-align:middle;">
                                                                                 <table role="presentation" cellpadding="0" cellspacing="0" style="background:none;border-radius:3px;width:22px;" border="0">
                                                                                    <tbody>
                                                                                       <tr>
                                                                                          <td style="font-size:0px;vertical-align:middle;width:22px;height:22px;"><a href="#"><img alt="twitter" height="22" src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/simplegrey/twitter.png" style="display:block;border-radius:3px;" width="22"></a></td>
                                                                                       </tr>
                                                                                    </tbody>
                                                                                 </table>
                                                                              </td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                     <!--[if mso | IE]>
                                                                  </td>
                                                                  <td>
                                                                     <![endif]-->
                                                                     <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;" align="center" border="0">
                                                                        <tbody>
                                                                           <tr>
                                                                              <td style="padding:4px;vertical-align:middle;">
                                                                                 <table role="presentation" cellpadding="0" cellspacing="0" style="background:none;border-radius:3px;width:22px;" border="0">
                                                                                    <tbody>
                                                                                       <tr>
                                                                                          <td style="font-size:0px;vertical-align:middle;width:22px;height:22px;"><a href="#"><img alt="google" height="22" src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/simplegrey/google-plus.png" style="display:block;border-radius:3px;" width="22"></a></td>
                                                                                       </tr>
                                                                                    </tbody>
                                                                                 </table>
                                                                              </td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                     <!--[if mso | IE]>
                                                                  </td>
                                                                  <td>
                                                                     <![endif]-->
                                                                     <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;" align="center" border="0">
                                                                        <tbody>
                                                                           <tr>
                                                                              <td style="padding:4px;vertical-align:middle;">
                                                                                 <table role="presentation" cellpadding="0" cellspacing="0" style="background:none;border-radius:3px;width:22px;" border="0">
                                                                                    <tbody>
                                                                                       <tr>
                                                                                          <td style="font-size:0px;vertical-align:middle;width:22px;height:22px;"><a href="#"><img alt="linkedin" height="22" src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/simplegrey/linkedin.png" style="display:block;border-radius:3px;" width="22"></a></td>
                                                                                       </tr>
                                                                                    </tbody>
                                                                                 </table>
                                                                              </td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                     <!--[if mso | IE]>
                                                                  </td>
                                                               </tr>
                                                            </table>
                                                            <![endif]-->
                                                         </div>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <!--[if mso | IE]>
                                       </td>
                                    </tr>
                                 </table>
                                 <![endif]-->
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <!--[if mso | IE]>
               </td>
            </tr>
         </table>
         <![endif]-->
      </div>
   </body>
</html>';
      self::$mail->AltBody = 'http://cr-devtux16.leschartreux.net/~v.durand/inscription/completeprofil/mailverif.php?token='.$id;

      if (!self::$mail->send()) {
        echo '<div class="alert alert-danger" role="alert">
        Le serveur actuel ne présente pas de serveur DNS, merci de corriger ce problème afin de profiter de toute les fonctionnalités de ce site.
        </div>';
        echo "Mailer Error: " . self::$mail->ErrorInfo;
        //echo self::$mail->AltBody;
      } else {
        //echo "Message sent!";
      }
    }
  }
  ?>
