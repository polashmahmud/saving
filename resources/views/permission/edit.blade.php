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
            <form class="form-inline" action="{{ route('permission.update', $permission->id) }}" method="post">
                @csrf
                @method('PUT')
                <label class="sr-only" for="ex-email">@lang('messages.Name')</label>
                <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" placeholder="@lang('messages.Name')" name="name" value="{{ $permission->name }}">
                <label class="sr-only" for="ex-pass">@lang('messages.Title')</label>
                <input class="form-control mb-2 mr-sm-2 mb-sm-0" type="text" placeholder="@lang('messages.Title')" name="title" value="{{ $permission->title }}">
                <select class="form-control mb-2 mr-sm-2 mb-sm-0" name="category">
                    <option></option>
                    <option value="1" @if($permission->category == 1) selected @endif>Permission</option>
                    <option value="1" @if($permission->category == 2) selected @endif>Role</option>
                </select>
                <button class="btn btn-success" type="submit">@lang('messages.Edit Entry')</button>
            </form>
        </div>
    </div>
@endsection

