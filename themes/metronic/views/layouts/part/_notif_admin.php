<?php $notif = Notifikasi::modelUnread() ?>

<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true" id="notifbtn">
        <i class="icon-bell"></i>
        <?php if ($notif != null): ?>
            <span class="badge badge-default" id="notifnum"><?php echo count($notif) ?> </span>
        <?php endif ?>
    </a>
    <ul class="dropdown-menu">
        <li>
            <p>
                Ada <?php echo count($notif) ?> notifikasi baru
            </p>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: 250px;">
                <?php foreach ($notif as $n): ?>
                    <li>
                        <?php echo CHtml::link($n->getIcon() . $n->TEKS_NOTIFIKASI . "<div class='time'>" . MyFormatter::formatTanggal($n->TGL_NOTIFIKASI) . "</div>", $n->LINK_NOTIFIKASI) ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </li>
    </ul>
</li>

<script>
    $('#notifbtn').click(function(e) {
        e.preventDefault();
        $("#notifnum").remove();
        
        $.post("<?php echo Yii::app()->baseUrl . '/admin/default/hapusnotif' ?>");
    });
</script>