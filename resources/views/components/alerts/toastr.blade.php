
<script>
    toastr.options = {
        'positionClass' : "toast-bottom-right",
    }
</script>

@if( $errors->any() )
    <script>
        toastr.error('@foreach ($errors->all() as $error)<li class="mx-3"> {{ $error }} </li> @endforeach')
    </script>
@endif