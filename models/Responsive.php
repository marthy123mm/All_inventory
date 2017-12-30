<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsive".
 *
 * @property int $id_responsive
 * @property string $start_date
 * @property string $end_date
 * @property int $status
 * @property int $type
 * @property int $id_liable
 *
 * @property HistoryAssign[] $historyAssigns
 * @property Employe $liable
 * @property Office $liable0
 */
class Responsive extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'responsive';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date', 'status', 'type', 'id_liable'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['status', 'type', 'id_liable'], 'integer'],
            [['id_liable'], 'exist', 'skipOnError' => true, 'targetClass' => Employe::className(), 'targetAttribute' => ['id_liable' => 'id_employe']],
            [['id_liable'], 'exist', 'skipOnError' => true, 'targetClass' => Office::className(), 'targetAttribute' => ['id_liable' => 'id_office']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_responsive' => Yii::t('app', 'Id Responsive'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'status' => Yii::t('app', 'Status'),
            'type' => Yii::t('app', 'Type'),
            'id_liable' => Yii::t('app', 'Id Liable'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistoryAssigns()
    {
        return $this->hasMany(HistoryAssign::className(), ['id_responsive' => 'id_responsive']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLiable()
    {
        return $this->hasOne(Employe::className(), ['id_employe' => 'id_liable']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLiable0()
    {
        return $this->hasOne(Office::className(), ['id_office' => 'id_liable']);
    }
}
