namespace app\models;

use yii\db\ActiveRecord;

class MilkDistribution extends ActiveRecord
{
    public static function tableName()
    {
        return 'milk_distribution';
    }
}