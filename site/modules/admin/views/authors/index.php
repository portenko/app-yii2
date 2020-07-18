<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-index">

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
                'id',
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
                [
                    'attribute' => 'lang',
                    'filter' => Yii::$app->params['languages']
                ],
                [
                    'header' => 'Actions',
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{status}{delete}',
                    'headerOptions' => ['class' => 'text-center', 'style' => 'width: 120px;'],
                    'contentOptions' => ['class' => 'text-center'],
                    'buttons' => [
                        'status' => function ($url, $model){
                            return Html::a('<i class="fas fa-toggle'.($model->status === $model::STATUS_ACTIVE ? '-on text-success' : '-off text-danger').'"></i>', $url, ['class' => 'btn btn-sm', 'title' => 'Status', 'data-method' => 'post', 'data-pjax' => '0']);
                        },
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
