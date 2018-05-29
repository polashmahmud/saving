@extends('layouts.app')

@section('title', 'Member')

@push('header-script')

@endpush

@push('footer-script')

@endpush

@section('content')
    <div class="row">
        @foreach($members as $member)
        <div class="col-md-3 mt-5">
            <div class="card">
                @if($member->getFirstMediaUrl('avatar', 'medium'))
                    <img class="card-img-top" src={{ asset($member->getFirstMediaUrl('avatar', 'medium')) }}>
                @else
                <img class="card-img-top" src={{ asset("assets/img/image.png") }}>
                @endif
                <div class="card-body">
                    <h4 class="card-title">{{ $member->name }}</h4>
                    <div>@lang('messages.Phone:') {{ $member->phone }}</div>
                </div>
                <ul class="list-group list-group-divider no-margin">
                    <li class="list-group-item" style="border-top-color:#e1eaec;">Sales
                        <span class="badge badge-danger badge-circle float-right">4</span>
                    </li>
                    <li class="list-group-item">Photos
                        <span class="badge badge-info badge-circle float-right">7</span>
                    </li>
                    <li class="list-group-item">Friends
                        <span class="badge badge-warning badge-circle float-right">24</span>
                    </li>
                </ul>
                <div class="card-footer">
                    <a class="text-info"><i class="fa fa-star"></i> Follow</a>
                    <span class="pull-right text-muted font-13">Joined in 12.01</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

