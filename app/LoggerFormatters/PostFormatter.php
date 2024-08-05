<?php

namespace App\LoggerFormatters;

use Illuminate\Log\Logger;
use Monolog\Formatter\LineFormatter;

class PostFormatter
{
    public function __invoke(Logger $logger): void
    {
        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter(new LineFormatter(
                '[%datetime%] %level_name%: %message% %context%' . PHP_EOL . PHP_EOL,
            ));
        }
    }
}
