<?php
declare(strict_types = 1);

require_once __DIR__ . DIRECTORY_SEPARATOR . '../vendor/autoload.php';

$rows = 3;
$cols = 3;
$gameFactory = new GamesFactory();
$game = $gameFactory->createNewGamePuzzle($rows, $cols);

$countPushes = 0;
while (!$game->isFinish()) {
    $ceil = 1;
    for ($i = 1; $i <= $rows; $i++) {
        for ($j = 1; $j <= $cols; $j++) {
            echo sprintf("    %d    ", $game->getNumberValue($ceil));
            $ceil++;
        }
        echo PHP_EOL;
    }
    echo PHP_EOL;
    if (!$game->isFinish()) {
        $numberValue = (int)trim(readline("enter number value to push: "));
        try {
            $game->push($numberValue);
            $countPushes++;
        } catch (\Throwable $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }
}

echo "game finish, count pushes = {$countPushes}" . PHP_EOL;
