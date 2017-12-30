<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id_brand
 * @property string $brand
 *
 * @property Models[] $models
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand'], 'required'],
            [['brand'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_brand' => Yii::t('app', 'Id Brand'),
            'brand' => Yii::t('app', 'Brand'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModels()
    {
        return $this->hasMany(Models::className(), ['id_brand' => 'id_brand']);
    }
}
