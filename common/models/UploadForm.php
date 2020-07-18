<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * Class UploadForm
 * @package common\models
 * @property string|null $prefix
 * @property string|null $folder
 * @property string|null $imageName
 * @property int $imageWidth
 * @property int $imageHeight
 * @property int $imageQuality
 * @property UploadedFile $imageFile
 */
class UploadForm extends Model
{
    public $prefix = null;
    public $folder = null;
    public $imageFile;
    public $imageName = null;
    public $imageWidth = 150;
    public $imageHeight = 150;
    public $imageQuality = 85;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => ['jpg', 'jpeg', 'png']],
        ];
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if(!$this->imageFile){
            return false;
        }
        if ($this->validate())
        {
            if ($this->folder && !is_dir(Yii::getAlias('@uploads/'.$this->folder.'/'))) {
                mkdir(Yii::getAlias('@uploads/'.$this->folder.'/'), 0777, true);
            }

            $this->imageName = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            if(!empty($this->prefix)){
                $this->imageName = $this->prefix .'_' . $this->imageName;
            }
            $folderPath = Yii::getAlias('@uploads').($this->folder?'/'.$this->folder:'').'/';

            Image::thumbnail($this->imageFile->tempName, $this->imageWidth, $this->imageHeight)
                ->save($folderPath . $this->imageName, ['quality' => $this->imageQuality]);

            return true;
        } else {
            return false;
        }
    }
}