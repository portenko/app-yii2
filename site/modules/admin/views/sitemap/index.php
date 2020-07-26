<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SitemapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sitemaps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sitemap-index">

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
                    'attribute' => 'loc',
                    'format' => 'raw',
                    'value' => function($model){
                        return Html::a($model->loc, ['sitemap/update', 'id' => $model->id]);
                    },
                    'headerOptions' => ['style' => 'width: 50%;'],
                    'contentOptions' => ['style' => 'width: 50%;']
                ],
                'lastMod',
                'changefreq',
                'priority',
                [
                    'header' => 'Actions',
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{delete}',
                    'headerOptions' => ['class' => 'text-center', 'style' => 'width: 120px;'],
                    'contentOptions' => ['class' => 'text-center'],
                    'buttons' => [
                        'update' => function ($url, $model){
                            return Html::a('<i class="fas fa-edit"></i>', $url, ['class' => 'btn btn-sm', 'title' => 'Edit', 'data-method' => 'post', 'data-pjax' => '0']);
                        },
                        'delete' => function ($url, $model){
                            return Html::a('<i class="far fa-trash-alt text-danger"></i>', $url, ['class' => 'btn btn-sm', 'data-toggle' => 'tooltip', 'title' => 'Delete', 'data-confirm' => 'Are you sure you want to delete this record?', 'data-method' => 'post',  'data-pjax' => '0']);
                        },
                    ],
                ],
            ],
    ]); ?>
</div>

</div>