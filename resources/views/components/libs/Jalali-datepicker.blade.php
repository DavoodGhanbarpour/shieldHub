@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('libs/jalali-datepicker/jalalidatepicker.min.css') }}" />
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('libs/jalali-datepicker/jalalidatepicker.min.js') }}"></script>
    <script>
        $(document).ready( function(){
        
            jalaliDatepicker.startWatch();
        });
    </script>
@endpush