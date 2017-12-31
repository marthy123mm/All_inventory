<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Employes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employe-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Employe'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_employe',
            'fist_name',
            'last_name',
            'telephone',
            'cellphone',
            //'email:email',
            //'hire_date',
            //'status',
            //'id_department',
            //'id_office',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
