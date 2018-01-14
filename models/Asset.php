<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asset".
 *
 * @property int $id_asset
 * @property string $purchase_date
 * @property string $description
 * @property string $sales_check
 * @property string $create_at
 * @property string $price
 * @property string $currency
 * @property int $id_status
 * @property string $serial_number
 * @property string $ubication
 * @property int $id_os
 * @property int $hard_disk
 * @property int $ram
 * @property int $id_processor
 * @property string $id_leasing
 * @property int $id_model
 * @property int $id_asset_type
 * @property int $id_parent
 *
 * @property Os $os
 * @property Models $model
 * @property Asset $parent
 * @property Asset[] $assets
 * @property Processor $processor
 * @property StatusAsset $status
 * @property TypeAsset $assetType
 * @property HistoryAssign[] $historyAssigns
 */
class Asset extends \yii\db\ActiveRecord
{

    public $marca;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchase_date', 'price', 'currency', 'id_status', 'id_asset_type'], 'required'],
            [['purchase_date', 'create_at'], 'safe'],
            [['description'], 'string'],
            [['price', 'id_leasing'], 'number'],
            [['id_status', 'id_os', 'hard_disk', 'ram', 'id_processor', 'id_model', 'id_asset_type', 'id_parent'], 'integer'],
            [['sales_check', 'currency', 'ubication'], 'string', 'max' => 45],
            [['serial_number'], 'string', 'max' => 100],
            [['id_os'], 'exist', 'skipOnError' => true, 'targetClass' => Os::className(), 'targetAttribute' => ['id_os' => 'id_os']],
            [['id_model'], 'exist', 'skipOnError' => true, 'targetClass' => Models::className(), 'targetAttribute' => ['id_model' => 'id_model']],
            [['id_parent'], 'exist', 'skipOnError' => true, 'targetClass' => Asset::className(), 'targetAttribute' => ['id_parent' => 'id_asset']],
            [['id_processor'], 'exist', 'skipOnError' => true, 'targetClass' => Processor::className(), 'targetAttribute' => ['id_processor' => 'id_processor']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => StatusAsset::className(), 'targetAttribute' => ['id_status' => 'id_status']],
            [['id_asset_type'], 'exist', 'skipOnError' => true, 'targetClass' => TypeAsset::className(), 'targetAttribute' => ['id_asset_type' => 'id_type_asset']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_asset' => Yii::t('app', 'Id Asset'),
            'purchase_date' => Yii::t('app', 'Purchase Date'),
            'description' => Yii::t('app', 'Description'),
            'sales_check' => Yii::t('app', 'Sales Check'),
            'create_at' => Yii::t('app', 'Create At'),
            'price' => Yii::t('app', 'Price'),
            'currency' => Yii::t('app', 'Currency'),
            'id_status' => Yii::t('app', 'Id Status'),
            'serial_number' => Yii::t('app', 'Serial Number'),
            'ubication' => Yii::t('app', 'Ubication'),
            'id_os' => Yii::t('app', 'Id Os'),
            'hard_disk' => Yii::t('app', 'Hard Disk'),
            'ram' => Yii::t('app', 'Ram'),
            'id_processor' => Yii::t('app', 'Id Processor'),
            'id_leasing' => Yii::t('app', 'Id Leasing'),
            'id_model' => Yii::t('app', 'Id Model'),
            'id_asset_type' => Yii::t('app', 'Id Asset Type'),
            'id_parent' => Yii::t('app', 'Id Parent'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOs()
    {
        return $this->hasOne(Os::className(), ['id_os' => 'id_os']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Models::className(), ['id_model' => 'id_model']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Asset::className(), ['id_asset' => 'id_parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['id_parent' => 'id_asset']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcessor()
    {
        return $this->hasOne(Processor::className(), ['id_processor' => 'id_processor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(StatusAsset::className(), ['id_status' => 'id_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssetType()
    {
        return $this->hasOne(TypeAsset::className(), ['id_type_asset' => 'id_asset_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistoryAssigns()
    {
        return $this->hasMany(HistoryAssign::className(), ['id_asset' => 'id_asset']);
    }
}
