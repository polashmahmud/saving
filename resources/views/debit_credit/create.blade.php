@extends('layouts.app')

@section('title', 'Debit Credit Create')

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
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">@lang('messages.Debit Credit Create')</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    <form class="form-horizontal" action="{{ route('debit-credit.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Date')</label>
                            <div class="col-sm-10" id="date_1">
                                <div class="input-group date">
                                    <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                    <input class="form-control" type="text" value="{{ date('Y/m/d') }}" name="date" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-sm-2 col-form-label">@lang('messages.Type')</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label class="ui-radio ui-radio-danger">
                                            <input type="radio" name="type" value="0" checked>
                                            <span class="input-span"></span>@lang('messages.Debit')
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="ui-radio ui-radio-info">
                                            <input type="radio" name="type" value="1">
                                            <span class="input-span"></span>@lang('messages.Credit')
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Amount')</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" placeholder="@lang('messages.Amount')" name="amount" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">@lang('messages.Description')</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" placeholder="Description" name="description" required>{{ old('description') }}</textarea>
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
                    <div class="ibox-title">@lang('messages.Debit Credit List')</div>
                </div>
                <div class="ibox-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($collections as $collection)
                                <tr>
                                    <td>{!! \App\Classes\Helper::accountUserImage($collection->user->getFirstMediaUrl('avatar', 'small')) !!}</td>
                                    <td>{{ $collection->user->name }}</td>
                                    <td>{{ $collection->date }}</td>
                                    <td>{{ $collection->description }}</td>
                                    <td @if($collection->amount < 0) class="text-danger" @else class="text-success" @endif>{{ $collection->amount }}</td>
                                    <td>
                                        <button class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
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
@endsection

