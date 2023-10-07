@push('styles')
    <style>
        .table-loading {
            animation: placeholder-glow 2s ease-in-out infinite;
            background-color: currentColor !important;
            border-radius: var(--tblr-border-radius);
            opacity: 0.2;
        }
    </style>
@endpush

@push('scripts')
    <script>

        function setTableLoading(tableID) {

            element.addClass('table-loading');
        }

        function clearTableLoading(element) {

            element.removeClass('table-loading');
        }

    </script>
@endpush
