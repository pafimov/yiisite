<?php
    namespace app\controllers;
    header("content-type:image/jpeg");

    use yii\data\Pagination;
    use yii\web\Controller;
    use app\models\posts;

    class PostsController extends Controller{
        public function actionPostact()
        {
            $pagination = new Pagination([
                'defaultPageSize' => 1,
                'totalCount' => posts::find()->count()
            ]);
            $posts = posts::find()->orderBy('time')->offset($pagination->offset)->limit($pagination->limit)->all();
            return $this->render('posts', ['posts' => $posts, 'pagination' => $pagination]);
        }
        public function actionImgcntrl($id){
            $idt = filter_var($id, FILTER_VALIDATE_INT, array('options' => array('min_range' => -1)));
            if($idt){
                //var_dump($id);
                //$idt = (int)$id;
                $img = posts::find()->where(['nomer' => $idt])->one();
                $imagecontent=base64_decode($img['image']);
                print $imagecontent;
            }elseif($idt=0){
                $img = posts::find()->where(['nomer' => $idt])->one();
                $imagecontent=base64_decode($img['image']);
                print $imagecontent;
            }
        }
    }
?>