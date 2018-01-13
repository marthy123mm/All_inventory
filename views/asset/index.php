<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Assets');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Asset'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_asset',
            'purchase_date',
            'description:ntext',
            'sales_check',
            'create_at',
            //'price',
            //'currency',
            //'id_status',
            //'serial_number',
            //'ubication',
            //'id_os',
            //'hard_disk',
            //'ram',
            //'id_processor',
            //'id_leasing',
            //'id_model',
            //'id_asset_type',
            //'id_parent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
