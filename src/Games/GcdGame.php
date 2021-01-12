<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Engine\startGame;

const GAME_RULE = 'Find the greates common divisor of given numbers' . PHP_EOL;

function start(): callable
{
    return startGame(GAME_RULE, fn() => generateQuestionAndAnswer());
}

function calculateGcd(int $firstNum, int $secondNum): mixed
{
    return $firstNum % $secondNum === 0 ? $secondNum : calculateGcd($secondNum, $firstNum % $secondNum);
}

function generateQuestionAndAnswer(): array
{
    $firstNumber = rand(1, 100);
    $secondNumber = rand(1, 100);

    $question = "{$firstNumber} {$secondNumber}";
    $answer = calculateGcd($firstNumber, $secondNumber);

    return [$question, (string) $answer];
}
