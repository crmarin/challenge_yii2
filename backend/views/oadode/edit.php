<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Oadode */

$this->title = Yii::t('app', 'Update Oadode: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Oadodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="oadode-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelDescription' => $modelDescription,
    ]) ?>

</div>