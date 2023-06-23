<script>
    $(document).ready(function () {

        var clipboard = new ClipboardJS('.copy-button', {
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
</script>