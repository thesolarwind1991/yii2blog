<?php


namespace app\models;
use yii\db\ActiveRecord;

class Blogtags extends ActiveRecord
{
    public static function TableName(){
        return 'blogtags';
    }

    public function getBlog() {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }

    public function getTags() {
        return $this->hasOne(Tags::className(), ['id' => 'tag_id']);
    }
}