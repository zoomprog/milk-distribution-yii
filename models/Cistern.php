<?php

namespace app\models;

use yii\db\ActiveRecord;

class Cistern extends ActiveRecord
{
    public static function tableName()
    {
        return 'cistern';
    }
}