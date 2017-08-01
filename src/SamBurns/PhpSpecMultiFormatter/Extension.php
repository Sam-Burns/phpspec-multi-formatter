<?php
namespace SamBurns\PhpSpecMultiFormatter;

use PhpSpec\Config\OptionsConfig;
use PhpSpec\Console\ConsoleIO;
use PhpSpec\Extension as PhpSpecExtension;
use PhpSpec\Formatter\JUnitFormatter;
use PhpSpec\ServiceContainer;
use SamBurns\PhpSpecMultiFormatter\Formatter\MultiFormatter;
use Symfony\Component\Console\Output\StreamOutput;

class Extension implements PhpSpecExtension
{
    public function load(ServiceContainer $container, array $params)
    {
        $this->addOutputterToContainer($container, $params['file'] ?? 'junit.xml');
    }

    private function addOutputterToContainer(ServiceContainer $container, string $pathToFile)
    {
        $container->define('multiformatter.console.io.file', function (ServiceContainer $container) use ($pathToFile) {

            $stream = fopen($pathToFile, 'w');

            return new ConsoleIO(
                $container->get('console.input'),
                new StreamOutput($stream),
                new OptionsConfig(
                    false,
                    false,
                    false,
                    true,
                    false
                ),
                $container->get('console.prompter')
            );
        });

        $container->define(
            'multiformatter.formatter.formatters.junit',
            function (ServiceContainer $container) {
                return new JUnitFormatter(
                    $container->get('formatter.presenter'),
                    $container->get('multiformatter.console.io.file'),
                    $container->get('event_dispatcher.listeners.stats')
                );
            }
        );

        $container->define('formatter.formatters.multiformatter', function (ServiceContainer $container) {
            return new MultiFormatter(
                $container->get('formatter.formatters.dot'),
                $container->get('multiformatter.formatter.formatters.junit')
            );
        });
    }
}
