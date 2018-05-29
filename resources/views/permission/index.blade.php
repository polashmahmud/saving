@extends('layouts.app')

@section('title', 'Permission')

@push('header-script')

@endpush

@push('footer-script')

@endpush

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">@lang('messages.New Permission')</div>
        </div>
        <div class="ibox-body">
            <form class="form-inline" action="{{ route('permission.store') }}" method="post">
                @csrf
                <label class="sr-only" for="ex-email">@lang('messages.Name')</label>
                <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" placeholder="@lang('messages.Name')" name="name">
                <label class="sr-only" for="ex-pass">@lang('messages.Title')</label>
                <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" placeholder="@lang('messages.Title')" name="title">
                <select class="form-control mb-2 mr-sm-2 mb-sm-0" name="category">
                    <option></option>
                    <option value="1">Permission</option>
                    <option value="2">Role</option>
                </select>
                <button class="btn btn-success" type="submit">@lang('messages.Submit Entry')</button>
            </form>
        </div>
    </div>
    @if(count($permissions))
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
                        <th>Title / Description</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td><code>{{ $permission->name }}</code></td>
                        <td>{{ $permission->title }}</td>
                        <td>{{ $permission->category }}</td>
                        <td>
                            <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-default btn-xs m-r-5"><i class="fa fa-pencil font-14"></i></a>
                            <form action="{{ route('permission.destroy', $permission->id) }}" id="delete-form-{{ $permission->id }}" method="post" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="" class="btn btn-default btn-xs" onclick="
                                    if (confirm('Are you sure, you want to delete this?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $permission->id }}').submit();
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
    @endif
@endsection

