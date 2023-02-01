<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

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
class BlogForm extends Model
{
    public $title;
    public $intro;
    public $text;
    public $create_at;
    public $update_at;
    public $like;
    public $author;
    public $image;
    private $_model;

    public function __construct(Blog $model = null, $config = [])
    {
        if ($model) {
            $this->title = $model->title;
            $this->intro = $model->intro;
            $this->text = $model->text;
            $this->create_at = $model->create_at;
            $this->update_at = $model->update_at;
            $this->like = $model->like;
            $this->author = $model->author;
            $this->_model = $model;
        }
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['intro', 'text'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['like'], 'integer'],
            [['title', 'author'], 'string', 'max' => 255],
            [['image'], 'image',
                'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'checkExtensionByMimeType' => true,
                'maxSize' => 1512000, // 500 килобайт = 500 * 1024 байта = 512 000 байт
                'tooBig' => 'Предел в 1500KB'
            ],
        ];
    }

    public function uploadImage(UploadedFile $image, $currentImage = null)
    {
        if (!is_null($currentImage))
            $this->deleteCurrentImage($currentImage);
        $this->image = $image;
        if ($this->validate())
            return $this->saveImage();
        return false;
    }

    private function getUploadPath() {
        return Yii::$app->params['uploadPath'] . '/blog/';
    }

    public function generateFileName():string {
        do {
            $name = substr(md5(microtime() . rand(0, 1000)), 0, 20);
            $file = strtolower($name . '.'. $this->image->extension);
        } while (file_exists($file));
        return $file;
    }

    public function deleteCurrentImage($currentImage) {
        if ($currentImage && $this->fileExists($currentImage)) {
            unlink($this->getUploadPath() . $currentImage);
        }
    }

    public function fileExists($currentFile): bool
    {
        $file = $currentFile ? $this->getUploadPath() . $currentFile : null;
        return file_exists($file);
    }

    public function saveImage(): string
    {
        $filename = $this->generateFileName();
        $this->image->saveAs($this->getUploadPath().$filename);
        return $filename;
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
