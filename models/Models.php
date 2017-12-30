<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "models".
 *
 * @property int $id_model
 * @property string $model
 * @property string $picture
 * @property int $id_brand
 *
 * @property Asset[] $assets
 * @property Brand $brand
 */
class Models extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'id_brand'], 'required'],
            [['id_brand'], 'integer'],
            [['model'], 'string', 'max' => 45],
            [['picture'], 'string', 'max' => 250],
            [['id_brand'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['id_brand' => 'id_brand']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_model' => Yii::t('app', 'Id Model'),
            'model' => Yii::t('app', 'Model'),
            'picture' => Yii::t('app', 'Picture'),
            'id_brand' => Yii::t('app', 'Id Brand'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['id_model' => 'id_model']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id_brand' => 'id_brand']);
    }
}
