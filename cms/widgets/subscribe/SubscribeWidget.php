<?php
namespace app\widgets\subscribe;
use yii\base\BaseObject;
use yii\base\Widget;
use app\models\Subscribe;

class SubscribeWidget extends Widget
{
    public function init() {
        return parent::init();
    }

   public function run() {
       $subscribe = new Subscribe();
       return $this->render('form', ['subscribe' => $subscribe]);
   }
}