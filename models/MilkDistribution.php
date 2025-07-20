<?php

namespace app\models;

use yii\db\ActiveRecord;

class MilkDistribution extends ActiveRecord
{
    public static function tableName()
    {
        return 'milk_distribution';
    }

    public function rules()
    {
        return [
            [['filled_by', 'amount'], 'required'],
            [['amount'], 'integer', 'min' => 1, 'max' => 300],
            [['filled_by'], 'string', 'max' => 255],
        ];
    }

    public function getCistern()
    {
        return $this->hasOne(Cistern::class, ['id' => 'cistern_id']);
    }
}