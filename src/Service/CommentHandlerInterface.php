<?php

namespace App\Service;

interface CommentHandlerInterface
{
    public function handle(string $comment): void;
    public function setNext(CommentHandlerInterface $next): CommentHandlerInterface;
}
