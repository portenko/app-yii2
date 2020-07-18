<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-sm table-hover mb-0'],
            'headerRowOptions' => ['class' => 'thead-blue'],
            'layout' => '{items}{pager}',
            'columns' => [
                [
                    'attribute' => 'id',
                    'label' => '#',
                    'format' => 'raw',
                    'value' => function($model){
                        return Html::a($model->id, ['pages/update', 'id' => $model->id]);
                    },
                    'contentOptions' => ['class' => 'uk-text-center'],
                    'headerOptions' => ['class' => 'uk-text-center', 'style' => 'width:20px'],
                ],
                [
                    'attribute' => 'name',
                    'format' => 'html',
                    'value' => function($model){
                        $pic = '';
                        if(!empty($model->pic)){
                            $pic = Html::img('/uploads/authors/'.$model->pic, ['class' => 'mr-2', 'style' => 'max-width:20px;']);
                        }
                        return Html::a($pic.$model->name, ['update', 'id' => $model->id]);
                    }
                ],
                'category_id',
                'name',
                'url_slug:url',
                'lead',
                //'content:ntext',
                //'cover',
                //'cover_alt',
                //'status',
                //'type',
                //'lang',
                //'meta_title',
                //'meta_description',
                //'meta_keywords',
                //'alternate_id',
                //'sort',
                //'author_id',
                //'recommended_posts',
                [
                    'attribute' => 'publish_at',
                    'value' => function($model){
                        return Yii::$app->formatter->asDatetime($model->publish_at, 'dd.MM.yyyy hh:i');
                    }
                ],
                //'created_at',
                //'updated_at',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{copy}{delete}',
                    'contentOptions' => ['class' => 'uk-text-right'],
                    'buttons' => [
                        'copy' => function ($url, $model){
                            return Html::a('<i class="fas fa-copy"></i>', $url, ['class' => 'btn btn-sm uk-margin-small-right', 'uk-tooltip' => Yii::t('app', 'Копировать'), 'data-method' => 'post', 'data-pjax' => '0']);
                        },
                        'delete' => function ($url, $model){
                            return Html::a('<i class="far fa-trash-alt"></i>', $url, ['class' => 'btn btn-danger btn-sm', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Удалить'), 'data-confirm' => Yii::t('app', 'Вы действительно хотите удалить эту запись?'), 'data-method' => 'post',  'data-pjax' => '0']);
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>

</div>
