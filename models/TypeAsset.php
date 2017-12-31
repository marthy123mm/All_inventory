<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_asset".
 *
 * @property int $id_type_asset
 * @property string $type
 * @property string $description
 *
 * @property Asset[] $assets
 */
class Typeasset extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_asset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_type_asset' => Yii::t('app', 'Id Type Asset'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['id_asset_type' => 'id_type_asset']);
    }
}
