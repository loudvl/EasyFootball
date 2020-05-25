<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config/mailparam.php';
// Inclure le fichier swift_required.php localisé dans le répertoire swiftmailer5
require_once $_SERVER['DOCUMENT_ROOT'].'/swiftmailer5/lib/swift_required.php';

class EmailManager
{
    private static $mailer;
    public static function initMailer()
    {
        $transport = Swift_SmtpTransport::newInstance(EMAIL_SERVER, EMAIL_PORT, EMAIL_TRANS)->setUsername(EMAIL_USERNAME)->setPassword(EMAIL_PASSWORD);
        // On crée un nouvelle instance de mail en utilisant le transport créé précédemment
        self::$mailer = Swift_Mailer::newInstance($transport);
    }
    public static function sendEmail($to,$subject,$text)
    {
        try {
                // On crée un nouveau message
                $message = Swift_Message::newInstance();
                // Le sujet du message
                $message->setSubject($subject);
                // Qui envoie le message 
                $message->setFrom(array(EMAIL_USERNAME => EMAIL_USERNAME));
                // A qui on envoie le message
                $message->setTo(array($to));
                // On assigne le message et on dit de quel type. Dans notre exemple c'est du html
                $message->setBody($text,'text/html');
                // Maintenant il suffit d'envoyer le message
                $result = self::$mailer->send($message);
            }
        catch (Swift_TransportException $e)
            {
                echo "Problème d'envoi de message: ".$e->getMessage();
                return false;
                exit();
            }
            return true;
    }
}
?>