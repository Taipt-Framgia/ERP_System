<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/assets/adminlte/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{!! set_active(['test']) !!}"><a href={{action('TestController@index')}}> <i class="fa fa-dashboard"></i> <span>{{ trans('global.file_manager') }} 1</span></a></li>
            <li class="{!! set_active(['file']) !!}"><a href={{action('FilesController@index')}}> <i class="fa fa-dashboard"></i> <span>{{ trans('global.file_manager') }}</span></a></li>
            <li class="treeview {!! set_active(['employee', 'employee/create']) !!}">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>{{ trans('global.employee_manager') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! set_active(['employee']) !!}"><a href={{action('EmployeeController@index')}}><i class="fa fa-circle-o"></i> {{ trans('global.employee_list') }}</a></li>
                    <li class="{!! set_active(['employee/create']) !!}"><a href={{action('EmployeeController@create')}}><i class="fa fa-circle-o"></i> {{ trans('global.add_employee') }}</a></li>
                </ul>
            </li>
            <li class="treeview {!! set_active(['department', 'department/create']) !!}">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>{{ trans('global.department_manager') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! set_active(['department']) !!}"><a href={{action('DepartmentController@index')}}><i class="fa fa-circle-o"></i> {{ trans('global.department_list') }}</a></li>
                    <li class="{!! set_active(['department/create']) !!}"><a href={{action('DepartmentController@create')}}><i class="fa fa-circle-o"></i> {{ trans('global.add_department') }}</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>