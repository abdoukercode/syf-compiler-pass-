<?php

namespace App\Strategy;


class Message
{
    private $strategies;
 
    public function addStrategy(NewStrategyInterface $strategy): void
    {
        $this->strategies[] = $strategy;
    }
 
    public function send(string $type, iterable $payload = []): void
    {
        /** @var NewStrategyInterface $strategy */
        foreach ($this->strategies as $strategy) {
            if ($strategy->isSendable($type, $payload)) {
                $strategy->send($payload);
 
                return;
            }
        }
    }
}