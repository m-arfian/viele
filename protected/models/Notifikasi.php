<?php

/**
 * This is the model class for table "notifikasi".
 *
 * The followings are the available columns in table 'notifikasi':
 * @property integer $KODE_NOTIFIKASI
 * @property string $TIPE_NOTIFIKASI
 * @property string $TEKS_NOTIFIKASI
 * @property string $LINK_NOTIFIKASI
 * @property string $TGL_NOTIFIKASI
 * @property integer $STATUS_NOTIFIKASI
 */
class Notifikasi extends CActiveRecord {

    const UNREAD = 1, READ = 0;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'notifikasi';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('STATUS_NOTIFIKASI', 'numerical', 'integerOnly' => true),
            array('TIPE_NOTIFIKASI, LINK_NOTIFIKASI', 'length', 'max' => 255),
            array('TEKS_NOTIFIKASI, TGL_NOTIFIKASI', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('KODE_NOTIFIKASI, TIPE_NOTIFIKASI, TEKS_NOTIFIKASI, LINK_NOTIFIKASI, TGL_NOTIFIKASI, STATUS_NOTIFIKASI', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'KODE_NOTIFIKASI' => 'Kode Notifikasi',
            'TIPE_NOTIFIKASI' => 'Tipe Notifikasi',
            'TEKS_NOTIFIKASI' => 'Teks Notifikasi',
            'LINK_NOTIFIKASI' => 'Link Notifikasi',
            'TGL_NOTIFIKASI' => 'Tgl Notifikasi',
            'STATUS_NOTIFIKASI' => 'Status Notifikasi',
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

        $criteria->compare('KODE_NOTIFIKASI', $this->KODE_NOTIFIKASI);
        $criteria->compare('TIPE_NOTIFIKASI', $this->TIPE_NOTIFIKASI, true);
        $criteria->compare('TEKS_NOTIFIKASI', $this->TEKS_NOTIFIKASI, true);
        $criteria->compare('LINK_NOTIFIKASI', $this->LINK_NOTIFIKASI, true);
        $criteria->compare('TGL_NOTIFIKASI', $this->TGL_NOTIFIKASI, true);
        $criteria->compare('STATUS_NOTIFIKASI', $this->STATUS_NOTIFIKASI);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function getIcon() {
        switch ($this->TIPE_NOTIFIKASI) {
            case 'NP':
                return '<span class="label label-sm label-icon label-success"><i class="fa fa-user"></i></span>';
            case 'NO':
                return '<span class="label label-sm label-icon label-info"><i class="fa fa-language"></i></span>';
            default :
                return '<span class="label label-sm label-icon label-danger"><i class="fa fa-circle"></i></span>';
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Notifikasi the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function modelUnread() {
        $criteria = new CDbCriteria;
        $criteria->limit = 5;
        $criteria->condition = 'STATUS_NOTIFIKASI = '.self::UNREAD;
        $criteria->order = 'KODE_NOTIFIKASI desc';
        
        return self::model()->findAll($criteria);
    }

    public static function listTipe() {
        return array(
            'NP', 'NO'
        );
    }

    protected function beforeValidate() {
        if ($this->scenario == 'baru') {
            $this->TGL_NOTIFIKASI = date('Y-m-d H:i:s');
        }

        return parent::beforeValidate();
    }
    
    public static function countNotif() {
        $notif = Notifikasi::modelUnread();
        
        return count($notif);
    }

}
