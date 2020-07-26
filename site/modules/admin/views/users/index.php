<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-index">

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
                    'attribute' => 'username',
                    'format' => 'html',
                    'value' => function($model){
                        if(!Yii::$app->user->can('admin')){ return $model->username; }
                        return Html::a($model->username, ['update', 'id' => $model->id]);
                    }
                ],
                'first_name',
                'last_name',
                'role',
                [
                   'header' => 'Actions',
                   'class' => 'yii\grid\ActionColumn',
                   'template' => '{status}{delete}',
                   'headerOptions' => ['class' => 'text-center', 'style' => 'width: 120px;'],
                   'contentOptions' => ['class' => 'text-center'],
                   'buttons' => [
                       'status' => function ($url, $model){
                            if($model->id === Yii::$app->user->id){ return ''; }
                            if(!Yii::$app->user->can('admin')){ return ''; }
                            return Html::a('<i class="fas fa-toggle'.($model->status === $model::STATUS_ACTIVE ? '-on text-success' : '-off text-danger').'"></i>', $url, ['class' => 'btn btn-sm', 'title' => 'Status', 'data-method' => 'post', 'data-pjax' => '0']);
                       },
                       'update' => function ($url, $model){
                           return Html::a('<i class="fas fa-edit"></i>', $url, ['class' => 'btn btn-sm', 'title' => 'Edit', 'data-method' => 'post', 'data-pjax' => '0']);
                       },
                       'delete' => function ($url, $model){
                           if($model->id === Yii::$app->user->id){ return ''; }
                           if(!Yii::$app->user->can('admin')){ return ''; }
                           return Html::a('<i class="far fa-trash-alt text-danger"></i>', $url, ['class' => 'btn btn-sm', 'data-toggle' => 'tooltip', 'title' => 'Delete', 'data-confirm' => 'Are you sure you want to delete this record?', 'data-method' => 'post',  'data-pjax' => '0']);
                       },
                   ],
               ],
            ],
        ]); ?>
    </div>


</div>
