@extends('layouts.app')

@section('title', 'Package Create')

@push('header-script')

@endpush

@push('footer-script')

@endpush

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">@lang('messages.Package Create')</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate" action="{{ route('package.store') }}">
                @csrf
                <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.Package Name')</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" placeholder="@lang('messages.Package Name')" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <label class="help-block error">{{ $errors->first('name') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.Package Description')</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" placeholder="@lang('messages.Package Description')" name="description">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <label class="help-block error">{{ $errors->first('description') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('amount') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.Package Amount')</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="amount" placeholder="@lang('messages.Package Amount')" value="{{ old('amount') }}">
                        @if ($errors->has('amount'))
                            <label class="help-block error">{{ $errors->first('amount') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.Package Type')</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="ui-radio ui-radio-primary">
                                    <input type="radio" name="type" value="0" checked>
                                    <span class="input-span"></span>@lang('messages.Lone')
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="ui-radio ui-radio-success">
                                    <input type="radio" name="type" value="1">
                                    <span class="input-span"></span>@lang('messages.Saving')
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="ui-radio ui-radio-info">
                                    <input type="radio" name="type" value="2">
                                    <span class="input-span"></span>@lang('messages.Double')
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('period') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.Package Period')</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="ui-radio ui-radio-primary">
                                    <input type="radio" name="period" value="0" checked>
                                    <span class="input-span"></span>@lang('messages.Day')
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="ui-radio ui-radio-success">
                                    <input type="radio" name="period" value="1">
                                    <span class="input-span"></span>@lang('messages.Week')
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="ui-radio ui-radio-info">
                                    <input type="radio" name="period" value="2">
                                    <span class="input-span"></span>@lang('messages.Month')
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('status') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.Package Status')</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="ui-radio ui-radio-primary">
                                    <input type="radio" name="status" value="0" checked>
                                    <span class="input-span"></span>@lang('messages.Suspend')
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="ui-radio ui-radio-success">
                                    <input type="radio" name="status" value="1">
                                    <span class="input-span"></span>@lang('messages.Active')
                                </label>
                            </div>
                        </div>
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
@endsection

