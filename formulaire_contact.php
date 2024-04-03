<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

// Vérification de la méthode de requête
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecte des données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $telephone = htmlspecialchars($_POST['telephone']);
    $demande = htmlspecialchars($_POST['demande']);

    // Vérification de l'e-mail
    if (!$email) {
        echo "L'adresse e-mail saisie est invalide.";
        exit;
    }

    // Vérification des modèles de validation
    $nom_pattern = "/^[a-zA-ZÀ-ÿ\s'-]+$/"; // Lettres, espaces, apostrophes et tirets
    $prenom_pattern = "/^[a-zA-ZÀ-ÿ\s'-]+$/"; // Lettres, espaces, apostrophes et tirets
    $telephone_pattern = "/^\d{10}$/"; // Format de numéro de téléphone (10 chiffres)
    $demande_pattern = "/^.{10,}$/"; // Au moins 10 caractères pour la demande

    // Vérification des champs
    if (preg_match($nom_pattern, $nom) && preg_match($prenom_pattern, $prenom) && preg_match($telephone_pattern, $telephone) && preg_match($demande_pattern, $demande)) {
        // Création de l'objet PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Paramètres du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'localhost'; 
            $mail->SMTPAuth = false;
            $mail->Port = 1025; 

            // Destinataire
            $mail->setFrom('votre_email@example.com', 'Votre restaurant The District'); 
            $mail->addAddress($email); // Ajout de l'e-mail de l'utilisateur

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
    } else {
        echo "Veuillez remplir correctement tous les champs.";
    }
}
?>
