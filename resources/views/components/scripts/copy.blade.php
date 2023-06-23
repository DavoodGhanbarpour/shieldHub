<script>
    $(document).ready(function () {

        var clipboard = new ClipboardJS('.copy-button', {
            text: function (trigger) {
                return $(trigger).closest('.copy-parent').find('.copy-text').text();
            }
        });

        clipboard.on('success', function () {
            toastr.success('Copied to clipboard.');

        }).on('error', function () {
            toastr.error('Can not copy to clipboard!');
        });
    });
</script>