<?php

/**
 * This is the model class for table "m_tipe".
 *
 * The followings are the available columns in table 'm_tipe':
 * @property integer $KODE_TIPE
 * @property string $NAMA_TIPE
 * @property integer $STATUS_TIPE
 *
 * The followings are the available model relations:
 * @property MItem[] $mItems
 */
class Tipe extends CActiveRecord {

    const AKTIF = 1, NONAKTIF = 0;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_tipe';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('STATUS_TIPE', 'numerical', 'integerOnly' => true),
            array('NAMA_TIPE', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('KODE_TIPE, NAMA_TIPE, STATUS_TIPE', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'item' => array(self::HAS_MANY, 'Item', 'KODE_TIPE'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'KODE_TIPE' => 'Kode Tipe',
            'NAMA_TIPE' => 'Nama Tipe',
            'STATUS_TIPE' => 'Status Tipe',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('KODE_TIPE', $this->KODE_TIPE);
        $criteria->compare('NAMA_TIPE', $this->NAMA_TIPE, true);
        $criteria->compare('STATUS_TIPE', $this->STATUS_TIPE);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function findAllAktif() {
        return self::model()->findAllByAttributes(array('STATUS_TIPE' => self::AKTIF));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tipe the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function listAll() {
        return CHtml::listData(self::model()->findAllByAttributes(array('STATUS_TIPE' => self::AKTIF)), 'KODE_TIPE', 'NAMA_TIPE');
    }

}
