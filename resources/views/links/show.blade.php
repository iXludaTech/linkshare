@extends('layouts.base')
@section('title', $link->title)

@section('body')
    <div class="row mt-4">
        <div class="col-lg-8 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/links">Links</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ str_limit($link->title, 40) }}</li>
                </ol>
            </nav>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title">{{ $link->title }}</h2>

                    <div class="mb-3">
                        @if($link->channel)
                            <span class="badge badge-secondary">{{ $link->channel->name }}</span>
                        @endif
                        @if($link->subChannel)
                            <span class="badge badge-info">{{ $link->subChannel->name }}</span>
                        @endif
                    </div>

                    <p class="card-text">{{ $link->description }}</p>

                    <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer"
                       class="btn btn-success btn-lg btn-block">
                        Visit Link &rarr;
                    </a>
                </div>
                <div class="card-footer text-muted small">
                    Shared by <strong>{{ $link->user ? $link->user->username : 'Unknown' }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
