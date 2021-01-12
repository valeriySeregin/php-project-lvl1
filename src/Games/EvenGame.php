<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Engine\startGame;

const GAME_RULE = 'Answer \'yes\' if given number is even and \'no\' otherwise';

function start(): void
{
    startGame(GAME_RULE, fn() => generateQuestionAndAnswer());
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function generateQuestionAndAnswer(): array
{
    $question = rand(0, 1000);
    $answer = isEven($question) ? 'yes' : 'no';

    return [$question, $answer];
}
