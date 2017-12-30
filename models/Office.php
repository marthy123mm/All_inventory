<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "office".
 *
 * @property int $id_office
 * @property string $name
 * @property string $address
 * @property string $telephone
 *
 * @property Employe[] $employes
 * @property Responsive[] $responsives
 */
class Office extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'office';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_office'], 'required'],
            [['id_office'], 'integer'],
            [['name', 'address', 'telephone'], 'string', 'max' => 45],
            [['id_office'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_office' => Yii::t('app', 'Id Office'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'telephone' => Yii::t('app', 'Telephone'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployes()
    {
        return $this->hasMany(Employe::className(), ['id_office' => 'id_office']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsives()
    {
        return $this->hasMany(Responsive::className(), ['id_liable' => 'id_office']);
    }
}
