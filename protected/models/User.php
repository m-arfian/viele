<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property integer $ROLE
 * @property string $LAST_LOGIN
 * @property integer $STATUS_USER
 */
class User extends CActiveRecord {

    const AKTIF = 1, NONAKTIF = 0;
    
    public $PASSLAMA, $CONFIRM;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ROLE, USERNAME, PASSWORD, CONFIRM', 'required', 'on' => 'baru', 'message' => '{attribute} wajib diisi'),
            array('ROLE, USERNAME, PASSWORD, PASSLAMA, CONFIRM', 'required', 'on' => 'edit', 'message' => '{attribute} wajib diisi'),
            array('PASSWORD', 'cekpassbaru', 'on' => 'baru, edit'),
            array('PASSLAMA', 'cekpasslama', 'on' => 'edit'),
            array('ROLE, STATUS_USER', 'numerical', 'integerOnly' => true),
            array('USERNAME', 'length', 'max' => 25),
            array('PASSWORD', 'length', 'max' => 32),
            array('LAST_LOGIN', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('USERNAME, PASSWORD, ROLE, LAST_LOGIN, STATUS_USER', 'safe', 'on' => 'search'),
        );
    }
    
    public function cekpassbaru($attributes, $params) {
        $data = $this->{$attributes};
        if ($data != $this->CONFIRM) {
            $this->addError('CONFIRM', 'Password tidak sama');
        }
        
        if ($this->hasErrors()) {
            $this->PASSWORD = '';
            $this->CONFIRM = '';
        }
    }
    
    public function cekpasslama($attributes, $params) {
        $data = $this->{$attributes};
        $model = User::model()->findByPk($this->USERNAME);
        if($model === null)
            $this->addError($attributes, 'Password salah');
        else {
            if($model->PASSWORD != md5($data))
                $this->addError($attributes, 'Password salah');
        }
        
        if ($this->hasErrors()) {
            $this->PASSWORD = '';
            $this->CONFIRM = '';
            $this->PASSLAMA = '';
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'order' => array(self::HAS_MANY, 'Order', 'USERNAME'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'USERNAME' => 'Username',
            'PASSWORD' => $this->scenario == 'edit' ? 'Password baru' : 'Password',
            'PASSLAMA' => 'Password Lama',
            'CONFIRM' => 'Konfirmasi Password',
            'ROLE' => 'Role',
            'LAST_LOGIN' => 'Last Login',
            'STATUS_USER' => 'Status User',
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
        $criteria->condition = 'STATUS_USER = ' . self::AKTIF;

        $criteria->compare('USERNAME', $this->USERNAME, true);
        $criteria->compare('PASSWORD', $this->PASSWORD, true);
        $criteria->compare('ROLE', $this->ROLE);
        $criteria->compare('LAST_LOGIN', $this->LAST_LOGIN, true);
        $criteria->compare('STATUS_USER', $this->STATUS_USER);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    protected function beforeValidate() {
        $this->PASSWORD = md5($this->PASSWORD);
        $this->CONFIRM = md5($this->CONFIRM);
        
        return parent::beforeValidate();
    }

}
