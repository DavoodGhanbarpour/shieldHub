@php
    $firstPrice = $price;
    $price = addSeparator(abs($price));
    if ( $firstPrice < 0 )
    {
        $title = __('app.general.you_have_debt', ['price' => "<span class='fw-bold'>$price</span>"]);
        $class = 'text-danger';
    }
    elseif ( $firstPrice > 0 )
    {
        $title = __('app.general.you_have_credit', ['price' => "<span class='fw-bold'>$price</span>"]);
        $class = 'text-success';
    }
    else 
    {
        $title = __('app.general.you_dont_have_credit_or_debt');
        $class = '';
    }
@endphp

<tr class="{{$class}}">
    <td colspan="{{$colspan}}">
        {!! $title !!}.
    </td>
</tr>