<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employe".
 *
 * @property int $id_employe
 * @property string $fist_name
 * @property string $last_name
 * @property string $telephone
 * @property string $cellphone
 * @property string $email
 * @property string $hire_date
 * @property int $status
 * @property int $id_department
 * @property int $id_office
 *
 * @property Department $department
 * @property Office $office
 * @property Responsive[] $responsives
 */
class Employe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_employe', 'id_department', 'id_office'], 'required'],
            [['id_employe', 'status', 'id_department', 'id_office'], 'integer'],
            [['hire_date'], 'safe'],
            [['fist_name', 'last_name', 'telephone', 'cellphone', 'email'], 'string', 'max' => 45],
            [['id_employe'], 'unique'],
            [['id_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['id_department' => 'id_department']],
            [['id_office'], 'exist', 'skipOnError' => true, 'targetClass' => Office::className(), 'targetAttribute' => ['id_office' => 'id_office']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_employe' => Yii::t('app', 'Id Employe'),
            'fist_name' => Yii::t('app', 'Fist Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'telephone' => Yii::t('app', 'Telephone'),
            'cellphone' => Yii::t('app', 'Cellphone'),
            'email' => Yii::t('app', 'Email'),
            'hire_date' => Yii::t('app', 'Hire Date'),
            'status' => Yii::t('app', 'Status'),
            'id_department' => Yii::t('app', 'Id Department'),
            'id_office' => Yii::t('app', 'Id Office'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id_department' => 'id_department']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffice()
    {
        return $this->hasOne(Office::className(), ['id_office' => 'id_office']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsives()
    {
        return $this->hasMany(Responsive::className(), ['id_liable' => 'id_employe']);
    }
}
