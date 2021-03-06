<?php declare(strict_types=1);

use Silly\Application;
use Symfony\Component\Console\Output\OutputInterface;

require __DIR__.'/../vendor/autoload.php';

$silly = new Application;

$silly->command('hello [name]', function (string $name = 'World!', OutputInterface $output) {
    $output->writeln('Hello ' . $name);
});
$silly->command('phpinfo', function (OutputInterface $output) {
    ob_start();
    phpinfo();
    $phpinfo = ob_get_clean();
    $output->write($phpinfo);
});
$silly->command('error', function (OutputInterface $output) {
    $output->writeln('There was an error!');
    return 1;
});
$silly->command('sleep', function () {
    sleep(120);
});

$silly->run();
