<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
function PHPmail($receiver = "", $subject = "", $message = "", $attachment = "")
{
    $mail = new PHPMailer(false);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                 //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = EMAIL_USERNAME;                     //SMTP username
        $mail->Password   = EMAIL_PASSWORD;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(EMAIL_USERNAME, EMAIL_NAME);

        // Addreas
        $mail->addAddress($receiver);

        //Attachments
        if (!empty($attachment)) {
            $mail->addAttachment($attachment);
        }

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function PHPmailVerifikasi($nama = "", $link = "")
{
    return '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>E-LAPOR | Aktifasi Akun E-Lapor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
        href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900&display=swap"
        rel="stylesheet"
        />
    </head>
    <body style="margin: 0; padding: 0; box-sizing: border-box">
        <table align="center" cellpadding="0" cellspacing="0" width="95%">
        <tr>
            <td align="center">
            <table
                align="center"
                cellpadding="0"
                cellspacing="0"
                width="600"
                style="border-spacing: 2px 5px"
                bgcolor="#fff"
            >
                <tr>
                <td align="center" style="padding: 5px 5px 5px 5px">
                    <a href="' . BaseURL() . '" target="_blank">
                    <img src="https://i2.wp.com/www.agilecampus.org/wp-content/uploads/2021/12/Screenshot-2021-12-30-at-15.40.57.png?fit=700%2C192&ssl=1" alt="Logo" style="width:300px; margin: 30px 0px 30px 0px;
                    border:0;"/>
                    </a>
                </td>
                </tr>
                <tr>
                <td bgcolor="#fff">
                    <table cellpadding="0" cellspacing="0" width="100%%">
                    <tr>
                        <td
                        style="
                            padding: 10px 0 10px 0;
                            font-family: Nunito, sans-serif;
                            font-size: 20px;
                            font-weight: 900;
                        "
                        >
                        Aktifasi Akun E-Lapor Politeknik Negeri Jember
                        </td>
                    </tr>
                    </table>
                </td>
                </tr>
                <tr>
                <td bgcolor="#fff">
                    <table cellpadding="0" cellspacing="0" width="100%%">
                    <tr>
                        <td
                        style="
                            padding: 20px 0 20px 0;
                            font-family: Nunito, sans-serif;
                            font-size: 16px;
                        "
                        >
                        Hi, <span id="name">' . $nama . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td
                        style="
                            padding: 0;
                            font-family: Nunito, sans-serif;
                            font-size: 16px;
                        "
                        >
                        Terima kasih telah mendaftar. Mohon konfirmasi email ini
                        untuk mengaktifkan akun E-Lapor Anda.
                        </td>
                    </tr>
                    <tr>
                        <td
                        style="
                            padding: 20px 0 20px 0;
                            font-family: Nunito, sans-serif;
                            font-size: 16px;
                            text-align: center;
                        "
                        >
                        <a
                            href="' . $link . '"
                            style="
                            background-color: #134467;
                            border: none;
                            color: white;
                            padding: 15px 40px;
                            text-align: center;
                            display: inline-block;
                            font-family: Nunito, sans-serif;
                            font-size: 18px;
                            font-weight: bold;
                            cursor: pointer;
                            text-decoration: none;
                            "
                        >
                            Konfimasi Email
                        </a>
                        </td>
                    </tr>
                    <tr>
                        <td
                        style="
                            padding: 0;
                            font-family: Nunito, sans-serif;
                            font-size: 16px;
                        "
                        >
                        Jika Anda kesulitan mengklik tombol "Konfirmasi Email",
                        copy dan paste URL di bawah ke dalam browser Anda:
                        <p id="url">' . $link . '</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                        style="
                            padding: 50px 0;
                            font-family: Nunito, sans-serif;
                            font-size: 16px;
                        "
                        >
                        Hormat Kami,
                        <p>Politeknik Negeri Jember</p>
                        </td>
                    </tr>
                    </table>
                </td>
                </tr>
            </table>
            </td>
        </tr>
        </table>
    </body>
    </html>
    ';
}
