<?php

if (WebUser::isAdmin())
    $this->breadcrumbs = array_merge(array(
        '<i class="fa fa-home"></i> Home' => array('/'),
        'Administrator' => array('/admin'),
    ), $this->breadcrumbs);
else
    $this->breadcrumbs = array_merge(array('<i class="fa fa-home"></i> Home' => array('/site')), $this->breadcrumbs);

$this->widget('zii.widgets.CBreadcrumbs', array(
    'links' => $this->breadcrumbs,
    'homeLink' => false,
    'encodeLabel' => false,
    'tagName' => 'ul',
    'separator' => '',
    'activeLinkTemplate' => '<li><a href="{url}">{label}</a><i class="fa fa-angle-right"></i></li>',
    'inactiveLinkTemplate' => '<li>{label}</li>',
    'htmlOptions' => array('class' => 'page-breadcrumb breadcrumb')
));
?>