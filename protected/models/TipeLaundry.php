<?php

/**
 * This is the model class for table "tipe_laundry".
 *
 * The followings are the available columns in table 'tipe_laundry':
 * @property integer $KODE_TIPE_LAUNDRY
 * @property string $NAMA_TIPE_LAUNDRY
 * @property integer $STATUS_TIPE_LAUNDRY
 *
 * The followings are the available model relations:
 * @property Harga[] $hargas
 */
class TipeLaundry extends CActiveRecord {
    
    const AKTIF = 1, NONAKTIF = 0;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tipe_laundry';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('STATUS_TIPE_LAUNDRY', 'numerical', 'integerOnly' => true),
            array('NAMA_TIPE_LAUNDRY', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('KODE_TIPE_LAUNDRY, NAMA_TIPE_LAUNDRY, STATUS_TIPE_LAUNDRY', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'harga' => array(self::HAS_MANY, 'Harga', 'KODE_TIPE_LAUNDRY'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'KODE_TIPE_LAUNDRY' => 'Kode Tipe Laundry',
            'NAMA_TIPE_LAUNDRY' => 'Tipe Laundry',
            'STATUS_TIPE_LAUNDRY' => 'Status Tipe Laundry',
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
        $criteria->condition = 'STATUS_TIPE_LAUNDRY = :status';
        $criteria->params = array(':status' => self::AKTIF);

        $criteria->compare('KODE_TIPE_LAUNDRY', $this->KODE_TIPE_LAUNDRY);
        $criteria->compare('NAMA_TIPE_LAUNDRY', $this->NAMA_TIPE_LAUNDRY, true);
        $criteria->compare('STATUS_TIPE_LAUNDRY', $this->STATUS_TIPE_LAUNDRY);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TipeLaundry the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function listAll() {
        return CHtml::listData(self::model()->findAllByAttributes(array('STATUS_TIPE_LAUNDRY' => self::AKTIF)), 'KODE_TIPE_LAUNDRY', 'NAMA_TIPE_LAUNDRY');
    }
    
    public static function listByItem($id) {
        $item = Item::model()->findByPk($id);
        $list = array();
        foreach ($item->harga as $harga) {
            $list[$harga->KODE_TIPE_LAUNDRY] = $harga->tipelaundry->NAMA_TIPE_LAUNDRY;
        }
        
        return $list;
    }
    
    public static function cekByItem($id, $item) {
        $item = Item::model()->findByPk($item);
        $list = array();
        
        foreach ($item->harga as $harga) {
            array_push($list, $harga->KODE_TIPE_LAUNDRY);
        }
        
        return in_array($id, $list);
    }

}
