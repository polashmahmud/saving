@extends('layouts.app')

@section('title', 'Dashboard')

@push('header-script')

@endpush

@push('footer-script')

@endpush

@section('content')
<div class="row">
    @foreach($packages as $package)
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $package->name }}</h4>
                <div class="text-muted card-subtitle">TK: {{ $package->amount }}</div>
                <p class="card-text">{{ $package->description }}</p>
                <a href="{{ route('package.show', $package->id) }}" class="link-blue text-muted"><i class="fa fa-plus"></i> @lang('messages.Add')</a>
                <form action="{{ route('package.destroy', $package->id) }}" id="delete-form-{{ $package->id }}" method="post" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                <a href="" class="link-blue text-warning m-l-5" onclick="
                        if (confirm('Are you sure, you want to delete this?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $package->id }}').submit();
                        } else {
                        event.preventDefault();
                        }
                        "><i class="fa fa-trash"></i>
                </a>
                <div class="pull-right">
                    {!! html_entity_decode(\App\Classes\Helper::accountType($package->type)) !!}
                    <span class="badge badge-default badge-circle m-r-5 m-b-5">9</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

