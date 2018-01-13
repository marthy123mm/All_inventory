<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "os".
 *
 * @property int $id_os
 * @property string $os_name
 * @property string $description
 *
 * @property Asset[] $assets
 */
class Os extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'os';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['os_name', 'description'], 'required'],
            [['description','icon'], 'string'],
            [['os_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_os' => Yii::t('app', 'Id Os'),
            'os_name' => Yii::t('app', 'Os Name'),
            'description' => Yii::t('app', 'Description'),

            'icon' => Yii::t('app', 'Icon'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['id_os' => 'id_os']);
    }
}
