<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\Engine\startGame;

const GAME_RULE = 'What is the result of the expression?';

/**
 * @return void|callable|null
 */
function start()
{
    return startGame(GAME_RULE, fn() => generateQuestionAndAnswer());
}

function getRandomOperator(): string
{
    $operators = ['+', '-', '*'];

    return $operators[rand(0, 2)];
}

function calculateExpressionResult(int $firstOperand, string $operator, int $secondOperand): int
{
    switch ($operator) {
        case '+':
            return $firstOperand + $secondOperand;
        case '-':
            return $firstOperand - $secondOperand;
        case '*':
            return $firstOperand * $secondOperand;
        default:
            throw new \Exception('Unexpected operator!');
    }
}

function generateQuestionAndAnswer(): array
{
    $firstOperand = rand(0, 10);
    $secondOperand = rand(0, 10);
    $operator = getRandomOperator();

    $question = "{$firstOperand} {$operator} {$secondOperand}";
    $answer = calculateExpressionResult($firstOperand, $operator, $secondOperand);
    ;

    return [$question, (string) $answer];
}
