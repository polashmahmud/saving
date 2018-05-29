@extends('layouts.app')

@section('title', 'Member Create')

@push('header-script')

@endpush

@push('footer-script')
    <script src={{ asset("assets/vendors/jquery.maskedinput/dist/jquery.maskedinput.min.js") }} type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#ex-date').mask('99/99/9999', {
                placeholder: 'dd/mm/yyyy'
            });

            $('#phone').mask('+880 9999 999 999');
        })
    </script>
@endpush

@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">@lang('messages.Member Create')</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="form-sample-1" method="post" novalidate="novalidate" action="{{ route('member.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.Member Name')</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" placeholder="@lang('messages.Member Name')" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <label class="help-block error">{{ $errors->first('name') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.Member Email')</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" name="email" placeholder="@lang('messages.Member Email')" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <label class="help-block error">{{ $errors->first('email') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.Member Phone')</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="phone" type="text" name="phone" placeholder="@lang('messages.Member Phone')" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <label class="help-block error">{{ $errors->first('phone') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('avatar') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.Avatar')</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="avatar">
                        @if ($errors->has('avatar'))
                            <label class="help-block error">{{ $errors->first('avatar') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('status') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.Status')</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="ui-radio ui-radio-primary">
                                    <input type="radio" name="status" value="1" checked>
                                    <span class="input-span"></span>@lang('messages.Active')
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="ui-radio ui-radio-danger">
                                    <input type="radio" name="status" value="0">
                                    <span class="input-span"></span>@lang('messages.Suspend')
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">@lang('messages.EqualTo (confirm)')</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="password" type="password" name="password" placeholder="@lang('messages.password')">
                        @if ($errors->has('password'))
                            <label class="help-block error">{{ $errors->first('password') }}</label>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <input class="form-control" type="password" name="password_confirmation" placeholder="@lang('messages.confirm password')">
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

