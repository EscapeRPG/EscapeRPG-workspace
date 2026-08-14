<?php

namespace App\Services\Notifications;

use App\Core\Config;

/**
 * Envoie au nouveau membre le lien permettant d'activer son compte.
 */
class MemberActivationMailer
{
    public function send(string $email, string $pseudo, string $token): void
    {
        $email = $this->cleanHeaderValue($email);
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return;
        }

        $siteUrl = rtrim((string) Config::get('notifications.site_url', 'https://escaperpg.com'), '/');
        $activationUrl = $siteUrl . '/activate-account/' . rawurlencode($token);
        $body = implode("\n", [
            'Bonjour ' . trim($pseudo) . ',',
            '',
            'Merci de votre inscription sur EscapeRPG.',
            'Pour activer votre compte, ouvrez le lien suivant puis confirmez votre adresse email :',
            $activationUrl,
            '',
            'Ce lien expire dans 24 heures et ne peut être utilisé qu’une fois.',
            'Si vous n’êtes pas à l’origine de cette inscription, ignorez simplement cet email.',
        ]);

        $this->sendMail($email, 'Activez votre compte EscapeRPG', $body);
    }

    private function sendMail(string $to, string $subject, string $body): void
    {
        if (!function_exists('mail')) {
            error_log('EscapeRPG member activation mail failed: mail() is unavailable.');
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
            error_log('EscapeRPG member activation mail failed for: ' . $to);
        }
    }

    private function cleanHeaderValue(string $value): string
    {
        return trim(str_replace(["\r", "\n"], '', $value));
    }
}
