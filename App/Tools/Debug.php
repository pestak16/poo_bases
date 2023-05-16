<?php

class Debug
{
    const START = 0;
    const END = 1;

    static int $time;


    static function print_r(array $data)
    {
        echo '<pre>';
        print_r($data);
        echo '<pre>';
    }

    static function runtine(int $step)
    {
        if ($step == self::START) {
            self::$time = (int) round(microtime(true) * pow(10,6));
        }
        if ($step == self::END) {

            $now = (int) round(microtime(true) * pow(10,6));
            return $now - self::$time;
        }
    }


    static private function convert($size) // pompé sur php.net
    {
        $unit = array('o', 'Ko', 'Mo', 'Go', 'To', 'Po');
        return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }


    static public function ram()
    {
        return self::convert(memory_get_usage());
    }

    
}
