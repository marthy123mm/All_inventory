<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;

use yii\web\View;
use kartik\date\DatePicker;
use kartik\money\MaskMoney;
use app\models\Asset;
use app\models\Brand;
use app\models\Os;
use app\models\Processor;
use app\models\Leasing;


use app\models\TypeAsset;
use app\models\Currency;
use app\models\StatusAsset;
use yii\helpers\ArrayHelper;

use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use yii\web\JsExpression;

use kartik\widgets\TouchSpin;

/* @var $this yii\web\View */
/* @var $model app\models\Asset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-form">

<?php $form = ActiveForm::begin(); ?>


<div class="container">

    <div class="row">
        <div class="col-md-4">

            <?= $form->field($model, 'id_internal')->textInput(['maxlength' => true]) ?>
            <?php

                $data_type_asset = ArrayHelper::map(Typeasset::find()->all(), 'id_type_asset','type');
                    
                    
                    // Templating example of formatting each list element
                $url = \Yii::$app->urlManager->baseUrl .'/icons/assets/';

$format = <<< SCRIPT
function format(typeasset) {
    if (!typeasset.id) return typeasset.text; // optgroup
    src = '$url' +  typeasset.id + '.png'
    return '<img class ="icon_type_asset" src="' + src + '"/>' + typeasset.text;
}
SCRIPT;
                    $escape = new JsExpression("function(m) { return m; }");
                    $this->registerJs($format, View::POS_HEAD);

                
                echo $form->field($model, 'id_asset_type')->widget(Select2::classname(),[
                            
                    'data' => $data_type_asset,
                    'options' => ['placeholder' => 'Selecciona un tipo'],
                    'pluginOptions' => [
                        'templateResult' => new JsExpression('format'),
                        'templateSelection' => new JsExpression('format'),
                        'escapeMarkup' => $escape,
                        'allowClear' => true
                    ],

                ])->label(Yii::t('app', 'Type Asset'));
            ?>

            <?= $form->field($model, 'marca')->widget(Select2::classname(),[
                        'options'=>['id'=>'id_marca'],
                        'data' => ArrayHelper::map(Brand::find()->all(), 'id_brand','brand' ),
                        'pluginOptions'=>[
                            'placeholder' => ' '
                        ]
                        ]);

            ?>


            <?=

                $form->field($model, 'id_model')->widget(DepDrop::classname(), [
                    //'options'=>['id'=>'id_model'],
                    'pluginOptions'=>[
                        'depends'=>['id_marca'],
                        'placeholder'=>'Selecciona un modelo',
                        'url'=>Url::to(['/asset/searchmodels'])
                    ]
                ])->label(Yii::t('app', 'Model'));

            ?>

            <?= $form->field($model, 'id_status')->widget(Select2::classname(),[
                'data' => ArrayHelper::map(StatusAsset::find()->all(), 'id_status','status_name' ),
                ])->label(Yii::t('app', 'Status'));

            ?>

            <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

        </div>

        <div class="col-md-4">
            <?= 
                $form->field($model, 'purchase_date')->widget(DatePicker::classname(), [
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,

                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy/m/dd'
                    ]

                ])
            ?>

            

            <?= $form->field($model, 'price')->widget(MaskMoney::classname(), [
                            'pluginOptions' => [
                            'allowNegative' => false
                        ]
            ]);?>

            <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sales_check')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ubication')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_leasing')->widget(Select2::classname(),[
                'data' => ArrayHelper::map(Leasing::find()->all(), 'id_leasing','leasing_number' ),
                ])->label(Yii::t('app', 'Leasing')); ?>

        </div>

        <div class="col-md-4">
            
            <?php
                

                $data_os = ArrayHelper::map(Os::find()->all(), 'id_os','os_name');
                    
                    
                    // Templating example of formatting each list element
                $url = \Yii::$app->urlManager->baseUrl .'/icons/os/';

$format = <<< SCRIPT
function format_os(os) {
    if (!os.id) return os.text; // optgroup
    src = '$url' +  os.id + '.png'
    return '<img class ="icon_type_asset" src="' + src + '"/>' + os.text;
}
SCRIPT;
                    $escape = new JsExpression("function(m) { return m; }");
                    $this->registerJs($format, View::POS_HEAD);

                
                echo $form->field($model, 'id_os')->widget(Select2::classname(),[
                            
                    'data' => $data_os,
                    'options' => ['placeholder' => 'Selecciona un S.O'],
                    'pluginOptions' => [
                        'templateResult' => new JsExpression('format_os'),
                        'templateSelection' => new JsExpression('format_os'),
                        'escapeMarkup' => $escape,
                        'allowClear' => true
                    ],

                ])->label(Yii::t('app', 'Os'));
            ?>


            <?= $form->field($model, 'hard_disk')->widget(
                TouchSpin::classname(),[
                    'pluginOptions' => [
                        'verticalbuttons' => true,
                        'min' => 100,
                        'max' => 3000,
                        'boostat' => 5,
                        'postfix' => ' GB ',
                    ]

                ]);
            ?>

            <?= $form->field($model, 'ram')->widget(
                TouchSpin::classname(),[
                    'pluginOptions' => [
                        'verticalbuttons' => true,
                        'min' => 1,
                        'max' => 1024,
                        'postfix' => ' GB ',
                    ]

                ]);

            ?>

            <?= $form->field($model, 'id_processor')->widget(Select2::classname(),[
                'options' => ['placeholder' => ' '],
                'data' => ArrayHelper::map(Processor::find()->all(), 'id_processor','processor' ),
                ])->label(Yii::t('app', 'Processor'));

            ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

        </div>
    </div>

</div>


<?php ActiveForm::end(); ?>

</div>
