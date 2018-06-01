@extends('layouts.app')

@section('title', 'Collection')

@push('header-script')

@endpush

@push('footer-script')

@endpush

@section('content')
    <div class="row">
        @foreach($accounts as $account)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    @if($account->user->getFirstMediaUrl('avatar', 'small'))
                        <img class="img-circle m-r-10 pull-left" src={{ asset($account->user->getFirstMediaUrl('avatar', 'small')) }} style="width:28px;">
                    @else
                        <img class="img-circle m-r-10 pull-left" src="./assets/img/users/u2.jpg" style="width:28px;">
                    @endif

                    <h6 class="m-0">{{ $account->user->name }}</h6><small class="text-muted">{{ \App\Classes\Helper::collectionLastDate($account->id) }}</small>
                    <div class="pull-right text-danger" style="margin-top: -8px;">TK: {{ $account->collections->sum('amount') }}</div>
                </div>
                <div class="card-body">
                    <p class="card-text">একাউন্টটি খুলেছেন: {{ $account->date }} তারিখে। প্রতিদিন জমা দিচ্ছেনঃ {{ $account->amount }} টাকা। মোট কিস্তি দিয়েছেনঃ {{ $account->collections->count('amount') - 1 }} টি। আপনার একাউন্টটি হচ্ছে: {!! \App\Classes\Helper::accountType($account->package->type) !!}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="link-blue"><i class="fa fa-heart"></i> Done</a>
                        <form action="{{ route('collection.store') }}" method="POST">
                            @csrf
                            <input type="text" value="{{ $account->id }}" name="account_id" hidden>
                            <button class="btn btn-default btn-sm" type="submit">
                                @if($account->package->type == 2)
                                    জমাঃ {{ \App\Classes\Helper::collectAmountOnlyDouble($account->id) * $account->amount }} টাকা
                                @else
                                জমাঃ {{ $account->amount }} টাকা
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

