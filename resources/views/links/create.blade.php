@extends('layouts.base')

@section('title', 'Submit a Link')

@section('recaptcha')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('body')
    <div class="row mt-4">
        <div class="col-lg-8 mx-auto">
            <h2 class="mb-4">Submit a Link</h2>

            @includeWhen(isset($errors), 'partials.validation_errors')
            @includeWhen(isset($error), 'partials.error')
            @includeWhen(isset($success), 'partials.success')

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="/links" method="post">
                        <div class="form-group">
                            <label for="title">Title *</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="e.g. Learn Laravel from Scratch" value="{{ old('title') }}" required>
                            <small class="form-text text-muted">A descriptive title for the link.</small>
                        </div>

                        <div class="form-group">
                            <label for="url">URL *</label>
                            <input type="url" class="form-control" name="url" id="url"
                                   placeholder="https://example.com/course" value="{{ old('url') }}" required>
                            <small class="form-text text-muted">The full URL including https://</small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description *</label>
                            <textarea class="form-control" name="description" id="description" rows="4"
                                      placeholder="Why is this link useful? What will people learn?" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="channel_id">Channel *</label>
                                <select class="form-control" name="channel_id" id="channel_id" required>
                                    <option value="">-- Select Channel --</option>
                                    @if(isset($channels) && count($channels))
                                        @foreach($channels as $channel)
                                            <option value="{{ $channel->id }}"
                                                {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                                {{ $channel->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sub_channel_id">Subchannel (optional)</label>
                                <select class="form-control" name="sub_channel_id" id="sub_channel_id">
                                    <option value="">-- First select a channel --</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="{{ config('RECAPTCHA_KEY') }}"></div>
                        </div>

                        {{ csrf_token_field() }}

                        <button type="submit" class="btn btn-success float-right">Submit Link</button>
                        <a href="/links" class="btn btn-outline-secondary float-right mr-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.getElementById('channel_id').addEventListener('change', function() {
        var channelId = this.value;
        var subSelect = document.getElementById('sub_channel_id');

        subSelect.innerHTML = '<option value="">Loading...</option>';

        if (channelId) {
            fetch('/subchannels?channel_id=' + channelId)
                .then(function(response) { return response.json(); })
                .then(function(data) {
                    subSelect.innerHTML = '<option value="">-- Optional --</option>';
                    data.forEach(function(sub) {
                        subSelect.innerHTML += '<option value="' + sub.id + '">' + sub.name + '</option>';
                    });
                })
                .catch(function() {
                    subSelect.innerHTML = '<option value="">-- No subchannels --</option>';
                });
        } else {
            subSelect.innerHTML = '<option value="">-- First select a channel --</option>';
        }
    });
</script>
@endpush
