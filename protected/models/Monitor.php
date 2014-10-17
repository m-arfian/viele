<?php

/**
 * This is the model class for table "monitor".
 *
 * The followings are the available columns in table 'monitor':
 * @property integer $KODE_MONITOR
 * @property string $USERNAME
 * @property string $TGL_KERJA
 * @property string $TGL_PULANG
 * @property string $LOGIN
 * @property string $LOGOUT
 *
 * The followings are the available model relations:
 * @property User $uSERNAME
 */
class Monitor extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'monitor';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('USERNAME', 'required', 'on' => 'login'),
            array('KODE_MONITOR', 'numerical', 'integerOnly' => true),
            array('USERNAME', 'length', 'max' => 25),
            array('TGL_KERJA, TGL_PULANG, LOGIN, LOGOUT', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('KODE_MONITOR, USERNAME, TGL_KERJA, TGL_PULANG, LOGIN, LOGOUT', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'USERNAME'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'KODE_MONITOR' => 'Kode Monitor',
            'USERNAME' => 'Username',
            'TGL_KERJA' => 'Tgl Kerja',
            'TGL_PULANG' => 'Tgl Pulang',
            'LOGIN' => 'Login',
            'LOGOUT' => 'Logout',
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
        $criteria->order = 'KODE_MONITOR desc';

        $criteria->compare('KODE_MONITOR', $this->KODE_MONITOR);
        $criteria->compare('USERNAME', $this->USERNAME, true);
        $criteria->compare('TGL_KERJA', $this->TGL_KERJA, true);
        $criteria->compare('TGL_PULANG', $this->TGL_PULANG, true);
        $criteria->compare('LOGIN', $this->LOGIN, true);
        $criteria->compare('LOGOUT', $this->LOGOUT, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Monitor the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    protected function beforeSave() {
        if($this->scenario = 'login') {
            $this->TGL_KERJA = date('Y-m-d');
            $this->LOGIN = date('H:i:s');
        }
        
        return parent::beforeSave();
    }

}
