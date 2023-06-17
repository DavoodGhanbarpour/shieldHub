<style>

</style>

<script>
  $(document).on( 'click', '#passwordDisplay', function(){
  
    if ( $(this).hasClass('text-info') ) {
      $(this).removeClass('text-info');
      $(this).attr('data-bs-original-title', 'Show password').tooltip('show');
      $('#password').attr('type', 'password');
    } else {
      $(this).addClass('text-info');
      $(this).attr('data-bs-original-title', 'Hide password').tooltip('show');
      $('#password').attr('type', 'text');
    }
  });
</script>