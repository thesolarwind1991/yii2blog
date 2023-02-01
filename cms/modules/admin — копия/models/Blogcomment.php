<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "blogcomment".
 *
 * @property int $id
 * @property int|null $blog_id
 * @property string|null $username
 * @property string|null $email
 * @property string|null $text
 * @property string|null $create_comm
 */
class Blogcomment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogcomment';
    }

    public function getBlog() {
        return $this->hasOne(Blog::className(), ['id' => 'blog_id']);
    }

    public function getBlogName(){ // функция получения значения из родительской таблицы
        $model = $this->blog;
        return $model ? $model->title: '';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id'], 'integer'],
            [['text'], 'string'],
            [['create_comm'], 'safe'],
            [['username', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'blog_id' => 'Имя блога',
            'username' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Текст',
            'create_comm' => 'Дата',
        ];
    }
}
