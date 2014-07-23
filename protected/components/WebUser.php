<?php

class WebUser extends CWebUser {

    const ROLE_ADMIN = '1';
    const ROLE_KASIR = '2';

    private $_model;

    public static function isAdmin() {
        return (Yii::app()->user->getState('role') == WebUser::ROLE_ADMIN);
    }

    public static function isKasir() {
        return (Yii::app()->user->getState('role') == WebUser::ROLE_KASIR);
    }

    public static function isGuest() {
        return Yii::app()->user->isGuest;
    }
    
    public function checkAccess($action, $params = array()) {
        $role = $this->getState('role');
        return ($action === $role);
    }

}

?>
