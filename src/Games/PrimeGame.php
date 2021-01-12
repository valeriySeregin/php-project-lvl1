<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\Engine\startGame;

const GAME_RULE = 'Answer \'yes\' if given number is prime. Otherwise answer \'no\'' . PHP_EOL;

function start(): callable
{
    return startGame(GAME_RULE, fn() => generateQuestionAndAnswer());
}

function isPrime(int $num): bool
{
    if ($num === 1) {
        return false;
    }

    $divisibilityLimit = $num / 2;

    for ($i = 2; $i <= $divisibilityLimit; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function generateQuestionAndAnswer(): array
{
    $question = rand(1, 99);
    $answer = isPrime($question) ? 'yes' : 'no';

    return [$question, $answer];
}
