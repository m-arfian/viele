<?php

/**
 * This is the model class for table "m_item".
 *
 * The followings are the available columns in table 'm_item':
 * @property integer $KODE_ITEM
 * @property string $NAMA_ITEM
 * @property integer $KODE_TIPE
 * @property integer $STATUS_ITEM
 *
 * The followings are the available model relations:
 * @property Harga[] $hargas
 * @property MTipe $kODETIPE
 */
class Item extends CActiveRecord {

    const AKTIF = 1, NONAKTIF = 0;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_item';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NAMA_ITEM, KODE_TIPE', 'required', 'on' => 'baru, edit', 'message' => '{attribute} wajib diisi'),
            array('KODE_TIPE, STATUS_ITEM', 'numerical', 'integerOnly' => true, 'message' => '{attribute} hanya boleh diisi dengan angka'),
            array('NAMA_ITEM', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('KODE_ITEM, NAMA_ITEM, KODE_TIPE, STATUS_ITEM', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'harga' => array(self::HAS_MANY, 'Harga', 'KODE_ITEM', 'on' => 'STATUS_HARGA = '.Harga::AKTIF),
            'tipe' => array(self::BELONGS_TO, 'Tipe', 'KODE_TIPE', 'on' => 'STATUS_TIPE = '.Tipe::AKTIF),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'KODE_ITEM' => 'Kode Item',
            'NAMA_ITEM' => 'Nama Item',
            'KODE_TIPE' => 'Kode Tipe',
            'STATUS_ITEM' => 'Status Item',
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
        $criteria->condition = 'STATUS_ITEM = :status';
        $criteria->params = array(':status' => self::AKTIF);

        $criteria->compare('KODE_ITEM', $this->KODE_ITEM);
        $criteria->compare('NAMA_ITEM', $this->NAMA_ITEM, true);
        $criteria->compare('KODE_TIPE', $this->KODE_TIPE);
        $criteria->compare('STATUS_ITEM', $this->STATUS_ITEM);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function listYetHarga() {
        $listtipel = TipeLaundry::listAll();
        $ontipel = array();
        foreach($this->harga as $harga) {
            $ontipel[$harga->KODE_TIPE_LAUNDRY] = $harga->tipelaundry->NAMA_TIPE_LAUNDRY;
        }
        
        return array_diff_assoc($listtipel, $ontipel);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Item the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function findAllAktif() {
        return self::model()->findAllByAttributes(array('STATUS_ITEM' => self::AKTIF));
    }
    
    public static function ListGrup() {
        $tipe = Tipe::model()->findAllAktif();
        $list = array();
        foreach($tipe as $t) {
            $sublist = array();
            foreach ($t->item as $item) {
                $sublist[$item->KODE_ITEM] = $item->NAMA_ITEM;
            }
            
            $list[$t->NAMA_TIPE] = $sublist;
        }
        
        return $list;
    }
    
    public static function ListGrupOrder($tipe) {
        // dari pria, wanita, dst
        $criteria = new CDbCriteria(array(
            'with' => array(
                'harga' => array(
                    'joinType' => 'inner join',
                    'condition' => 'STATUS_HARGA = :sharga',
                    'params' => array(':sharga' => Harga::AKTIF)
                )
            ),
            'condition' => 'KODE_TIPE = :tipe AND STATUS_ITEM = :status',
            'params' => array(':tipe' => $tipe, ':status' => self::AKTIF),
            'together' => true
        ));
        
        return CHtml::listData(self::model()->findAll($criteria), 'KODE_ITEM', 'NAMA_ITEM');
    }
    
    public static function ListTipeOrder($tipe) {
        // dari laundry, dry cleaning, dst
        $criteria = new CDbCriteria(array(
            'with' => array(
                'harga' => array(
                    'joinType' => 'inner join',
                    'condition' => 'STATUS_HARGA = :sharga',
                    'params' => array(':sharga' => Harga::AKTIF)
                )
            ),
            'condition' => 'KODE_TIPE = :tipe AND STATUS_ITEM = :status',
            'params' => array(':tipe' => $tipe, ':status' => self::AKTIF),
            'together' => true
        ));
        
        return CHtml::listData(self::model()->findAll($criteria), 'KODE_ITEM', 'NAMA_ITEM');
    }

}
