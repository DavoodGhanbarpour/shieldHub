@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('libs/pwt-datepicker/persian-datepicker.css') }}" />
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('libs/pwt-datepicker/persian-date.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/pwt-datepicker/persian-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".datepicker").pDatepicker({calendarType: 'gregorian', format: 'L', autoClose: true});
        });
    </script>
@endpush