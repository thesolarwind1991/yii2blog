<?php


namespace app\modules\admin\models;

use Yii;
use yii\base\Model;

class BlogSubscribe extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;

    public function attributeLabels()
    {
        return [
            'name' => 'Заголовок новости-рассылки',
            'email' => 'E-mail',
            'subject' => 'Заголовок',
            'body' => 'Текст новости-рассылки'
        ];
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            ['email', 'email'],
        ];
    }

    public function contact($email, $name, $subject, $body)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                //->setReplyTo([$email => $name])
                ->setSubject($subject)
                ->setHTMLBody($body)
                ->send();

            return $email;
        }
        return false;
    }
}