<?php

namespace indifferentmoviegoer\moderation;

use Yii;
use yii\db\ActiveQuery;
use indifferentmoviegoer\moderation\enums\Status;

/**
 * ModerationQuery adds the ability of getting only approved, rejected, postponed or pending models.
 *
 * This class provides the following methods:
 *
 * ```php
 * Post::find()->approved()->all() // It will return all Approved Posts
 *
 * Post::find()->rejected()->all() // It will return all Rejected Posts
 *
 * Post::find()->postponed()->all() // It will return all Postponed Posts
 *
 * Post::find()->pending()->all() // It will return all Pending Posts
 *
 * Post::find()->approvedWithPending()->all() // It will return all Approved and Pending Posts
 * ```
 *
 * @author Igor Chepurnoy <igorzfort@gmail.com>
 *
 * @since 1.0
 */
class ModerationQuery extends ActiveQuery
{
    /**
     * @var string status attribute
     */
    protected $statusAttribute;

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();

        $this->statusAttribute = Yii::$container->get($this->modelClass)->statusAttribute;
    }

    /**
     * Get a new active query object that includes approved resources.
     *
     * @return ActiveQuery
     */
    public function approved(): ActiveQuery
    {
        return $this->andWhere([$this->statusAttribute => Status::APPROVED]);
    }

    /**
     * Get a new active query object that includes rejected resources.
     *
     * @return ActiveQuery
     */
    public function rejected(): ActiveQuery
    {
        return $this->andWhere([$this->statusAttribute => Status::REJECTED]);
    }

    /**
     * Get a new active query object that includes postponed resources.
     *
     * @return ActiveQuery
     */
    public function postponed(): ActiveQuery
    {
        return $this->andWhere([$this->statusAttribute => Status::POSTPONED]);
    }

    /**
     * Get a new active query object that includes pending resources.
     *
     * @return ActiveQuery
     */
    public function pending(): ActiveQuery
    {
        return $this->andWhere([$this->statusAttribute => Status::PENDING]);
    }

    /**
     * Get a new active query object that includes approved and pending resources.
     *
     * @return ActiveQuery
     */
    public function approvedWithPending(): ActiveQuery
    {
        return $this->andWhere([$this->statusAttribute => [Status::APPROVED, Status::PENDING]]);
    }
}
