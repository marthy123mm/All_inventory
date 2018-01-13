<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "processor".
 *
 * @property int $id_processor
 * @property string $processor
 *
 * @property Asset[] $assets
 */
class Processor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'processor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['processor'], 'required'],
            [['processor'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_processor' => Yii::t('app', 'Id Processor'),
            'processor' => Yii::t('app', 'Processor'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['id_processor' => 'id_processor']);
    }
}
