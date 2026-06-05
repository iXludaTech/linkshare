@extends('layouts.base')
@section('title', 'Browse Links')

@section('body')
    <div class="row mt-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Latest Links</h2>
                @if(user())
                    <a href="/links/create" class="btn btn-primary">+ Submit a Link</a>
                @endif
            </div>

            @includeWhen(isset($success), 'partials.success')

            @if(isset($links) && count($links))
                <div class="row">
                    @foreach($links as $link)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">
                                        <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer"
                                           class="text-decoration-none stretched-link">
                                            {{ $link->title }}
                                        </a>
                                    </h5>
                                    <p class="card-text text-muted small flex-grow-1">
                                        {{ str_limit($link->description, 120) }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-2 small text-muted">
                                        <span>
                                            <i class="far fa-user"></i>
                                            {{ $link->user ? $link->user->username : 'Unknown' }}
                                        </span>
                                        @if($link->channel)
                                            <span class="badge badge-secondary">{{ $link->channel->name }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $links->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <h4 class="text-muted">No links yet</h4>
                    <p class="text-muted">Be the first to share a useful link with the community!</p>
                    @if(!user())
                        <a href="/register" class="btn btn-primary">Register to Submit</a>
                    @else
                        <a href="/links/create" class="btn btn-primary">Submit the First Link</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection
