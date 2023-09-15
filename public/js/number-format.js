function number_format(number, thousands_sep) {
    if (number == undefined || !number.toString().length)
        return number;
    
    if ( isNaN(number_unformat(number)) )
        return 0;
        
    number = parseFloat(number_unformat(number));
    thousands_sep = typeof thousands_sep !== 'undefined' ? thousands_sep : ',';
    var parts = number.toString().split('.');
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);
    if ( !parts[0].toString().length && parts[0].toString().length )
        parts[0] = '0';

    console.log('parts', parts);
    return parts.join('.');
}

function number_unformat(number) {
    if (typeof number == 'undefined' || !number.length)
        return number;

    return number.toString().split(',').join('');
}

function isAtEnd(input) {
    const caretPosition = input.selectionEnd;
    const textLength    = input.value.length;
    return caretPosition === textLength;
}

$(document).on( 'keyup', '.number_format', function(){

    if ( $(this).val().toString().trim().split('.').length == 2 && isAtEnd(this) )
        return;
        
    $(this).val(number_format($(this).val()));
});