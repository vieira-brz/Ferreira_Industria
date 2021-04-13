$(document).ready(function()
{
    $('[name="confsenha"]').keyup(()=>
    {
        if ($('[name="confsenha"]').val() == $('[name="senha"]').val())
        {
            $('i#confirm').css('color', 'green');
        }
        else
        {
            $('i#confirm').css('color', 'red');
        }

        $('[name="confsenha"]').focusout(()=>
        {
            $('i#confirm').css({'color': 'black', 'transition': '.5s ease-out'});
        });
    });
});