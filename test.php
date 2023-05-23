<?php
// Définir les paramètres SMTP et smtp_port
ini_set('SMTP', 'smtp.gmail.com');
ini_set('smtp_port', '587');

// Définir les identifiants d'authentification
$username = 'votre_adresse_email@gmail.com';
$password = 'votre_mot_de_passe';

$to      = 'ghassengasmi34@gmail.com';
$subject = 'le sujet';
$message = 'le contenu du message';
$headers = array(
    'From' => 'webmaster@example.com',
    'Reply-To' => 'webmaster@example.com',
    'X-Mailer' => 'PHP/' . phpversion()
);

// Définir les paramètres d'authentification SMTP
ini_set('smtp_auth', true);
ini_set('username', $username);
ini_set('password', $password);
ini_set('smtp_secure', 'tls');

// Créer le contexte de flux
$context = stream_context_create([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
]);

// Ouvrir la connexion SMTP
$smtp = stream_socket_client('tls://smtp.gmail.com:587', $errno, $errstr, 10, STREAM_CLIENT_CONNECT, $context);

// Lire la réponse du serveur SMTP
$response = fread($smtp, 4096);
if(strpos($response, '220') === false) {
    echo "Erreur : le serveur SMTP n'a pas répondu correctement.\n";
    exit;
}

// Envoyer la commande EHLO pour initialiser la connexion
fwrite($smtp, 'EHLO localhost'."\r\n");
$response = fread($smtp, 4096);

// Envoyer la commande AUTH LOGIN pour commencer l'authentification
fwrite($smtp, 'AUTH LOGIN'."\r\n");
$response = fread($smtp, 4096);

// Envoyer le nom d'utilisateur encodé en base64
$username_enc = base64_encode($username);
fwrite($smtp, $username_enc."\r\n");
$response = fread($smtp, 4096);

// Envoyer le mot de passe encodé en base64
$password_enc = base64_encode($password);
fwrite($smtp, $password_enc."\r\n");
$response = fread($smtp, 4096);

// Envoyer la commande MAIL FROM pour définir l'adresse de l'expéditeur
fwrite($smtp, 'MAIL FROM: <'.$username.'>'."\r\n");
$response = fread($smtp, 4096);

// Envoyer la commande RCPT TO pour définir l'adresse du destinataire
fwrite($smtp, 'RCPT TO: <'.$to.'>'."\r\n");
$response = fread($smtp, 4096);

// Envoyer la commande DATA pour commencer l'envoi du message
fwrite($smtp, 'DATA'."\r\n");
$response = fread($smtp, 4096);

// Envoyer l'en-tête et le corps du message
fwrite($smtp, implode("\r\n", $headers)."\r\n\r\n");
fwrite($smtp, $message."\r\n");

// Envoyer la commande QUIT pour terminer la connexion
fwrite($smtp, 'QUIT'."\r\n");
$response = fread($smtp, 4096);

// Fermer la connexion SMTP
fclose($smtp);
?>

