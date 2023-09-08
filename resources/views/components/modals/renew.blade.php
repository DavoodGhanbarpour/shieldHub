<div class="modal" id="renewModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.subscriptions.renew') }}" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav card-header-tabs p-0" data-bs-toggle="tabs">
                                <li class="nav-item col justify-content-center d-flex">
                                    <a href="#daysCount" class="nav-link active" data-bs-toggle="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-days-counter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M20.779 10.007a9 9 0 1 0 -10.77 10.772"></path>
                                            <path d="M13 21h8v-7"></path>
                                            <path d="M12 8v4l3 3"></path>
                                        </svg>
                                        Days Count
                                    </a>
                                </li>

                                <li class="nav-item col justify-content-center d-flex">
                                    <a href="#date" class="nav-link" data-bs-toggle="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-due" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                            <path d="M16 3v4"></path>
                                            <path d="M8 3v4"></path>
                                            <path d="M4 11h16"></path>
                                            <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                        </svg>
                                        Date
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane" id="date">
                                    <input type="text" name="date" class="form-control datepicker" placeholder="{{__('app.general.date')}}">
                                </div>

                                <div class="tab-pane active show" id="daysCount">
                                    <div class="form-selectgroup">
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="daysCount" value="15" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label">15</span>
                                        </label>
                
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="daysCount" value="30" class="form-selectgroup-input" checked="checked">
                                            <span class="form-selectgroup-label">30</span>
                                        </label>
                
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="daysCount" value="60" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label">60</span>
                                        </label>
                
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="daysCount" value="120" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label">120</span>
                                        </label>
                
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="daysCount" value="360" class="form-selectgroup-input">
                                            <span class="form-selectgroup-label">360</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3">
                        <label class="form-label">Manuel Price</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <input class="form-check-input m-0" id="manuelPriceCheckbox" type="checkbox">
                            </span>
                            <input type="text" class="form-control number_format" disabled id="manuelPriceInput" autocomplete="off">
                        </div>
                    </div>
                    <div class="d-none" id="hiddenFormInputs"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <x-buttons.submit/>
                </div>
            </div>
        </form>
    </div>
</div>
  
@include('components.libs.pwt-datepicker')

@push('styles')
    <style>
        #renewModal .nav-link.active {
            color: var(--tblr-nav-link-hover-color);
            text-decoration: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).on( 'change', '#manuelPriceCheckbox', function(){
            $('#manuelPriceInput').prop('disabled', !($(this).is(':checked')));
        });

        $(document).on( 'click', '#submitButton', function(){
        
            $(this).closest('form')[0].submit();
        });
    </script>
@endpush