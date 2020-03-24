<?php

class Clock
{
    public const DAY_IN_SECONDS = 60 * 60 * 24;

    public function today()
    {
        return time();

    }
    public function tommorow()
    {
        return time() + self::DAY_IN_SECONDS;
    }
}

echo Clock::DAY_IN_SECONDS;
echo "<br/>";

// show the next day
$clock = new Clock();
echo "Today (unix time format) : ". $clock->today()."<br/>";
echo "Tomorrow (unix time format) : ". $clock->tommorow()."<br/>";