<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collecte des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $demande = $_POST['demande'];

    // Envoi de l'e-mail de confirmation
    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'localhost'; 
        $mail->SMTPAuth = false;
        $mail->Port = 1025; 

        // Destinataire
        $mail->setFrom('votre_email@example.com', 'Votre restaurant The District'); 

        //CC & BBC
        $mail->addCC("cc@example.com");
        $mail->addBCC("bcc@exemple.com");

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Confirmation de réception de votre demande';

        // Construction du contenu HTML pour l'e-mail de confirmation
        $message = '
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Confirmation d\'envoi de demande</title>
            <style>
            body, h1, p {
                margin: 0;
                padding: 0;
            }
    
            body {
                font-family: Arial, sans-serif;
                background-color: #f3f3f3;
            }
    
            .container {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
    
            h1 {
                color: #333;
                text-align: center;
                margin-bottom: 20px;
            }
    
            p {
                color: #666;
                font-size: 16px;
                line-height: 1.6;
                margin-bottom: 20px;
            }
    
            .cta-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #ff5a5f;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
            }
    
            .cta-button:hover {
                background-color: #e60000;
            }
    
            .footer {
                margin-top: 20px;
                text-align: center;
                color: #999;
            }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Confirmation d\'envoi de demande</h1>
                <p>Bonjour ' . $nom . ' ' . $prenom . ',</p>
                <p>Votre demande a été envoyée avec succès. Nous vous remercions pour votre intérêt.</p>
                <p>Nous examinerons votre demande dans les plus brefs délais.</p>
                <p>Si vous avez des questions ou des préoccupations supplémentaires, n\'hésitez pas à nous contacter.</p>
                <p>Merci,</p>
                <p>L\'équipe du Restaurant The District</p>
            </div>
        </body>
        </html>';

        $mail->Body = $message;

        // Envoi de l'e-mail
        $mail->send();
        echo 'Votre demande a été envoyée avec succès.';

    } catch (Exception $e) {
        echo "Une erreur s'est produite lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
}
?>
