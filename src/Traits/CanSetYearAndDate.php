<?php

namespace AoC\Traits;

trait CanSetYearAndDate
{
    protected string $year = '';
    protected string $day = '';
    protected function setDayAndYear(string $namespace): void
    {
        $namespace_array = explode('\\', $namespace);

        $this->day = $namespace_array[2];
        $this->year = $namespace_array[1];
    }
}