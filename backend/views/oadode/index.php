<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OadodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Oadodes');

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oadode-index">

    <div class="wrapper-cols3">

        <div>
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a(Yii::t('app', 'Create Oadode'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>

        <div>
            <h1><?= Html::encode(Yii::t('app', 'Description Of Goods')) ?></h1>
            <p>
                <?= Html::a(Yii::t('app', 'Views Description Of Goods'), ['descriptions/index'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'application_id',
            // 'customer_id',
            // 'user_id',
            'legal_name',
            'business_name',
            'business_address',
            //'business_mailing_address',
            //'business_phone',
            //'business_fax',
            //'business_email:email',
            [
                'attribute' => 'application_type',
                'value' => function ($model) {
                    if ($model->application_type == 1)
                        return 'New';
                    else
                        return 'Re-assessment';
                },
                'filter' => [
                    1 => 'New',
                    2 => 'Re-assessment',
                ]
            ],
            [
                'attribute' => 'lang',
                'value' => function ($model) {
                    if ($model->lang == 1)
                        return 'En';
                    else
                        return 'Fr';
                },
                'filter' => [
                    1 => 'En',
                    2 => 'Fr',
                ]
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{view2}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        $url = Url::toRoute(['view', 'id' => $model->id]);
                        return Html::a('<button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-eye-open"></i></button>', $url, ['data-pjax' => '0']);
                    },
                    'update' => function ($url, $model) {
                        $url = Url::toRoute(['edit', 'id' => $model->id]);
                        return Html::a('<button type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-pencil"></i></button>', $url, ['data-pjax' => '0']);
                    },
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>