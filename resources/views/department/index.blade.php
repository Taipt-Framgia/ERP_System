@extends('layouts.admin.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-body">
                @if (count($departments) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ trans('department.id') }}</th>
                                <th>{{ trans('department.department_name') }}</th>
                                <th>{{ trans('department.address') }}</th>
                                <th>{{ trans('department.description') }}</th>
                                <th>{{ trans('department.action') }}</th>
                            </tr>
                        <tbody>
                            @foreach ($departments as $department)

                                <tr>
                                    <td>{{$department->id}}</td>
                                    <td>{{$department->name}}</td>
                                    <td>{{$department->address}}</td>
                                    <td>{{$department->description}}</td>
                                    <td>
                                        <a class="btn btn-flat btn-success" href={{action('DepartmentController@index', ['parent' => $department->id])}}>
                                            {{ trans('department.sub_department') }}
                                        </a>
                                        <a class="btn btn-flat btn-info" href={{action('DepartmentController@edit', ['$department' => $department->id])}}>
                                            {{ trans('department.edit') }}
                                        </a>
                                        {{ Form::open(['action' => ['DepartmentController@destroy', 'department' => $department->id], 'method' => 'delete', 'class' => 'ib']) }}
                                            {{Form::submit(trans('department.delete'), ['class' => 'btn btn-flat btn-danger delete-department'])}}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                    <div class="pull-right dataTables_paginate paging_simple_numbers">
                        {{ $departments->appends(Request::except('page'))->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection