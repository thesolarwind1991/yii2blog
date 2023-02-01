<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Blogtags;
/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string|null $tag
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
    }

    public function getBlogtags(){
        return $this->hasMany(Blogtags::className(), ['tag_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'tag' => 'Имя тега',
        ];
    }
}
