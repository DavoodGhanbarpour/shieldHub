<style>

</style>

<script>
    $(document).on( 'click', '#passwordDisplay', function(){
    
        let toggledAttrs = {
            password: { type: 'text', text: 'Show password' },
            text: { type: 'password', text: 'Hide password' },
        };

        $('#password').attr('type', toggledAttrs[$('#password').attr('type')].type);
        $('#passwordDisplay').attr('data-bs-original-title', toggledAttrs[$('#password').attr('type')].text).tooltip('show');
    });
</script>