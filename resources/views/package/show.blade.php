@extends('layouts.app')

@section('title', 'Show Package')

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
                    <div class="ibox-title">@lang('messages.Active Package')</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" action="{{ route('account.store') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ $package->id }}" name="package_id" hidden>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Member Name')</label>
                            <div class="col-sm-10">
                                <select class="form-control select2_demo_2" name="user_id">
                                    <option></option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->phone }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Period Amount')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" placeholder="@lang('messages.Period Amount')" name="amount" @if($package->type === 2) value="{{ $package->amount }}" @endif >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Package Start Date')</label>
                            <div class="col-sm-10" id="date_1">
                                <div class="input-group date">
                                    <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                    <input class="form-control" type="text" value="{{ date('Y/m/d') }}" name="date">
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
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $package->name }}</h4>
                    <div class="text-muted card-subtitle">TK: {{ $package->amount }}</div>
                    <p class="card-text">{{ $package->description }}</p>
                    {{--<a class="link-blue text-muted"><i class="fa fa-heart"></i> Like</a>--}}
                </div>
            </div>

            <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-user-plus"></i> Use this package</h5>
            <ul class="media-list media-list-divider m-0">
                @foreach($package->accounts as $account)
                <li class="media">
                    <a class="media-img" href="javascript:;">
                        <img class="img-circle" src="/assets/img/users/u1.jpg" width="40">
                    </a>
                    <div class="media-body">
                        <div class="media-heading">{{ $account->user->name }} <small class="float-right text-muted">{{ $account->date }}</small></div>
                        <div class="font-13">@lang('messages.Phone:') {{ $account->user->phone }}</div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

