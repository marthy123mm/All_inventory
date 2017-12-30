<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leasing".
 *
 * @property int $id_leasing
 * @property string $leasing_number
 * @property string $months
 * @property string $payment
 * @property string $start_date
 * @property string $end_date
 * @property int $id_provider
 *
 * @property Asset[] $assets
 * @property Provider $provider
 */
class Leasing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leasing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment'], 'number'],
            [['start_date', 'end_date'], 'safe'],
            [['id_provider'], 'required'],
            [['id_provider'], 'integer'],
            [['leasing_number', 'months'], 'string', 'max' => 45],
            [['id_provider'], 'exist', 'skipOnError' => true, 'targetClass' => Provider::className(), 'targetAttribute' => ['id_provider' => 'id_provider']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_leasing' => Yii::t('app', 'Id Leasing'),
            'leasing_number' => Yii::t('app', 'Leasing Number'),
            'months' => Yii::t('app', 'Months'),
            'payment' => Yii::t('app', 'Payment'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'id_provider' => Yii::t('app', 'Id Provider'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Asset::className(), ['id_leasing' => 'id_leasing']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvider()
    {
        return $this->hasOne(Provider::className(), ['id_provider' => 'id_provider']);
    }
}
