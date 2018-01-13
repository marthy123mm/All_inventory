<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_asset".
 *
 * @property int $id_status
 * @property string $status_name
 * @property string $description
 *
 * @property Asset[] $assets
 */
class StatusAsset extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_asset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_name', 'description'], 'required'],
            [['description'], 'string'],
            [['status_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_status' => Yii::t('app', 'Id Status'),
            'status_name' => Yii::t('app', 'Status Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['id_status' => 'id_status']);
    }
}
