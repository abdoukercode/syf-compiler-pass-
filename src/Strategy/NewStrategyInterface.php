<?php

namespace App\Strategy;
 
interface NewStrategyInterface
{
    public const SERVICE_TAG = 'message_strategy';
    public const MESSAGE_KEY = 'message';
 
    public function isSendable(string $type, iterable $payload = []): bool;
    public function send(iterable $payload = []): void;
}