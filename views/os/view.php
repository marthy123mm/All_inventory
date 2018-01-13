<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Os */

$this->title = $model->id_os;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Os'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="os-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_os], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_os], [
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
            'id_os',
            'os_name',
            'description:ntext',
            [
                'attribute' => 'icon',
                'format' => 'html',
                'label' => 'Imagen',
                'value' => function ($data) {
                    return Html::img($data['icon'],
                        ['width' => '50px']);
                },
                
            ],
        ],

    ]) ?>

</div>
