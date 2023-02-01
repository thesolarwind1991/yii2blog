<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Blog;
use app\modules\admin\models\Tags;

/**
 * This is the model class for table "blogtags".
 *
 * @property int $id
 * @property int|null $blog_id
 * @property int|null $tag_id
 */
class Blogtags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogtags';
    }

    public function getBlog() {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }

    public function getBlogName(){ // функция получения значения из родительской таблицы
        $model = $this->blog;
        return $model ? $model->title: '';
    }

    public function getTags() {
        return $this->hasOne(Tags::className(), ['id' => 'tag_id']);
    }

    public function getTagName(){ // функция получения значения из родительской таблицы
        $model = $this->tags;
        return $model ? $model->tag: '';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'tag_id'], 'integer'],
            [['blogName', 'tagName'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'blog_id' => 'Блог',
            'tag_id' => 'Тег',
            'blogName' => 'ЗАГОЛОВОК Блога',
            'tagName' => 'ЗАГОЛОВОК тега'
        ];
    }
}
