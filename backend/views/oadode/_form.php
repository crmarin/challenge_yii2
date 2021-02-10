<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Oadode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oadode-form">

    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
        'validationUrl' => Url::toRoute(['oadode/validation'])
    ]); ?>

    <div class="wrapper-cols">

        <div></div>

        <div>

            <?= $form->field($model, 'legal_name')->textArea(['size' => 60, 'rows' => '3', 'maxlength' => true]); ?>

            <?= $form->field($model, 'business_name')->textArea(['size' => 60, 'rows' => '3', 'maxlength' => true]) ?>

            <?= $form->field($model, 'business_address')->textArea(['size' => 60, 'rows' => '3', 'maxlength' => true]) ?>

            <?= $form->field($model, 'business_mailing_address')->textArea(['maxlength' => true]) ?>

            <?= $form->field($model, 'business_phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'business_fax')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'business_email')->textInput(['maxlength' => true]) ?>

            <!--  -->

            <div class="description_row">
                <label class="control-label">Description of Controlled Goods</label>
                <label class="control-label">ECL Group No.</label>
                <label class="control-label">ECL Item No.</label>
            </div>

            <?php if ($model->isNewRecord) : ?>
                <?php for ($i = 1; $i < 6; $i++) : ?>

                    <div class="description_row">

                        <?= $form->field($modelDescription, 'description[' . $i . ']')->textInput()->label(false); ?>

                        <?= $form->field($modelDescription, 'ecl_group[' . $i . ']')->textInput(['maxlength' => true])->label(false); ?>

                        <?= $form->field($modelDescription, 'ecl_item[' . $i . ']')->textInput(['maxlength' => true])->label(false); ?>

                    </div>

                <?php endfor; ?>
            <?php else : ?>
                <?php foreach ($modelDescription as $key => $value) : ?>

                    <div class="description_row2">

                        <?= $form->field($modelDescription[$key], 'description[' . $key . ']')->textInput(['value' => $value['description']])->label(false); ?>

                        <?= $form->field($modelDescription[$key], 'ecl_group[' . $key . ']')->textInput(['value' => $value['ecl_group'], 'maxlength' => true])->label(false); ?>

                        <?= $form->field($modelDescription[$key], 'ecl_item[' . $key . ']')->textInput(['value' => $value['ecl_item'], 'maxlength' => true])->label(false); ?>

                        <?= $form->field($modelDescription[$key], 'id_des[' . $key . ']')->hiddenInput(['value' => $value['id'], 'maxlength' => true])->label(false); ?>

                    </div>

                <?php endforeach; ?>
            <?php endif; ?>


            <!--  -->

            <?= $form->field($model, 'application_type')->radioList([1 => 'New', 2 => 'Re-assessment'], ['class' => 'application_type']);  ?>

            <?php

            $list = [1 => 'Owner', 2 => 'Authorized Indivudual', 3 => 'Designated Official', 4 => 'Officer', 5 => 'Director', 6 => 'Employee'];

            if (!$model->isNewRecord) {
                $checkedList = explode(',', $model->business_title);
            } else {
                $checkedList = [];
            }
            ?>

            <?= $form->field($model, 'business_title')->checkboxList($list, ['value' => $checkedList, 'class' => 'business_title']); ?>

            <?= $form->field($model, 'lang')->radioList([1 => 'English', 2 => 'French'], ['class' => 'lang']);  ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

        </div>

        <div></div>

    </div>

</div>

<?php ActiveForm::end(); ?>

</div>