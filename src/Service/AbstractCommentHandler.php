<?php

namespace App\Service;

abstract class AbstractCommentHandler implements CommentHandlerInterface
{
    private ?CommentHandlerInterface $nextHandler = null;

    public function setNext(CommentHandlerInterface $next): CommentHandlerInterface
    {
        $this->nextHandler = $next;
        return $next;
    }

    public function handle(string $comment): void
    {
        if ($this->nextHandler) {
            $this->nextHandler->handle($comment);
        }
    }
}
