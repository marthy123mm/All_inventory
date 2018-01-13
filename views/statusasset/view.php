<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StatusAsset */

$this->title = $model->id_status;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Status Assets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-asset-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_status], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_status], [
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
            'id_status',
            'status_name',
            'description:ntext',
        ],
    ]) ?>

</div>
