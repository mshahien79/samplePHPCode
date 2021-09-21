<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link type="text/css"  href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/Ionicons/css/ionicons.min.css">

    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/css/bootstrapValidator.min.css">
    <link rel="stylesheet" href="/css/bootstrap-table.css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('path') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{{ config('app.name', 'Laravel') }}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{ $usrmsgscount }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{ $usrmsgscount }} unread messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach ($usrmsgs as $usrmsg)

                  <li><!-- start message -->
                    <a href="/appusers/viewmsgdet/{{ $usrmsg->id }}">
                      <div class="pull-left">
                        <img src="/img/user2-160x160.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        {{ $usrmsg->msg_from }}
                        <small><i class="fa fa-clock-o"></i></small>
                      </h4>
                      <p>{{ $usrmsg->msg_sub }}</p>
                    </a>
                  </li>
                  <!-- end message -->
                  @endforeach
                </ul>
              </li>
              <li class="footer"><a href="/appusers/viewmsg">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/img/user2-160x160.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/img/user2-160x160.png" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <small>{{ Auth::user()->email }}</small>
                  @if (Auth::user()->role_id === '1')
                  <small>Admin</small>
                  @elseif (Auth::user()->role_id === '2')
                  <small>User</small>
                  @else
                  <small>Guest{{ Auth::user()->role_id }}</small>
                  @endif
                </p>

              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-left">
                  <a href="/appusers/resetpass/{{ Auth::id() }}" class="btn btn-default btn-flat">Reset Password</a>
                </div>
                <div class="pull-left">
                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      {{-- search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
       /.search form  --}}
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li class="treeview @if(Request::is('home')) active @endif">
          <a href="@if(Request::is('home')) javascript:void @else {{ url('/home') }} @endif"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>

        {{-- Navigation --}}
          <li class="header">NAVIGATION</li>

          <li class="treeview @if(Request::is('turkey*/*')||Request::is('weights/*')||Request::is('*closebatch*')||Request::is('barnjournal/*')) active @endif">
            <a href="#">
              <i class="glyphicon glyphicon-cog"></i> <span>العمليات</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('barnjournal/create')) active @endif"><a href="{{ url('/barnjournal/create') }}"><i class="fa fa-circle-o"></i>يومية عنبر</a></li>
              <li class="@if(Request::is('turkeybreedingjournal/create')) active @endif"><a href="{{ url('/turkeybreedingjournal/create') }}"><i class="fa fa-circle-o"></i>اضافة زيادة في الاوزان</a></li>
              <li class="@if(Request::is('fixedcoststrx/create')) active @endif"><a href="{{ url('/fixedcoststrx/create') }}"><i class="fa fa-circle-o"></i>اضافة تكاليف ثابتة شهري</a></li>
              <li class="@if(Request::is('fixedcoststrx/view')) active @endif"><a href="{{ url('/fixedcoststrx/view') }}"><i class="fa fa-circle-o"></i> التكاليف الثابتة / شهري</a></li>
              <li class="@if(Request::is('weights/view')) active @endif"><a href="{{ url('/weights/view') }}"><i class="fa fa-circle-o"></i>كل الاوزان/ باتش</a></li>
              <li class="@if(Request::is('turkeyvaccs/view')) active @endif"><a href="{{ url('/turkeyvaccs/view') }}"><i class="fa fa-circle-o"></i>تطعيمات</a></li>
              <li class="@if(Request::is('turkeyoperation/create')) active @endif"><a href="{{ url('/turkeyoperation/create') }}"><i class="fa fa-circle-o"></i> اضافة مجموعة طيور للعنبر</a></li>
              <li class="@if(Request::is('turkeyoperation/view')) active @endif"><a href="{{ url('/turkeyoperation/view') }}"><i class="fa fa-circle-o"></i> كل الموجود في العنابر الان</a></li>
              <li class="@if(Request::is('barns/closebatch/selectBatch')) active @endif"><a href="{{ url('/barns/closebatch/selectBatch') }}"><i class="fa fa-circle-o"></i>اغلاق الباتش و اخلاء العنبر</a></li>
              <li class="@if(Request::is('barns/closebatch1/adminselectBatch')) active @endif"><a href="{{ url('/barns/closebatch1/adminselectBatch') }}"><i class="fa fa-circle-o"></i> اغلاق الباتش و اخلاء العنبر(Admin)</a></li>
              <li class="@if(Request::is('turkeyoperation/mortadminselectBatch')) active @endif"><a href="{{ url('/turkeyoperation/mortadminselectBatch') }}"><i class="fa fa-circle-o"></i>تعديل نافق ذكر / اتثي(Admin)</a></li>
            </ul>
          </li>

          <li class="treeview @if(Request::is('sales/*')) active @endif">
            <a href="#">
              <i class="fa fa-shopping-cart"></i> <span>المبيعات</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('/newsales/selectbatch')) active @endif"><a href="{{ url('/newsales/selectbatch') }}"><i class="fa fa-circle-o"></i> اضافة مبيعات </a></li>
              <li class="@if(Request::is('sales/view')) active @endif"><a href="{{ url('/sales/view') }}"><i class="fa fa-circle-o"></i> كل المبيعات</a></li>
            </ul>
          </li>



          <li class="treeview @if(Request::is('*purchases/*')) active @endif">
            <a href="#">
              <i class="fa fa-shopping-bag"></i> <span>المشتريات</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('purchases/create')) active @endif"><a href="{{ url('/purchases/create') }}"><i class="fa fa-circle-o"></i>شراء باتش طيور جديد</a></li>
              <li class="@if(Request::is('purchases/nutritionpurchase')) active @endif"><a href="{{ url('/purchases/nutritionpurchase') }}"><i class="fa fa-circle-o"></i>شراء علف</a></li>
              <li class="@if(Request::is('medicinespurchases/create')) active @endif"><a href="{{ url('/medicinespurchases/create') }}"><i class="fa fa-circle-o"></i>شراء أدوية</a></li>
              <li class="@if(Request::is('vaccinationspurchases/create')) active @endif"><a href="{{ url('/vaccinationspurchases/create') }}"><i class="fa fa-circle-o"></i>شراء تحصينات</a></li>
              <li class="@if(Request::is('purchases/sawdustpurchasecreate')) active @endif"><a href="{{ url('/purchases/sawdustpurchasecreate') }}"><i class="fa fa-circle-o"></i>شراء نشارة</a></li>
              <li class="@if(Request::is('purchases/view')) active @endif"><a href="{{ url('/purchases/view') }}"><i class="fa fa-circle-o"></i>عرض مشتريات الطيور</a></li>
              <li class="@if(Request::is('purchases/nutpurchasesview')) active @endif"><a href="{{ url('/purchases/nutpurchasesview') }}"><i class="fa fa-circle-o"></i>عرض مشتريات العلف</a></li>
              <li class="@if(Request::is('medicinespurchases/view')) active @endif"><a href="{{ url('/medicinespurchases/view') }}"><i class="fa fa-circle-o"></i>عرض مشتريات الأدوية</a></li>
              <li class="@if(Request::is('vaccinationspurchases/view')) active @endif"><a href="{{ url('/vaccinationspurchases/view') }}"><i class="fa fa-circle-o"></i>عرض مشتريات التحصينات</a></li>
              <li class="@if(Request::is('purchases/sawdustpurchasesview')) active @endif"><a href="{{ url('/purchases/sawdustpurchasesview') }}"><i class="fa fa-circle-o"></i>عرض مشتريات النشارة</a></li>
            </ul>
          </li>


          <li class="treeview @if(Request::is('*/*stockv*')||Request::is('*/*inventory*')) active @endif">
            <a href="#">
              <i class="fa fa-briefcase"></i> <span>المخازن</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('nutrition/nutstockview')) active @endif"><a href="{{ url('/nutrition/nutstockview') }}"><i class="fa fa-circle-o"></i>مخزن العلف</a></li>
              <li class="@if(Request::is('medicines/medicineinventoryview')) active @endif"><a href="{{ url('/medicines/medicineinventoryview') }}"><i class="fa fa-circle-o"></i>مخزن الأدوية</a></li>
              <li class="@if(Request::is('vaccinations/vaccinationinventoryview')) active @endif"><a href="{{ url('/vaccinations/vaccinationinventoryview') }}"><i class="fa fa-circle-o"></i>مخزن التحصينات</a></li>
              <li class="@if(Request::is('sawdust/sawdustinventoryview')) active @endif"><a href="{{ url('/sawdust/sawdustinventoryview') }}"><i class="fa fa-circle-o"></i>مخزن النشارة</a></li>
            </ul>
          </li>


          <li class="treeview @if(Request::is('movements/*')) active @endif">
            <a href="#">
              <i class="fa glyphicon glyphicon-move"></i> <span>الحركة بين العنابر</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('movements/create')) active @endif"><a href="{{ url('/movements/create') }}"><i class="fa fa-circle-o"></i> نقل الطيور من عنبر لاخر</a></li>
              <li class="@if(Request::is('movements/view')) active @endif"><a href="{{ url('/movements/view') }}"><i class="fa fa-circle-o"></i> أرشيف الحركات</a></li>
            </ul>
          </li>







          <li class="treeview">
            <a href="#">
              <i class="fa fa-briefcase"></i> <span>ادارة المزرعة</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview @if(Request::is('customers/*')) active @endif">
                <a href="#">
                  <i class="fa fa-group"></i> <span>العملاء</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="treeview @if(Request::is('*customers/*')) active @endif">
                  <li class="@if(Request::is('customers/create')) active @endif"><a href="{{ url('/customers/create') }}"><i class="fa fa-circle-o"></i> اضافة عميل</a></li>
                  <li class="@if(Request::is('customers/view')) active @endif"><a href="{{ url('/customers/view') }}"><i class="fa fa-circle-o"></i> كل العملاء</a></li>
                </ul>
              </li>
            </ul>
            <ul class="treeview-menu">
              <li class="treeview @if(Request::is('supplier/*')) active @endif">
                <a href="#">
                  <i class="fa fa-truck"></i> <span>الموردين</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="@if(Request::is('supplier/create')) active @endif"><a href="{{ url('/supplier/create') }}"><i class="fa fa-circle-o"></i> اضافة مورد</a></li>
                  <li class="@if(Request::is('supplier/view')) active @endif"><a href="{{ url('/supplier/view') }}"><i class="fa fa-circle-o"></i> كل الموردين</a></li>
                </ul>
              </li>
            </ul>

            <ul class="treeview-menu">
            <li class="treeview @if(Request::is('farms/*')) active @endif">
              <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>المزارع</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="@if(Request::is('farms/create')) active @endif"><a href="{{ url('/farms/create') }}"><i class="fa fa-circle-o"></i>اضافة مزرعة</a></li>
                <li class="@if(Request::is('farms/view')) active @endif"><a href="{{ url('/farms/view') }}"><i class="fa fa-circle-o"></i>كل المزارع</a></li>
              </ul>
            </li>
          </ul>
          <ul class="treeview-menu">
            <li class="treeview @if(Request::is('barns/*')) active @endif">
              <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>العنابر</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="@if(Request::is('barns/create')) active @endif"><a href="{{ url('/barns/create') }}"><i class="fa fa-circle-o"></i>اضافة عنبر</a></li>
                <li class="@if(Request::is('barns/view')) active @endif"><a href="{{ url('/barns/view') }}"><i class="fa fa-circle-o"></i>كل العنابر</a></li>
              </ul>
            </li>
          </ul>
          <ul class="treeview-menu">
            <li class="treeview @if(Request::is('barns/*')) active @endif">
              <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>العلف</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="@if(Request::is('nutritioninventory/view')) active @endif"><a href="{{ url('/nutritioninventory/view') }}"><i class="fa fa-circle-o"></i>مخزن العلف</a></li>
                <li class="@if(Request::is('nutrition/create')) active @endif"><a href="{{ url('/nutrition/create') }}"><i class="fa fa-circle-o"></i>اضافة نوع علف</a></li>
                <li class="@if(Request::is('nutrition/view')) active @endif"><a href="{{ url('/nutrition/view') }}"><i class="fa fa-circle-o"></i>أنواع العلف</a></li>
              </ul>
            </li>
            </ul>
            <ul class="treeview-menu">
              <li class="treeview @if(Request::is('medicines/*')) active @endif">
                <a href="#">
                  <i class="fa fa-shopping-cart"></i> <span>قائمة الأدوية</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="@if(Request::is('medicines/create')) active @endif"><a href="{{ url('/medicines/create') }}"><i class="fa fa-circle-o"></i>اضافة دواء</a></li>
                  <li class="@if(Request::is('medicines/view')) active @endif"><a href="{{ url('/medicines/view') }}"><i class="fa fa-circle-o"></i>عرض الأدوية</a></li>
                </ul>
              </li>
              </ul>
            <ul class="treeview-menu">
              <li class="treeview @if(Request::is('vaccinations/*')) active @endif">
                <a href="#">
                  <i class="fa fa-shopping-cart"></i> <span>جدول التحصينات</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="@if(Request::is('vaccinations/create')) active @endif"><a href="{{ url('/vaccinations/create') }}"><i class="fa fa-circle-o"></i>اضافة تحصينات</a></li>
                  <li class="@if(Request::is('vaccinations/view')) active @endif"><a href="{{ url('/vaccinations/view') }}"><i class="fa fa-circle-o"></i>عرض جدول التحصينات</a></li>
                </ul>
              </li>
              </ul>
              <ul class="treeview-menu">
                <li class="treeview @if(Request::is('vaccinations/*')) active @endif">
                  <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>الاطباء</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="@if(Request::is('doctors/create')) active @endif"><a href="{{ url('/doctors/create') }}"><i class="fa fa-circle-o"></i>اضافة دكتور</a></li>
                    <li class="@if(Request::is('doctors/view')) active @endif"><a href="{{ url('/doctors/view') }}"><i class="fa fa-circle-o"></i>قائمة الدكاترة</a></li>
                  </ul>
                </li>
                </ul>
                <ul class="treeview-menu">
                  <li class="treeview @if(Request::is('vaccinations/*')) active @endif">
                    <a href="#">
                      <i class="fa fa-shopping-cart"></i> <span>الثلاجات</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="@if(Request::is('refrigrators/create')) active @endif"><a href="{{ url('/refrigrators/create') }}"><i class="fa fa-circle-o"></i>اضافة ثلاجة</a></li>
                      <li class="@if(Request::is('refrigrators/view')) active @endif"><a href="{{ url('/refrigrators/view') }}"><i class="fa fa-circle-o"></i>قائمة ثلاجات</a></li>
                    </ul>
                  </li>
                  </ul>
                  <ul class="treeview-menu">
                  <li class="treeview @if(Request::is('vaccinations/*')) active @endif">
                    <a href="#">
                      <i class="fa fa-shopping-cart"></i> <span>التكاليف الثابتة</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="@if(Request::is('fixedcosts/create')) active @endif"><a href="{{ url('/fixedcosts/create') }}"><i class="fa fa-circle-o"></i>اضافة تكاليف ثابتة</a></li>
                      <li class="@if(Request::is('fixedcosts/view')) active @endif"><a href="{{ url('/fixedcosts/view') }}"><i class="fa fa-circle-o"></i>قائمة التكاليف الثابتة</a></li>
                    </ul>
                  </li>
                  </ul>
              <ul class="treeview-menu">
                <li class="treeview @if(Request::is('appusers/*')) active @endif">
                  <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>المستخدمين</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="@if(Request::is('appusers/create')) active @endif"><a href="/appusers/resetpass/{{ Auth::id() }}"><i class="fa fa-circle-o"></i>تعديل كلمة السر</a></li>
                    <li class="@if(Request::is('appusers/viewmsg')) active @endif"><a href="/appusers/viewmsg"><i class="fa fa-circle-o"></i>عرض رسائل المستخدم</a></li>
                    <li class="@if(Request::is('appusers/create')) active @endif"><a href="{{ url('/appusers/create') }}"><i class="fa fa-circle-o"></i>اضافة مستخدم</a></li>
                    <li class="@if(Request::is('appusers/view')) active @endif"><a href="{{ url('/appusers/view') }}"><i class="fa fa-circle-o"></i>عرض المستخدمين</a></li>
                  </ul>
                </li>
                </ul>

          </li>



          <li class="treeview @if(Request::is('*reports/*')) active @endif">
            <a href="#">
              <i class="fa fa-line-chart"></i> <span>تقارير</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('reports/stocktakeing/nutFromToView')) active @endif"><a href="{{ url('/reports/stocktakeing/nutFromToView') }}"><i class="fa fa-circle-o"></i>جرد مخزن العلف</a></li>
              <li class="@if(Request::is('reports/stocktakeing/medFromToView')) active @endif"><a href="{{ url('/reports/stocktakeing/medFromToView') }}"><i class="fa fa-circle-o"></i>جرد مخزن الادوية</a></li>
              <li class="@if(Request::is('reports/stocktakeing/VacsFromToView')) active @endif"><a href="{{ url('/reports/stocktakeing/VacsFromToView') }}"><i class="fa fa-circle-o"></i>جرد مخزن التحصينات</a></li>
              <li class="@if(Request::is('reports/nutconsumption/selectbatch')) active @endif"><a href="{{ url('/reports/nutconsumption/nutconsumption_rep') }}"><i class="fa fa-circle-o"></i>اجمالي الاستهلاك بالباتش</a></li>
              <li class="@if(Request::is('reports/costanalyses/actualcostsbybatchview')) active @endif"><a href="{{ url('/reports/costanalyses/actualcostsbybatchview') }}"><i class="fa fa-circle-o"></i>التكلفة الفعلية</a></li>
              <li class="@if(Request::is('reports/costanalyses/kgmeatcostsbybatchview')) active @endif"><a href="{{ url('/reports/costanalyses/kgmeatcostsbybatchview') }}"><i class="fa fa-circle-o"></i>تكلفة لحم/كجم للباتش</a></li>
            </ul>
          </li>


          <li class="treeview @if(Request::is('dataloader/*')) active @endif">
            <a href="#">
              <i class="fa glyphicon glyphicon glyphicon-file"></i><span>تحميل من ملف</span><i class="fa-file-alt"></i>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if(Request::is('dataloader/customers')) active @endif"><a href="{{ url('/dataloader/customers') }}"><i class="fa fa-circle-o"></i>تحميل بيانات عملاء</a></li>
              <li class="@if(Request::is('dataloader/viewSuppliers')) active @endif"><a href="{{ url('/dataloader/viewSuppliers') }}"><i class="fa fa-circle-o"></i>تحميل بيانات موردين</a></li>
            </ul>
          </li>





        {{-- END OF NAVIGATION --}}

        {{-- Direct Links --}}

          <li class="header">Direct Links</li>
          <li class="@if(Request::is('sales/create')) active @endif"><a href="@if(Request::is('sales/create')) javascript:void @else /sales/create @endif"><i class="fa fa-circle-o text-success"></i> <span>اضافة مبيعات</span></a></li>
          <li class="@if(Request::is('purchases/create')) active @endif"><a href="@if(Request::is('purchases/create')) javascript:void @else /purchases/create @endif"><i class="fa fa-circle-o text-red"></i> <span>اضافة مشتريات</span></a></li>
          <li class="@if(Request::is('supplier/create')) active @endif"><a href="@if(Request::is('supplier/create')) javascript:void @else /supplier/create @endif"><i class="fa fa-circle-o text-aqua"></i> <span>اضافة مورد</span></a></li>
          <li class="@if(Request::is('customers/create')) active @endif"><a href="@if(Request::is('customers/create')) javascript:void @else /customers/create @endif"><i class="fa fa-circle-o text-yellow"></i> <span>اضافة عميل</span></a></li>
         <!-- <li class="@if(Request::is('report/generate')) active @endif"><a href="@if(Request::is('report/generate')) javascript:void @else /report/generate @endif"><i class="fa fa-circle-o text-primary"></i> <span>Generate Report</span></a></li>-->

        {{-- END OF Direct Links --}}

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2021 <a href="https://www.linkedin.com/in/mostafa-shahien-4a47367/" target="_blank">Mostafa Atef {{config('app.env') }}</a></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="/js/app.js"></script>
<script src="/js/app.min.js"></script>
<script src="/js/bootstrapValidator.min.js"></script>
<script src="/js/default.js"></script>
<script src="/js/bootstrap-table.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/Chart.min.js"></script>
<script type="text/javascript" src="/js/barchart.js"></script>
</body>
</html>
