<?php

use backend\models\Oadode;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DescriptionOfGoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Description Of Goods');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="description-of-goods-index">

    <div class="wrapper-cols3">

        <div>
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                <?= Html::a(Yii::t('app', 'Create Description Of Goods'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div>

            <h1><?= Html::encode(Yii::t('app', 'oadodes')) ?></h1>
            <p>
                <?= Html::a(Yii::t('app', 'View Oadodes'), ['oadode/index'], ['class' => 'btn btn-success']) ?>
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

            [
                'attribute' => 'oadode_id',
                'label' => 'oadode',
                'value' => function ($model) {
                    return $model->oadode->legal_name;
                },
                'filter' => ArrayHelper::map(Oadode::find()->all(), 'id', 'legal_name'),
            ],
            'user_id',
            'description',
            'ecl_group',
            //'ecl_item',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>