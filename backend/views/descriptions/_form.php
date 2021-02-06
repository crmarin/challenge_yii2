<?php

use backend\models\Oadode;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DescriptionOfGoods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="description-of-goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="wrapper-cols2">

        <div>
            <?= $form->field($model, 'oadode_id')->DropDownList(ArrayHelper::map(Oadode::find()->all(), 'id', 'legal_name'), ['prompt' => 'Select an oadode legal name']);  ?>
        </div>

        <div>
            <?= $form->field($model, 'ecl_group')->textInput(['maxlength' => true]) ?>
        </div>

        <div>
            <?= $form->field($model, 'ecl_item')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    <?= $form->field($model, 'description')->textArea(['size' => 80, 'rows' => '3', 'maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>