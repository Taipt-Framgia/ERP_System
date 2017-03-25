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
                                <th>{{ trans('language.id') }}</th>
                                <th>{{ trans('language.name') }}</th>
                                <th>{{ trans('language.address') }}</th>
                                <th>{{ trans('language.description') }}</th>
                                <th>{{ trans('language.action') }}</th>
                            </tr>
                        <tbody>
                            @foreach ($departments as $department)

                                <tr>
                                    <td>{{$department->id}}</td>
                                    <td>{{$department->name}}</td>
                                    <td>{{$department->address}}</td>
                                    <td>{{$department->description}}</td>
                                    <td>
                                        <a class="btn btn-flat btn-info" href={{action('DepartmentController@edit', ['$department' => $department->id])}}>
                                            {{ trans('language.edit') }}
                                        </a>
                                        {{ Form::open(['action' => ['DepartmentController@destroy', 'department' => $department->id], 'method' => 'delete', 'class' => 'ib']) }}
                                            {{Form::submit(trans('language.delete'), ['class' => 'btn btn-flat btn-danger delete-department'])}}
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