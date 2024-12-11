<?php

namespace App\Service\Handlers;

use App\Service\AbstractCommentHandler;

class SpamCheckHandler extends AbstractCommentHandler
{
    public function handle(string $comment): void
    {
        // Example: Basic spam keyword check
        $spamKeywords = ['buy now', 'free money', 'click here'];

        foreach ($spamKeywords as $keyword) {
            if (stripos($comment, $keyword) !== false) {
                throw new \InvalidArgumentException('Your comment contains spam.');
            }
        }

        parent::handle($comment);
    }
}
