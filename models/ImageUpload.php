<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model{

    public $image;

    public function rules(){
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage){

        //die($currentImage);
        $this->image = $file;
        if($this->validate()){
            if(!empty($currentImage) && $currentImage != null){
                if(file_exists('uploads/'.$currentImage)){
                    unlink('uploads/'.$currentImage);
                }
            }
            $filename = md5(uniqid($file->baseName)) .'.'. $file->extension;

            $file->saveAs('uploads/'.$filename);
            return $filename;
        }
    }

}