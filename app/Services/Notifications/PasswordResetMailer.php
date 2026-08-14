<?php

namespace App\Services\Notifications;

use App\Core\Config;

/**
 * Envoie le lien permettant de choisir un nouveau mot de passe.
 */
class PasswordResetMailer
{
    public function send(string $email, string $pseudo, string $token): void
    {
        $email = $this->cleanHeaderValue($email);
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return;
        }

        $siteUrl = rtrim((string) Config::get('notifications.site_url', 'https://escaperpg.com'), '/');
        $resetUrl = $siteUrl . '/reset-password/' . rawurlencode($token);
        $body = implode("\n", [
            'Bonjour ' . trim($pseudo) . ',',
            '',
            'Une demande de réinitialisation de votre mot de passe EscapeRPG a été reçue.',
            'Pour choisir un nouveau mot de passe, ouvrez le lien suivant :',
            $resetUrl,
            '',
            'Ce lien expire dans une heure et ne peut être utilisé qu’une fois.',
            'Si vous n’êtes pas à l’origine de cette demande, ignorez simplement cet email.',
        ]);

        $this->sendMail($email, 'Réinitialisez votre mot de passe EscapeRPG', $body);
    }

    private function sendMail(string $to, string $subject, string $body): void
    {
        if (!function_exists('mail')) {
            error_log('EscapeRPG password reset mail failed: mail() is unavailable.');
            return;
        }

        $fromEmail = $this->cleanHeaderValue((string) Config::get('notifications.from_email', 'no-reply@escaperpg.com'));
        $fromName = $this->cleanHeaderValue((string) Config::get('notifications.from_name', 'EscapeRPG'));
        $headers = [
            'From' => mb_encode_mimeheader($fromName, 'UTF-8') . ' <' . $fromEmail . '>',
            'Reply-To' => $fromEmail,
            'MIME-Version' => '1.0',
            'Content-Type' => 'text/plain; charset=UTF-8',
            'Content-Transfer-Encoding' => '8bit',
        ];

        if (!@mail($to, mb_encode_mimeheader($subject, 'UTF-8'), $body, $headers)) {
            error_log('EscapeRPG password reset mail failed for: ' . $to);
        }
    }

    private function cleanHeaderValue(string $value): string
    {
        return trim(str_replace(["\r", "\n"], '', $value));
    }
}
