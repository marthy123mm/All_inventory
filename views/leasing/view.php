<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Leasing */

$this->title = $model->id_leasing;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Leasings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leasing-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_leasing], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_leasing], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_leasing',
            'leasing_number',
            'months',
            'payment',
            'start_date',
            'end_date',
            'id_provider',
        ],
    ]) ?>

</div>
