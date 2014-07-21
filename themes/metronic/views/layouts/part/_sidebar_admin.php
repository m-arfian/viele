<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper hidden-xs">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search" action="extra_search.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Pelanggan">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="start active">
                <?php echo CHtml::link('<i class="icon-home"></i><span class="title">Home</span><span class="selected"></span>', array('/')) ?>
            </li>
            <li>
                <?php echo CHtml::link('<i class="icon-user-following"></i><span class="title">Manajemen Pelanggan</span>', array('/admin/pelanggan')) ?>
            </li>
            <li>
                <?php echo CHtml::link('<i class="icon-basket-loaded"></i><span class="title">Manajemen Order</span>', array('/admin/order')) ?>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="icon-folder"></i>
                    <span class="title">Data Master</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <?php echo CHtml::link('<i class="icon-doc"></i> Harga', array('/admin/harga')) ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('<i class="icon-doc"></i> Tipe Laundry', array('/admin/tipelaundry')) ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('<i class="icon-doc"></i> Item', array('/admin/item')) ?>
                    </li>
                </ul>
            </li>
<!--            <li>
                <?php echo CHtml::link('<i class="icon-users"></i><span class="title">Manajemen User</span>', array('/admin/user')) ?>
            </li>-->
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->