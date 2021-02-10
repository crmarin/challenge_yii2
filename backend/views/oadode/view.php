<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Oadode */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Oadodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="oadode-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['edit', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>


    <?php
    $url = Url::toRoute(['oadode/view-pdf', 'id' => $model->id]);
    echo Html::a('<button type="button" rel="tooltip" class="btn btn-warning" data-original-title=" Descargar PDF">
    <i class="glyphicon glyphicon-download-alt"></i> Download PDF</button>', [$url], ['data-pjax' => '0']);
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'application_id',
            'customer_id',
            'user_id',
            'legal_name',
            'business_name',
            'business_address',
            'business_mailing_address',
            'business_phone',
            'business_fax',
            'business_email:email',
            [
                'attribute' => 'business_title',
                'value' => function ($model) {

                    $list = [1 => 'Owner', 2 => 'Authorized Indivudual', 3 => 'Designated Official', 4 => 'Officer', 5 => 'Director', 6 => 'Employee'];

                    $checkedList = array_values(explode(',', $model->business_title));

                    $aux = array_intersect_key($list, array_flip($checkedList));

                    return implode(', ', $aux);
                },
            ],
            [
                'attribute' => 'application_type',
                'value' => function ($model) {
                    if ($model->application_type == 1)
                        return 'New';
                    else
                        return 'Re-assessment';
                },
            ],
            [
                'attribute' => 'lang',
                'value' => function ($model) {
                    if ($model->lang == 1)
                        return 'En';
                    else
                        return 'Fr';
                },
            ],
        ],
    ]) ?>

</div>