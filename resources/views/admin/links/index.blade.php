@extends('layouts.base')

@section('title', 'Manage Links')

@php
    $success_mgs = flash('success');
    if (!isset($success) && $success_mgs) {
        $success = $success_mgs;
    }
@endphp

@section('body')
    <div class="row mt-4">
        <div class="col-12">
            <h2 class="mb-4">Manage Links</h2>

            @includeWhen(isset($success), 'partials.success')

            @if(isset($links) && count($links))
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Submitted By</th>
                                <th>Channel</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($links as $index => $link)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>
                                        <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer">
                                            {{ str_limit($link->title, 50) }}
                                        </a>
                                    </td>
                                    <td>{{ $link->user ? $link->user->username : 'Unknown' }}</td>
                                    <td>{{ $link->channel ? $link->channel->name : '-' }}</td>
                                    <td>
                                        @if($link->approved)
                                            <span class="badge badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $link->created_at }}</td>
                                    <td>
                                        @if(!$link->approved)
                                            <a href="/admin/links/{{ $link->id }}/approve"
                                               class="btn btn-sm btn-success">Approve</a>
                                        @endif
                                        <a href="/admin/links/{{ $link->id }}/delete"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Delete this link?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $links->links() }}
                </div>
            @else
                <p>No links have been submitted yet.</p>
            @endif
        </div>
    </div>
@endsection
