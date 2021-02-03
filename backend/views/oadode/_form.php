<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Oadode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oadode-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="wrapper-cols">

        <div class="wrapper-col-1">

            <?= $form->field($model, 'application_id')->DropDownList([1 => 'Application 1', 2 => 'Application 2', 3 => 'Application 3'], ['prompt' => 'Select an application_id']);  ?>

            <?= $form->field($model, 'customer_id')->DropDownList([1 => 'Customer 1', 2 => 'Customer 2', 3 => 'Customer 3'], ['prompt' => 'Select a customer_id']);  ?>

            <?= $form->field($model, 'legal_name')->textArea(['size' => 60, 'rows' => '3', 'maxlength' => true]); ?>

            <?= $form->field($model, 'business_name')->textArea(['size' => 60, 'rows' => '3', 'maxlength' => true]) ?>

            <?= $form->field($model, 'business_address')->textArea(['size' => 60, 'rows' => '3', 'maxlength' => true]) ?>

            <?= $form->field($model, 'business_mailing_address')->textArea(['maxlength' => true]) ?>

        </div>

        <div class="wrapper-col-2">

            <?= $form->field($model, 'business_phone')->textArea(['maxlength' => true]) ?>

            <?= $form->field($model, 'business_fax')->textArea(['maxlength' => true]) ?>

            <?= $form->field($model, 'business_email')->textArea(['maxlength' => true]) ?>

            <?= $form->field($model, 'application_type')->DropDownList([1 => 'Application type 1', 2 => 'Application type 2', 3 => 'Application type 3'], ['prompt' => 'Select an application type']);  ?>

            <?= $form->field($model, 'business_title[]')->checkboxList(['a' => 'Item A', 'b' => 'Item B', 'c' => 'Item C']); ?>

            <?= $form->field($model, 'lang')->DropDownList([1 => 'EN', 2 => 'ES', 3 => 'FR'], ['prompt' => 'Select a language']);  ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>