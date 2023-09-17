@php
    $searchID       = isset($searchID) ? $searchID : 'tableSearch';
    $searchCol      = isset($searchCol) ? $searchCol : '';
    $searchClass    = isset($class) ? $class : '';
    $containerClass = isset($containerClass) ? $containerClass : '';
    $slot           = isset($slot) ? $slot : '';
@endphp

<ul class="list-inline {{$containerClass}}">
    <li class="{{$searchCol}}">
        <div class="input-icon mb-3 {{$searchClass}}">
            <input type="text" id="{{$searchID}}" value="" class="form-control" placeholder="{{__('app.pageComponents.search')}}…">
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                    <path d="M21 21l-6 -6"></path>
                </svg>
            </span>
        </div> 
    </li>
    {{$slot}}
</ul>

<style>
    ul.list-inline {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        margin: 0;
        list-style: none;
    }

    ul.list-inline li {
        padding-right: 5px;
    }
</style>