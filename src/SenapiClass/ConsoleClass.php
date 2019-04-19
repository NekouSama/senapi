<?php
namespace App\SenapiClass;

use Symfony\Component\Console\Helper\Helper;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Formatter\OutputFormatter;

class ConsoleClass extends SymfonyStyle
{

    public function section($message)
    {
        $this->newLine();
        $this->writeln([
            sprintf('<comment>%s</>', OutputFormatter::escapeTrailingBackslash($message)),
            sprintf('<comment>%s</>', str_repeat('-', Helper::strlenWithoutDecoration($this->getFormatter(), $message))),
        ]);
    }

    public function text($message)
    {
        $messages = \is_array($message) ? array_values($message) : [$message];
        foreach ($messages as $message) {
            $this->writeln(sprintf(' %s', $message));
        }
    }
}
