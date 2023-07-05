@php
    $class = isset($class) ? $class : '';
@endphp

<form action="{{ $link }}" method="post">

    @method('delete')
    @csrf
    <button type="button" class="{{ $class }} delete_button btn btn-danger my-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 7l16 0"></path>
            <path d="M10 11l0 6"></path>
            <path d="M14 11l0 6"></path>
            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
        </svg>
        {{__('app.pageComponents.delete')}}
    </button>
    <button class="submit_button d-none" type="submit"></button>

</form>

@push('scripts')
    <script>
        $(document).on( 'click', '.delete_button', function(){
        
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').find('.submit_button').click();
                }
            })
        });
        
    </script>
@endpush