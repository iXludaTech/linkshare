@extends('layouts.base')
@section('title', 'Homepage')

@section('body')
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4 mb-3">{{ config('APP_NAME') }}</h1>
            <p class="lead text-muted mb-4">
                Discover and share the best courses, tutorials, and learning resources.
                Curated by the community, for the community.
            </p>

            <div class="mb-5">
                <a href="/links" class="btn btn-primary btn-lg mr-2">Browse Links</a>
                @if(!user())
                    <a href="/register" class="btn btn-outline-primary btn-lg">Join Now</a>
                @else
                    <a href="/links/create" class="btn btn-success btn-lg">Submit a Link</a>
                @endif
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center">
                <div class="card-body">
                    <h3 class="card-title h5">Discover</h3>
                    <p class="card-text text-muted">
                        Browse a curated collection of learning resources shared by the community.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center">
                <div class="card-body">
                    <h3 class="card-title h5">Share</h3>
                    <p class="card-text text-muted">
                        Found an awesome course or tutorial? Share it with everyone.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center">
                <div class="card-body">
                    <h3 class="card-title h5">Organize</h3>
                    <p class="card-text text-muted">
                        Links are organized by channels and subchannels for easy discovery.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
