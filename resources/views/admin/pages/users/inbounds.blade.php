@extends('admin.layout.main')

@section('title', 'Edit User')

@section('content')

<form action="{{ route('admin.users.assignInbounds', ['user' => 1]) }}" method="POST" class="card">
    @method('put')
    @csrf

    <div class="card-body">
        <div class="row">



            <div class="col-lg-6 col-xl-3 mb-3">
                <div class="card card-active inbound-card"  role="button">
                    <input class="d-none inbound-checkbox" value="1" type="checkbox" name="inbounds[1]">
                    <span class="d-none row-inbound-link">Inbound Text</span>
                    
                    <div class="ribbon btn btn-primary inbound-copy-button">Copy</div>
                    <div class="card-body">
                        <p class="card-title fw-bold">Reality_01 | User_01</p>
                        <hr class="p-0 m-0">
                        <p class="card-title mb-1">192.168.1.1:443</p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, id eaque pariatur fuga eos esse ullam aliquam nihil quibusdam dolorem modi excepturi, ipsam corrupti laudantium at blanditiis totam laborum placeat.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-xl-3 mb-3">
                <div class="card card-active inbound-card"  role="button">
                    <input class="d-none inbound-checkbox" value="1" type="checkbox" name="inbounds[1]">
                    <span class="d-none row-inbound-link">Inbound Text</span>
                    <div class="ribbon btn btn-primary inbound-copy-button">Copy</div>
                    <div class="card-body">
                        <p class="card-title fw-bold">Reality_01 | User_01</p>
                        <hr class="p-0 m-0">
                        <p class="card-title mb-1">192.168.1.1:443</p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, id eaque pariatur fuga eos esse ullam aliquam nihil quibusdam dolorem modi excepturi, ipsam corrupti laudantium at blanditiis totam laborum placeat.
                        </p>
                    </div>
                </div>
            </div>

            

        </div>
    </div>

    <div class="card-footer text-end">
        <div class="d-flex">
            <a href="{{ url()->previous() }}" class="btn btn-link">Cancel</a>
            <button type="submit" class="btn btn-primary ms-auto">Submit</button>
        </div>
    </div>

</form>


@push('scripts')
<script>
    $(document).on( 'click', '.inbound-card', function(e){
    
        if ( $(e.target).is('div.inbound-copy-button') )
            return;

        $(this).toggleClass('card-active');
        $(this).find('.inbound-checkbox').prop('checked', $(this).hasClass('card-active'));
        $(this).find('.inbound-checkbox').prop('disabled', !$(this).hasClass('card-active'));
    });
    
    $(document).on( 'click', '.inbound-copy-button', function(){
    
        let link = $(this).closest('.inbound-card').find('.row-inbound-link').text();

        navigator.clipboard.writeText(link);
        toastr.success('Copied to clipboard!');
    });
</script>
@endpush

@push('styles')
    <style>
        .inbound-copy-button {
            cursor: copy;
        }
    </style>
@endpush

@endsection
