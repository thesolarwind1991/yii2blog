<?php


namespace app\models;
use yii\db\ActiveRecord;

class Subscribe extends ActiveRecord
{
    public static function TableName() {
        return 'subscribe';
    }

    public function rules()
    {
        return [
            [['email', 'create_at'], 'safe'],
            [['email'], 'string', 'max' => 255],
            [['email'], 'email']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'email' => 'Почтовый ящик',
            'create_at' => 'Дата подписки',
        ];
    }

}