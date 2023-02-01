<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "subscribe".
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $create_at
 */
class Subscribe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscribe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'create_at' => 'Create At',
        ];
    }
}
