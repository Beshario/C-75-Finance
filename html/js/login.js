$(function() {
    $('input[name=email]').focus();
});


var validateEmail = function(email) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(email);
}

$('#login').submit(function(event) {

    var value = $('input[name="email"]').val();
    var valid = validateEmail(value);
    alert(value);
    
    if (!valid) {
        $(this).css('color', 'red');
        Event.preventDefault;
        return false;
    } else {
        $(this).css('color', '#000');

    }



});