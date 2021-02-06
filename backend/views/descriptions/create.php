<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DescriptionOfGoods */

$this->title = Yii::t('app', 'Create Description Of Goods');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Description Of Goods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="description-of-goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
