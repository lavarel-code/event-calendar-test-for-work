<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * @package App
 * @property int $id
 * @property int $repeat_by
 * @property int $user_id
 * @property string $date
 * @property string $title
 */
class Event extends Model
{
    /**
     *
     */
    const REPEAT_BY_DAY = 0;
    /**
     *
     */
    const REPEAT_BY_WEEK = 1;
    /**
     *
     */
    const REPEAT_BY_MONTH = 2;
    /**
     *
     */
    const REPEAT_BY_YEAR = 3;

    /**
     * @param string $title
     * @param DateTime $date
     * @param int $repeatBy
     * @param int $userId
     * @return Event
     */
    public static function instance(
        string $title,
        DateTime $date,
        int $repeatBy,
        int $userId
    ): self
    {
        $model = new static();
        $model->title = $title;
        $model->date = $date->format('Y-m-d');
        $model->repeat_by = $repeatBy;
        $model->user_id = $userId;
        return $model;
    }


    /**
     * @param string $title
     * @param DateTime $date
     * @param int $repeatBy
     */
    public function edit(
        string $title,
        DateTime $date,
        int $repeatBy
    ): void
    {
        $this->title = $title;
        $this->date = $date->format('Y-m-d');
        $this->repeat_by = $repeatBy;
    }
}
