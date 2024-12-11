<?php

namespace App\Service\Handlers;

use App\Service\AbstractCommentHandler;

class WebAddressCheckHandler extends AbstractCommentHandler
{
    public function handle(string $comment): void
    {
        // Regex to match common web addresses
        $pattern = '/\b(?:https?:\/\/|www\.)[^\s<]+/i';

        if (preg_match($pattern, $comment)) {
            throw new \InvalidArgumentException('Your comment contains web addresses, which are not allowed.');
        }

        parent::handle($comment);
    }
}
