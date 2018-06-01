@extends('layouts.app')

@section('title', 'Account Edit')

@push('header-script')
    <link href={{ asset("assets/vendors/select2/dist/css/select2.min.css") }} rel="stylesheet" />
    <link href={{ asset("assets/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css") }} rel="stylesheet" />
@endpush

@push('footer-script')
    <script src={{ asset("assets/vendors/select2/dist/js/select2.full.min.js") }} type="text/javascript"></script>
    <script src={{ asset("assets/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }} type="text/javascript"></script>
    <script src={{ asset("assets/js/scripts/form-plugins.js") }} type="text/javascript"></script>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">@lang('messages.Account Edit')</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" action="{{ route('account.update', $account->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Member Name')</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="user_id">
                                    <option></option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if($account->user_id == $user->id) selected @endif disabled>{{ $user->name }} - {{ $user->phone }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Member Name')</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="package_id">
                                    <option></option>
                                    @foreach($packages as $package)
                                        <option value="{{ $package->id }}" @if($account->package_id == $package->id) selected @endif disabled>{{ $package->name }} - TK: {{ $package->amount }} A/C: {{ \App\Classes\Helper::packageType($package->type) }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Period Amount')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" placeholder="@lang('messages.Period Amount')" name="amount" value="{{ $account->amount }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Package Start Date')</label>
                            <div class="col-sm-10" id="date_1">
                                <div class="input-group date">
                                    <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                    <input class="form-control" type="text" value="{{ $account->date }}" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info" type="submit">@lang('messages.Edit Entry')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--<div class="col-md-6">--}}
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<h4 class="card-title">{{ $package->name }}</h4>--}}
                    {{--<div class="text-muted card-subtitle">TK: {{ $package->amount }}</div>--}}
                    {{--<p class="card-text">{{ $package->description }}</p>--}}
                    {{--<a class="link-blue text-muted"><i class="fa fa-heart"></i> Like</a>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<h5 class="text-info m-b-20 m-t-20"><i class="fa fa-user-plus"></i> Use this package</h5>--}}
            {{--<ul class="media-list media-list-divider m-0">--}}
                {{--@foreach($package->accounts as $account)--}}
                    {{--<li class="media">--}}
                        {{--<a class="media-img" href="javascript:;">--}}
                            {{--<img class="img-circle" src="/assets/img/users/u1.jpg" width="40">--}}
                        {{--</a>--}}
                        {{--<div class="media-body">--}}
                            {{--<div class="media-heading">{{ $account->user->name }} <small class="float-right text-muted">{{ $account->date }}</small></div>--}}
                            {{--<div class="font-13">@lang('messages.Phone:') {{ $account->user->phone }}</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    </div>
@endsection

