<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provider".
 *
 * @property int $id_provider
 * @property string $name
 * @property string $rfc
 * @property string $address
 * @property string $telephone
 *
 * @property Leasing[] $leasings
 */
class Provider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_provider'], 'required'],
            [['id_provider'], 'integer'],
            [['name', 'rfc', 'address', 'telephone'], 'string', 'max' => 45],
            [['id_provider'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_provider' => Yii::t('app', 'Id Provider'),
            'name' => Yii::t('app', 'Name'),
            'rfc' => Yii::t('app', 'Rfc'),
            'address' => Yii::t('app', 'Address'),
            'telephone' => Yii::t('app', 'Telephone'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeasings()
    {
        return $this->hasMany(Leasing::className(), ['id_provider' => 'id_provider']);
    }
}
