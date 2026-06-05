<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <title>{{ config('APP_NAME') }} | @yield('title')</title>

    @yield('recaptcha')
</head>
<body>

@include('partials.nav')

<main class="container py-4">
    @yield('body')
</main>

<footer class="bg-light py-3 mt-5 border-top">
    <div class="container text-center text-muted small">
        &copy; {{ date('Y') }} {{ config('APP_NAME') }}. All rights reserved.
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@stack('scripts')
</body>
</html>
