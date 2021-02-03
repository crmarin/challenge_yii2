<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OadodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Oadodes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oadode-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Oadode'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'application_id',
            'customer_id',
            'user_id',
            'legal_name',
            'business_name',
            'business_address',
            //'business_mailing_address',
            //'business_phone',
            //'business_fax',
            //'business_email:email',
            //'application_type',
            'business_title',
            [
                'attribute' => 'lang',
                'value' => function ($model) {
                    if ($model->lang == 1)
                        return 'En';
                    else if ($model->lang == 2)
                        return 'Es';
                    else
                        return 'Fr';
                },
                'filter' => [
                    1 => 'En',
                    2 => 'Es',
                    3 => 'Fr',
                ]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>