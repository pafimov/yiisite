<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;

    print '<h1>Posts</h1></br>';
    foreach($posts as $post){
        print <<<_HTML_
            {$post['text']}</br>
            <img src="" width= 30%></br>
            {$post['time']}</br>
        _HTML_;
    }
    print LinkPager::widget(['pagination' => $pagination]);
?>