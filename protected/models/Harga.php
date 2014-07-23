<?php

/**
 * This is the model class for table "harga".
 *
 * The followings are the available columns in table 'harga':
 * @property integer $KODE_HARGA
 * @property integer $KODE_ITEM
 * @property integer $KODE_TIPE_LAUNDRY
 * @property integer $NOMINAL_HARGA
 * @property integer $STATUS_HARGA
 *
 * The followings are the available model relations:
 * @property MItem $kODEITEM
 * @property TipeLaundry $kODETIPELAUNDRY
 */
class Harga extends CActiveRecord {
    
    const AKTIF = 1, NONAKTIF = 0;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'harga';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('KODE_ITEM, KODE_TIPE_LAUNDRY, NOMINAL_HARGA', 'required', 'on' => 'baru, edit', 'message' => '{attribute} wajib diisi'),
            array('KODE_ITEM, KODE_TIPE_LAUNDRY, NOMINAL_HARGA, STATUS_HARGA', 'numerical', /*'integerOnly' => true,*/ 'message' => '{attribute} hanya boleh diisi dengan angka'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('KODE_HARGA, KODE_ITEM, KODE_TIPE_LAUNDRY, NOMINAL_HARGA, STATUS_HARGA', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'item' => array(self::BELONGS_TO, 'Item', 'KODE_ITEM'),
            'tipelaundry' => array(self::BELONGS_TO, 'TipeLaundry', 'KODE_TIPE_LAUNDRY'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'KODE_HARGA' => 'Kode Harga',
            'KODE_ITEM' => 'Kode Item',
            'KODE_TIPE_LAUNDRY' => 'Kode Tipe Laundry',
            'NOMINAL_HARGA' => 'Nominal Harga',
            'STATUS_HARGA' => 'Status Harga',
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
        $criteria->condition = 'STATUS_HARGA = :status';
        $criteria->params = array(':status' => self::AKTIF);

        $criteria->compare('KODE_HARGA', $this->KODE_HARGA);
        $criteria->compare('KODE_ITEM', $this->KODE_ITEM);
        $criteria->compare('KODE_TIPE_LAUNDRY', $this->KODE_TIPE_LAUNDRY);
        $criteria->compare('NOMINAL_HARGA', $this->NOMINAL_HARGA);
        $criteria->compare('STATUS_HARGA', $this->STATUS_HARGA);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function searchByItem($id) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'KODE_ITEM = :item AND STATUS_HARGA = :status';
        $criteria->params = array(':item' => $id, ':status' => self::AKTIF);

        $criteria->compare('KODE_HARGA', $this->KODE_HARGA);
        $criteria->compare('KODE_ITEM', $this->KODE_ITEM);
        $criteria->compare('KODE_TIPE_LAUNDRY', $this->KODE_TIPE_LAUNDRY);
        $criteria->compare('NOMINAL_HARGA', $this->NOMINAL_HARGA);
        $criteria->compare('STATUS_HARGA', $this->STATUS_HARGA);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Harga the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    protected function beforeValidate() {
        $this->NOMINAL_HARGA = str_replace('.', '', $this->NOMINAL_HARGA);
        
        return parent::beforeValidate();
    }
    
    public static function findAktif($item, $tipel) {
        return Harga::model()->findByAttributes(array('KODE_TIPE_LAUNDRY' => $tipel, 'KODE_ITEM' => $item, 'STATUS_HARGA' => Harga::AKTIF));
    }
    
    public static function getHargaById($id) {
        return Harga::model()->findByPk($id)->NOMINAL_HARGA;
    }

}
