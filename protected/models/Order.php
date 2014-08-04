<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property string $KODE_ORDER
 * @property integer $KODE_PELANGGAN
 * @property integer $ESTIMASI_SELESAI
 * @property integer $PENGAMBILAN
 * @property integer $DISKON
 * @property string $KETERANGAN
 * @property integer $STATUS_ORDER
 *
 * The followings are the available model relations:
 * @property Pelanggan $kODEPELANGGAN
 * @property OrderDetail[] $orderDetails
 */
class Order extends CActiveRecord {

    const AMBIL = 1, ANTAR = 2, EXPRESS = 3;
    const PENDING = 0, SELESAI = 1, DIAMBIL = 2;

    public $NAMA, $SUBTOTAL, $TOTAL, $TGL_ORDER_X;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'order';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('KODE_PELANGGAN, ESTIMASI_SELESAI, PENGAMBILAN, DISKON, STATUS_ORDER', 'required', 'on' => 'baru, edit', 'message' => '{attribute} wajib diisi'),
            array('KODE_PELANGGAN, ESTIMASI_SELESAI, PENGAMBILAN, DISKON, STATUS_ORDER', 'numerical', 'integerOnly' => true),
            array('BIAYA_ANTAR', 'numerical', 'message' => '{attribute} harus diisi angka'),
            array('TGL_ORDER, TGL_DIAMBIL, TGL_SELESAI, KETERANGAN', 'safe'),
            array('USERNAME', 'length', 'max' => 25),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('KODE_ORDER, KODE_PELANGGAN, ESTIMASI_SELESAI, PENGAMBILAN, DISKON, TGL_ORDER, TGL_DIAMBIL, TGL_SELESAI, KETERANGAN, STATUS_ORDER, NAMA', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pelanggan' => array(self::BELONGS_TO, 'Pelanggan', 'KODE_PELANGGAN'),
            'user' => array(self::BELONGS_TO, 'User', 'USERNAME'),
            'orderdetail' => array(self::HAS_MANY, 'OrderDetail', 'KODE_ORDER'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'KODE_ORDER' => 'Kode Order',
            'KODE_PELANGGAN' => 'Kode Pelanggan',
            'ESTIMASI_SELESAI' => 'Estimasi Selesai',
            'PENGAMBILAN' => 'Pengambilan',
            'BIAYA_ANTAR' => 'Biaya Tambahan',
            'DISKON' => 'Diskon',
            'TGL_ORDER' => 'Tanggal Order',
            'TGL_SELESAI' => 'Tanggal Selesai',
            'TGL_DIAMBIL' => 'Tanggal Diambil',
            'KETERANGAN' => 'Keterangan',
            'USERNAME' => 'User pegawai bertugas',
            'STATUS_ORDER' => 'Status Order',
            'NAMA' => 'Nama Pelanggan',
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
        $criteria->order = 'KODE_ORDER desc';
        $criteria->with = array('pelanggan');
        $criteria->together = true;
        $criteria->addBetweenCondition('TGL_ORDER', date('Y-m-01',strtotime('this month')), date('Y-m-t',strtotime('this month')));

        $criteria->compare('KODE_ORDER', $this->KODE_ORDER, true);
        $criteria->compare('KODE_PELANGGAN', $this->KODE_PELANGGAN);
        $criteria->compare('ESTIMASI_SELESAI', $this->ESTIMASI_SELESAI);
        $criteria->compare('PENGAMBILAN', $this->PENGAMBILAN);
        $criteria->compare('BIAYA_ANTAR', $this->BIAYA_ANTAR);
        $criteria->compare('DISKON', $this->DISKON);
        $criteria->compare('TGL_ORDER', $this->TGL_ORDER, true);
        $criteria->compare('TGL_SELESAI', $this->TGL_SELESAI, true);
        $criteria->compare('TGL_DIAMBIL', $this->TGL_DIAMBIL, true);
        $criteria->compare('KETERANGAN', $this->KETERANGAN, true);
        $criteria->compare('USERNAME', $this->USERNAME, true);
        $criteria->compare('STATUS_ORDER', $this->STATUS_ORDER);
        $criteria->compare('pelanggan.NAMA_PELANGGAN', $this->NAMA, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Order the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeValidate() {
        if ($this->scenario == 'baru') {
            $this->TGL_ORDER = date('Y-m-d H:i:s');
            $this->STATUS_ORDER = self::PENDING;
            $this->USERNAME = Yii::app()->user->nama;
        } else if ($this->scenario == 'selesai') {
            $this->TGL_SELESAI = date('Y-m-d H:i:s');
            $this->STATUS_ORDER = self::SELESAI;
        } else if ($this->scenario == 'ambil') {
            $this->TGL_DIAMBIL = date('Y-m-d H:i:s');
            $this->STATUS_ORDER = self::AMBIL;
        }
        
        $this->BIAYA_ANTAR = str_replace('.', '', $this->BIAYA_ANTAR);
        
        return parent::beforeValidate();
    }

    protected function afterSave() {
        if ($this->scenario == 'baru') {
            $notif = new Notifikasi('baru');
            $notif->TIPE_NOTIFIKASI = 'NO';
            $notif->LINK_NOTIFIKASI = Yii::app()->baseUrl . "/admin/order/view/$this->KODE_ORDER";
            $notif->TEKS_NOTIFIKASI = "Order baru #$this->KODE_ORDER";
            $notif->save();
        }

        return parent::afterSave();
    }

    protected function afterFind() {
        parent::afterFind();
        $this->SUBTOTAL = $this->getSubtotal();
        $this->TOTAL = $this->getTotal();
    }

    public function getSubtotal() {
        $subtotal = 0;
        foreach ($this->orderdetail as $detail) {
            $subtotal += ($detail->REAL_HARGA * $detail->JUMLAH);
        }

        return $subtotal;
    }

    public function getTotal() {
        $subtotal = $this->SUBTOTAL;

        return $subtotal - ($subtotal * ($this->DISKON / 100)) + $this->BIAYA_ANTAR;
    }

    public function getStatus() {
        switch ($this->STATUS_ORDER) {
            case self::PENDING:
                return '<span class="label label-warning">Pending</span>';
            case self::SELESAI:
                return '<span class="label label-primary">Selesai</span>';
            case self::DIAMBIL:
                return '<span class="label label-success">Sudah diambil</span>';
            default:
                return '';
        }
    }

    public function getPengambilan() {
        switch ($this->PENGAMBILAN) {
            case self::AMBIL:
                return '<span class="label label-info">Diambil sendiri</span>';
            case self::ANTAR:
                return '<span class="label label-warning">Diantar</span>';
            case self::EXPRESS:
                return '<span class="label label-danger">Express</span>';
            default:
                return '';
        }
    }

    public static function listStatus() {
        return array(
            self::PENDING => 'Pending',
            self::SELESAI => 'Selesai',
            self::DIAMBIL => 'Sudah diambil'
        );
    }

    public static function listPengambilan() {
        return array(
            self::AMBIL => 'Diambil sendiri',
            self::ANTAR => 'Diantar',
            self::EXPRESS => 'Express'
        );
    }

    public static function todayKredit($day, $month, $year) {
        $date = date('Y-m-d', strtotime($year.'-'.$month.'-'.$day));

        $criteria = new CDbCriteria;
        $criteria->condition = "TGL_ORDER like '$date%'";
        $order = self::model()->findAll($criteria);

        $total = 0;
        foreach ($order as $o) { $total += $o->TOTAL; }

        return $total;
    }

}
