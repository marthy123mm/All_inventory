<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Responsive */

$this->title = $model->id_responsive;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Responsives'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsive-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_responsive], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_responsive], [
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
            'id_responsive',
            'start_date',
            'end_date',
            'status',
            'type',
            'id_liable',
        ],
    ]) ?>

</div>
