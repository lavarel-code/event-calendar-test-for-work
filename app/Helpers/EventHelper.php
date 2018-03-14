<?php
/**
 * Created by PhpStorm.
 * User: cheremhovo
 * Date: 13.03.18
 * Time: 19:42
 */

declare(strict_types=1);

namespace App\Helpers;


use App\Event;

/**
 * Class EventHelper
 * @package App\Helpers
 */
class EventHelper
{
    /**
     * @return array
     */
    public static function getRepeatByDropDown(): array
    {
        return [
            Event::REPEAT_BY_DAY => 'каждый день',
            Event::REPEAT_BY_WEEK => 'каждую неделю',
            Event::REPEAT_BY_MONTH => 'каждый месяц',
            Event::REPEAT_BY_YEAR => 'каждый год'
        ];
    }
}