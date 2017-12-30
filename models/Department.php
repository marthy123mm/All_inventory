<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id_department
 * @property string $department
 *
 * @property Employe[] $employes
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_department'], 'required'],
            [['id_department'], 'integer'],
            [['department'], 'string', 'max' => 45],
            [['id_department'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_department' => Yii::t('app', 'Id Department'),
            'department' => Yii::t('app', 'Department'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployes()
    {
        return $this->hasMany(Employe::className(), ['id_department' => 'id_department']);
    }
}
