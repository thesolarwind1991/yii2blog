<?php


namespace app\models;
use yii\db\ActiveRecord;

class Tags extends ActiveRecord
{
    public static function TableName() {
        return 'tags';
    }

    public function getBlogtags(){
        return $this->hasMany(Blogtags::className(), ['tag_id' => 'id']);
    }
}