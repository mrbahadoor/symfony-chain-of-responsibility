<?php

namespace App\Service\Handlers;

use App\Service\AbstractCommentHandler;

class LengthCheckHandler extends AbstractCommentHandler
{
    public function handle(string $comment): void
    {
        if (strlen($comment) < 10) {
            throw new \InvalidArgumentException('Comment is too short.');
        }

        parent::handle($comment);
    }
}
