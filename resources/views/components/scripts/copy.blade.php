@push('scripts')
    <script>
        var clipboard;
        $(document).ready(function () {

            clipboard = new ClipboardJS('.copy-button', {
                text: function (trigger) {
                    return $(trigger).closest('.copy-parent').find('.copy-text').text();
                }
            });

            clipboard.on('success', function () {
                toastr.success('{{__('app.pageComponents.copied')}}');

            }).on('error', function () {
                toastr.error('{{__('app.pageComponents.not_copied')}}');
            });
        });

        $(document).on( 'shown.bs.modal', '.modal', function(){
        
            clipboard.container = document.getElementById($(this).attr('id')); 
        });

        $(document).on( 'hidden.bs.modal', '.modal', function(){
        
            clipboard.container = document.getElementsByTagName('body')[0]; 
        });


    </script>
@endpush
