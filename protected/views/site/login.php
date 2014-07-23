<body class="login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="index.html">
            <img src="<?php echo Yii::app()->theme->baseUrl ?>/assets/admin/layout/img/logo-big.png" alt=""/>
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="menu-toggler sidebar-toggler">
    </div>
    <!-- END SIDEBAR TOGGLER BUTTON -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-user',
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnChange' => false,
                'validateOnSubmit' => true
            ),
        ));
        ?>
        <h3 class="form-title">Login to your account</h3>
        
        <?php echo $form->errorSummary($model) ?>
        
        <div class="form-group">
            <?php echo $form->labelEx($model, 'username', array('class' => 'control-label visible-ie8 visible-ie9')) ?>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <?php echo $form->textField($model, 'username', array('autocomplete' => 'off', 'placeholder' => 'Username', 'class' => 'form-control placeholder-no-fix')) ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'password', array('class' => 'control-label visible-ie8 visible-ie9')) ?>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <?php echo $form->passwordField($model, 'password', array('autocomplete' => 'off', 'placeholder' => 'Password', 'class' => 'form-control placeholder-no-fix')) ?>
            </div>
        </div>
        <div class="form-actions">
            <?php echo $form->checkBox($model,'rememberMe'); ?>
            <?php echo $form->label($model,'rememberMe'); ?>
            
            <button type="submit" class="btn green pull-right">
                Login <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>

        <?php $this->endWidget(); ?>
        <!-- END LOGIN FORM -->
    </div>
    <!-- END LOGIN -->
    <!-- BEGIN COPYRIGHT -->
    <div class="copyright">
        2014 &copy; Viele Laundry
    </div>
    <!-- END COPYRIGHT -->
</body>