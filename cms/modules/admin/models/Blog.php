<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Blogcomment;
use app\modules\admin\models\Tags;
use app\modules\admin\models\Blogtags;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $intro
 * @property string|null $text
 * @property string|null $create_at
 * @property string|null $update_at
 * @property string|null $author
 * @property string|null $image
 * @property int|null $like
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    public function getBlogcomment() {
        return $this->hasMany(Blogcomment::className(), ['blog_id' => 'id']);
    }

    public function getTags(){
        return $this->hasMany(Tags::className(), ['id' => 'tag_id'])
            ->viaTable('blogtags', ['blog_id' => 'id']);
    }

    public function getDateText()
    {
        if (($timestamp = strtotime($this->create_at)) === false) {
            return $this->create_at;
        } else {
            return date('d.m.Y h:i:s', $timestamp);
        }
    }

    public function setDateText($value)
    {
        $this->create_at = strtotime($value);
    }

    public function getImagePath() {
       if ($this->image)
           return $this->getImage($this->image);
       return 'http://localhost/yii2blog/files/default.jpg';
    }

    private function getImage(string $filename): string
    {
        return Yii::$app->params['uploadHostInfo'].'/blog/'.$filename;
    }

    public function beforeDelete() {
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public function deleteImage() {
        $form = new BlogForm();
        $form->deleteCurrentImage($this->image);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['intro', 'text'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['like'], 'integer'],
            [['title', 'author', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'title' => 'Заголовок',
            'intro' => 'Интро',
            'text' => 'Текст',
            'create_at' => 'Создано',
            'update_at' => 'Изменено',
            'author' => 'Автор',
            'image' => 'Картинка',
            'like' => 'Лайки',
        ];
    }
}
