<?php

namespace AoC\Traits;

trait CanSetYearAndDate
{
    protected string $year = '';
    protected string $day = '';

    protected function setDayAndYear(): void
    {
        $namespace_array = explode('\\', static::class);

        $this->day = $namespace_array[2];
        $this->year = $namespace_array[1];
    }
}