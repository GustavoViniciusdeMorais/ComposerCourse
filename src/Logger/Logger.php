<?php

namespace Gustavo\Package\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class Logger implements LoggerInterface
{

    use LoggerTrait;

    private $base_dir;

    public function __construct($base_dir)
    {
        $this->base_dir = $base_dir;
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $infoDate = date('Y-m-d H:i:s');
        $message .= " - {$infoDate}";
        $message = $this->interpolate($message, $context);
        $file = $this->base_dir . '/' . $level . '.log';
        echo $file."\n";

        if (file_exists($file)) {
            $content = file_get_contents($file);
            $content .= PHP_EOL;
            $content .= $content.$message;
            file_put_contents($file, $content);
        } else {
            mkdir($this->base_dir, 0755, true);
            $fp = fopen($file, 'a+');
            fwrite($fp, $message);
            fclose($fp);
        }
    }

    public function interpolate($message, array $context = array())
    {
        // build a replacement array with braces around the context keys
        $replace = array();
        foreach ($context as $key => $val) {
            // check that the value can be cast to string
            if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }
    
        // interpolate replacement values into the message and return
        return strtr($message, $replace);
    }
}