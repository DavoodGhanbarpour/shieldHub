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
                <div class="card inbound-card"  role="button">
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

    function setInboundStatus( element ) {

        element.find('.inbound-checkbox').prop('checked', element.hasClass('card-active'));
        element.find('.inbound-checkbox').prop('disabled', !element.hasClass('card-active'));
    }

    function setInboundsStatus() {

        $('.inbound-card').each(function(){
            setInboundStatus($(this));
        })
    }
    
    $(document).ready( function(){
    
        setInboundsStatus();

        var clipboard = new ClipboardJS('.inbound-copy-button', {
            text: function(trigger) {
                return $(trigger).closest('.inbound-card').find('.row-inbound-link').text();
            }
        });
        
        clipboard.on('success', function() {
            toastr.success('Copied to clipboard.');

        }).on('error', function() {
            toastr.error('Can not copy to clipboard!');
        });
    });

    $(document).on( 'click', '.inbound-card', function(e){
    
        if ( $(e.target).is('div.inbound-copy-button') )
            return;

        $(this).toggleClass('card-active');
        setInboundStatus($(this));
    });
    
    // $(document).on( 'click', '.inbound-copy-button', function(){
    
    //     let link = $(this).closest('.inbound-card').find('.row-inbound-link').text();

    //     navigator.clipboard.writeText(link);
    //     toastr.success('Copied to clipboard!');
    // });
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
