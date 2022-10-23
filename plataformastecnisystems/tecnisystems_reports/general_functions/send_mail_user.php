<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'Exception.php';
  require 'PHPMailer.php';
  require 'SMTP.php';

function send_mail_info_user($to,$message,$subject)
{
   
    $mail = new PHPMailer(true);                              
    try {
        //$mail->SMTPDebug = 4;                               // Habilitar el debug
     
        $mail->isSMTP();                                      // Usar SMTP
        $mail->Host = 'plataformastecnisystems.com';  // Especificar el servidor SMTP reemplazando por el nombre del servidor donde esta alojada su cuenta
        $mail->SMTPAuth = true;                               // Habilitar autenticacion SMTP
        $mail->Username = 'sendmail@plataformastecnisystems.com';                 // Nombre de usuario SMTP donde debe ir la cuenta de correo a utilizar para el envio
        $mail->Password = 'Qboz130MilOfiuco';                           // Clave SMTP donde debe ir la clave de la cuenta de correo a utilizar para el envio
        $mail->SMTPSecure = 'ssl';                            // Habilitar encriptacion
        $mail->Port = 465;                                    // Puerto SMTP                     
        $mail->Timeout       =   30;
        $mail->AuthType = 'LOGIN';
     
        //Recipients   
     
        $mail->setFrom('sendmail@plataformastecnisystems.com');     //Direccion de correo remitente (DEBE SER EL MISMO "Username")
        $mail->addAddress($to);     // Agregar el destinatario
        //$mail->addReplyTo('sendmail@plataformastecnisystems.com');     //Direccion de correo para respuestas     
     
        //Content
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->addCustomHeader('Mime-Version','1.0');
        $mail->addCustomHeader('Content-Type: text/html; charset=ISO-8859-1');
        $mail->Subject = $subject;
        $mail->Body    = "
    	<body style='width: 100vw; height: 100vh; display: block; align-items: center; justify-content: center;'>
    		<div id='message_tecnisystem' style='width: 500px; display: block; position: relative; align-items: center; background: #f0c91d; padding: 15px; box-sizing: border-box; z-index: 100'>
    			<div id='content_message_tecnisystem' style='display: block; position: relative; padding: 15px; justify-content: center; align-items: center; text-align: justify; z-index: 101; box-sizing: border-box'>
    
    				<br><img src='https://plataformastecnisystems.com/imgs/logo.png' alt='logo tecnisystems'><br>
    				<p>".$subject."<br><br>".$message."</p>
    				<br>
    
    				<div id='contact_info'>
    					<span><b>Teléfono 1:</b> 3227255829 </span>
    					<br>
    					<span><b>Teléfono 2:</b> 3106281704 </span>
    					<br>
    					<span><b>Email:</b>tecnisystemssecop@gmail.com</span>
    				</div>
    				<span style='font-size: .8em; color: rgb(50,50,50)'>Mensaje automatizado enviado por favor no responder este mensaje</span>
    				<br>
    				<span style='font-size: .8em; color: rgb(50,50,50)'><a href='https://plataformastecnisystems.com.co/'> Tecnisystems.com </a></span>
    				<br>
    			</div>
    			<img id='ornament' style='width: 100px; height: 100px; position: absolute; bottom: 0; left: 0; z-index: 99;' src='https://plataformastecnisystems.com/imgs/ornament100x100.png' alt='adorno plataformastecnisystems.com'>
    			<br>
    		</div>
    	</body>
    ";
    
        if ($mail->send())
        {
            //echo $to."\n\n".$subject."\n\n".$msn."\n\n".$headers."\n\n".IMGS;
            return true;
        } else {
            return false;
        }
            
     
     } catch (Exception $e) {
        return false;
     }
}
