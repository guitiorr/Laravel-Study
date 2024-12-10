<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localization Example</title>
</head>
<body>
    {{ app()->getLocale() }}
    <h1>{{ __('messages.greeting') }}</h1>
    <p>{{ __('messages.instruction') }}</p>
    <a href="{{ url('lang/en') }}">English</a>
    <a href="{{ url('lang/id') }}">Bahasa</a>
</body>
</html>
