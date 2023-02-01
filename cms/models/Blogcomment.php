<?php


namespace app\models;
use yii\db\ActiveRecord;

class Blogcomment extends ActiveRecord
{
    public static function TableName() {
        return 'blogcomment';
    }

    public function getBlog() {
        return $this->hasOne(Blog::className(),['id' => 'blog_id']);
    }

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
            'username' => 'Имя пользователя',
            'email' => 'E-mail',
            'text' => 'Текст',
            'create_comm' => 'Дата',
        ];
    }

}