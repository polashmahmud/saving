@extends('layouts.app')

@section('title', 'Role')

@push('header-script')

@endpush

@push('footer-script')

@endpush

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">@lang('messages.Role')</div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Name')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="@lang('messages.Name')" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Title')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="@lang('messages.Title')" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info" type="submit">@lang('messages.Submit Entry')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">@lang('messages.Permission List')</div>
                </div>
                <div class="ibox-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name (Slug)</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td><code>{{ $role->name }}</code></td>
                                    <td>{{ $role->title }}</td>
                                    <td>
                                        {{--<a href="{{ route('permission.edit', $role->id) }}" class="btn btn-default btn-xs m-r-5"><i class="fa fa-pencil font-14"></i></a>--}}
                                        <form action="{{ route('role.destroy', $role->id) }}" id="delete-form-{{ $role->id }}" method="post" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="" class="btn btn-default btn-xs" onclick="
                                                if (confirm('Are you sure, you want to delete this?')) {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $role->id }}').submit();
                                                } else {
                                                event.preventDefault();
                                                }
                                                "><i class="fa fa-trash font-14"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Role and Permission</div>
        </div>
        <div class="ibox-body">
            <div class="table-responsive">
                <form action="{{ route('save-permission') }}" method="POST">
                    @csrf
                <table class="table">
                    <thead>
                    <tr>
                        <th>Permission</th>
                        @foreach($roles as $role)
                            <th>{{ $role->title }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($permissions->groupBy('category') as $permission)
                            <tr style="background: #eef1f6;">
                                <td style="color: #252424;text-transform:  capitalize;font-weight:  700;" colspan="{!! count($roles)+1 !!} ">{{ $permission[0]->category }}</td>
                            </tr>
                            @foreach($permission as $row)
                                <tr>
                                    <td><code>{{ $row->name }}</code> {{ $row->title }}</td>
                                    @foreach($roles as $role)
                                        <th>
                                            <label class="ui-checkbox">
                                                <input type="checkbox" name="permission[{!! $role->id !!}][{!! $row->id !!}]" value="1" {!! in_array($role->id.'-'.$row->id,$permission_role) ? 'checked' : '' !!}>
                                                <span class="input-span"></span>
                                            </label>
                                        </th>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                    <hr>
                    <button class="btn btn-default" type="submit">@lang('messages.Submit Entry')</button>
                </form>
            </div>
        </div>
    </div>
@endsection

