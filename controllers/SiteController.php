<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RegForm;

class SiteController extends Controller
{
    public function actionSayer($ms= 'Hello, my Kekos'){
        return $this->render('sayer', ['mes' => $ms]);
    }
    public function actionFormer(){
        $model = new RegForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            return $this->render('form-ok', ['model' => $model]);
        }else{
            return $this->render('form', ['model' => $model]); 
        }
    }
}
