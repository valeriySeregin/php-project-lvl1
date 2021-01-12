<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\Engine\startGame;

const PROGRESSION_LENGTH = 10;
const GAME_RULE = 'What number is missing in the progression?';

function start(): void
{
    startGame(GAME_RULE, fn() => generateQuestionAndAnswer());
}

function generateQuestionAndAnswer(): array
{
    $step = rand(1, 10);
    $indexToMiss = rand(0, PROGRESSION_LENGTH - 1);
    $firstElement = rand(0, 100);
    $lastElement = $firstElement + $step * PROGRESSION_LENGTH - 1;
    $progressionElements = range($firstElement, $lastElement, $step);

    $answer = $progressionElements[$indexToMiss];

    $progressionElements[$indexToMiss] = '..';

    $question = implode(' ', $progressionElements);

    return [$question, (string) $answer];
}
