$('#pckey').focusout(()=>{
    alert('Aviso: a "Palavra-chave" será utilizada para recuperar, editar sua senha e outras informações pessoais, lembre-se de anotá-la para não se esquecer. Boa sessão!');
});

$('.afo').css('display', 'flex').fadeOut(4000);

$('.alert').css('display', 'block').fadeOut(4000);