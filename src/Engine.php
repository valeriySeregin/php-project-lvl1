<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function startGame(string $gameRule, callable $getQuestionAndAnswer): void
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?', '', ' ');
    line("Hello, %s!" . PHP_EOL, $playerName);
    line($gameRule);

    for ($rounds = 0; $rounds < ROUNDS_COUNT; $rounds += 1) {
        [$question, $answer] = $getQuestionAndAnswer();
        line("Question: {$question}");

        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $answer) {
            line("'{$userAnswer}' is wrong answer. Correct answer was '{$answer}'.");
            line('Let\'s try again, %s!', $playerName);
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $playerName);
}
