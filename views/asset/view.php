<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */

$this->title = $model->id_asset;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Assets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_asset], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_asset], [
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
            'id_asset',
            'purchase_date',
            'description:ntext',
            'sales_check',
            'create_at',
            'price',
            'currency',
            'id_status',
            'serial_number',
            'ubication',
            'id_os',
            'hard_disk',
            'ram',
            'id_processor',
            'id_leasing',
            'id_model',
            'id_asset_type',
            'id_parent',
        ],
    ]) ?>

</div>
