<?php

/**
 * This is the model class for table "pelanggan".
 *
 * The followings are the available columns in table 'pelanggan':
 * @property integer $KODE_PELANGGAN
 * @property string $ALAMAT_PELANGGAN
 * @property string $NAMA_PELANGGAN
 * @property string $KELAMIN
 * @property string $KONTAK
 * @property string $EMAIL
 * @property integer $STATUS_PELANGGAN
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 */
class Pelanggan extends CActiveRecord {

    const AKTIF = 1, NONAKTIF = 0;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pelanggan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NAMA_PELANGGAN, KELAMIN', 'required', 'on' => 'baru, edit', 'message' => '{attribute} wajib diisi'),
            array('STATUS_PELANGGAN', 'numerical', 'integerOnly' => true),
            array('NAMA_PELANGGAN', 'length', 'max' => 255),
            array('KELAMIN', 'length', 'max' => 1),
            array('KONTAK', 'length', 'max' => 31),
            array('EMAIL', 'length', 'max' => 127),
            array('ALAMAT_PELANGGAN', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('KODE_PELANGGAN, ALAMAT_PELANGGAN, NAMA_PELANGGAN, KELAMIN, KONTAK, EMAIL, STATUS_PELANGGAN', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'order' => array(self::HAS_MANY, 'Order', 'KODE_PELANGGAN'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'KODE_PELANGGAN' => 'Kode',
            'ALAMAT_PELANGGAN' => 'Alamat Pelanggan',
            'NAMA_PELANGGAN' => 'Nama Pelanggan',
            'KELAMIN' => 'Jenis Kelamin',
            'KONTAK' => 'Kontak',
            'EMAIL' => 'Email',
            'STATUS_PELANGGAN' => 'Status Pelanggan',
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
        $criteria->condition = 'STATUS_PELANGGAN = ' . self::AKTIF;

        $criteria->compare('KODE_PELANGGAN', $this->KODE_PELANGGAN);
        $criteria->compare('ALAMAT_PELANGGAN', $this->ALAMAT_PELANGGAN, true);
        $criteria->compare('NAMA_PELANGGAN', $this->NAMA_PELANGGAN, true);
        $criteria->compare('KELAMIN', $this->KELAMIN, true);
        $criteria->compare('KONTAK', $this->KONTAK, true);
        $criteria->compare('EMAIL', $this->EMAIL, true);
        $criteria->compare('STATUS_PELANGGAN', $this->STATUS_PELANGGAN);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function searchDesc() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'STATUS_PELANGGAN = ' . self::AKTIF;
        $criteria->order = 'KODE_PELANGGAN desc';

        $criteria->compare('KODE_PELANGGAN', $this->KODE_PELANGGAN);
        $criteria->compare('ALAMAT_PELANGGAN', $this->ALAMAT_PELANGGAN, true);
        $criteria->compare('NAMA_PELANGGAN', $this->NAMA_PELANGGAN, true);
        $criteria->compare('KELAMIN', $this->KELAMIN, true);
        $criteria->compare('KONTAK', $this->KONTAK, true);
        $criteria->compare('EMAIL', $this->EMAIL, true);
        $criteria->compare('STATUS_PELANGGAN', $this->STATUS_PELANGGAN);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Pelanggan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
