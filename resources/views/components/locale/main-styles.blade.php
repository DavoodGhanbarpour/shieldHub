@if (App\Models\User::SUPPORTED_LANGUAGES[config()->get('app.locale')]['dir'] == 'ltr')
    <link href="{{ asset('css/tabler.min.css?1684106062') }}" rel="stylesheet"/>        
@else
    <link href="{{ asset('css/tabler.rtl.css') }}" rel="stylesheet"/>        
@endif