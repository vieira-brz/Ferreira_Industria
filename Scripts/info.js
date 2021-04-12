$('#pckey').one('keyup', ()=>
{
    alert('Aviso: a "Palavra-chave" será utilizada para recuperar, editar sua senha e outras informações pessoais, lembre-se de anotá-la para não se esquecer. Boa sessão!');
});

$('.afo').css('display', 'flex').fadeOut(4000);

$('.alert').css('display', 'block').fadeOut(4000);

$('.fa-key').click(()=>
{
    if ($('[name*="senha"]').prop('type') == 'password') { $('[name*="senha"]').prop('type', 'text'); }
    else { $('[name*="senha"]').prop('type', 'password'); }
});