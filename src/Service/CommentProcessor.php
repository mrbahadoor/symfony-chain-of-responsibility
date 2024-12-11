<?php

namespace App\Service;

use App\Service\Handlers\SpamCheckHandler;
use App\Service\Handlers\LengthCheckHandler;
use App\Service\Handlers\WebAddressCheckHandler;

class CommentProcessor
{
    public function __construct(
        private readonly SpamCheckHandler $spamCheckHandler,
        private readonly LengthCheckHandler $lengthCheckHandler,
        private readonly WebAddressCheckHandler $webAddressCheckHandler
    ) {}

    public function process(string $comment): void
    {
        $this->spamCheckHandler
            ->setNext($this->lengthCheckHandler)
            ->setNext($this->webAddressCheckHandler)
        ;

        $this->spamCheckHandler->handle($comment);
    }
}
