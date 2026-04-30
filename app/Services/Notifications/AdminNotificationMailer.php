<?php

namespace App\Services\Notifications;

use App\Core\Config;

/**
 * Envoie les notifications administrateur liées aux actions publiques.
 */
class AdminNotificationMailer
{
    public function notifyNewMember(string $pseudo): void
    {
        $pseudo = trim($pseudo);
        if ($pseudo === '') {
            return;
        }

        $this->send(
            'Nouveau membre EscapeRPG',
            "Un nouveau membre vient de s'inscrire sur EscapeRPG.\n\nPseudo : " . $pseudo
        );
    }

    public function notifyNewComment(string $pseudo, string $scenario, string $message): void
    {
        $pseudo = trim($pseudo);
        $scenario = trim($scenario);
        $message = trim($message);

        if ($pseudo === '' || $scenario === '' || $message === '') {
            return;
        }

        $this->send(
            'Nouveau commentaire EscapeRPG',
            implode("\n", [
                'Un nouveau commentaire a été ajouté sur EscapeRPG.',
                '',
                'Pseudo : ' . $pseudo,
                'Scénario : ' . $scenario,
                '',
                'Message :',
                $message,
            ])
        );
    }

    private function send(string $subject, string $body): void
    {
        $to = $this->cleanHeaderValue((string) Config::get('notifications.admin_email', ''));
        if ($to === '') {
            return;
        }

        if (!function_exists('mail')) {
            error_log('EscapeRPG admin notification mail failed: mail() is unavailable.');
            return;
        }

        $fromEmail = $this->cleanHeaderValue((string) Config::get('notifications.from_email', 'no-reply@escaperpg.com'));
        $fromName = $this->cleanHeaderValue((string) Config::get('notifications.from_name', 'EscapeRPG'));
        $encodedSubject = mb_encode_mimeheader($subject, 'UTF-8');
        $encodedFromName = mb_encode_mimeheader($fromName, 'UTF-8');

        $headers = [
            'From' => $encodedFromName . ' <' . $fromEmail . '>',
            'Reply-To' => $fromEmail,
            'MIME-Version' => '1.0',
            'Content-Type' => 'text/plain; charset=UTF-8',
            'Content-Transfer-Encoding' => '8bit',
        ];

        $sent = @mail($to, $encodedSubject, $body, $headers);
        if (!$sent) {
            error_log('EscapeRPG admin notification mail failed: ' . $subject);
        }
    }

    private function cleanHeaderValue(string $value): string
    {
        return trim(str_replace(["\r", "\n"], '', $value));
    }
}
