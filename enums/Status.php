<?php

namespace indifferend\moderation\enums;

use indifferend\enum\helpers\BaseEnum;

/**
 * Class Status
 *
 * @package indifferend\moderation\enums
 */
class Status extends BaseEnum
{
    const PENDING = 0;
    const APPROVED = 1;
    const REJECTED = 2;
    const POSTPONED = 3;

    /**
     * @var array
     */
    public static $list = [
        self::PENDING => 'Обработка',
        self::APPROVED => 'Одобрено',
        self::REJECTED => 'Отклонено',
        self::POSTPONED => 'Отложено',
    ];
}
