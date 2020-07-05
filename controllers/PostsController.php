<?php
    namespace app\controllers;

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
        public function imgcntrl($id){
            $img = posts::find()->limit(1)->where(['nomer' => $id])->one();
            print $img['image'];
        }
    }
?>