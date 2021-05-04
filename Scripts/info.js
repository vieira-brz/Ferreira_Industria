$('#pckey').one('keyup', ()=>
{
    alert('Aviso: a "Palavra-chave" será utilizada para recuperar, editar sua senha e outras informações pessoais, lembre-se de anotá-la para não se esquecer. \n\nNão são permitidos: acentos e caracteres especiais como: @ / # / $ e demais. \n\nBoa sessão!');
});

$('.afo').css('display', 'flex').fadeOut(4000);

$('.alert').css('display', 'block').fadeOut(4000);

$('.fa-key').click(()=>
{
    if ($('[name*="senha"]').prop('type') == 'password') { $('[name*="senha"]').prop('type', 'text'); }
    else { $('[name*="senha"]').prop('type', 'password'); }
});


$('.dispnone').css('display', 'none');

$('i#nome').click((e)=>
{
    e.preventDefault();
    $('.conta_nome_edit').text('');
    $('.conta_texto_nome').css('padding-top', 10);
    $('.conta_nome_edit').append('<input type="text" placeholder="Digite seu novo nome..." style="padding-left: 5px"; id="nomenovoconta">');
    $('.conta_nome_edit').append('<i class="fas fa-times" style="float: right; padding: 10px 5px;" id="email"></i>');
    $('i.fa-times').click((e)=>{ e.preventDefault(); location.reload();});
    $('.conta_nome_edit').append('<i class="fas fa-check" style="float: right; padding: 10px 5px;" id="email"></i>');

    $('.fa-check').click((e)=>
    {
        e.preventDefault();

        $.post('../Functions/JS_FUNC/alteraSomenteNome', 
        {
            nome: $('#nomenovoconta').val()
        }, 
        function(data)
        {
            if (data == 1)
            {
                swal({
                    title: "Success!",
                    text: "Seu nome foi alterado com sucesso, logue novamente para atualizar sua conta!",
                    icon: "success",
                    button: "Prosseguir",
                });
                $('.conta_texto_nome').css('padding-top', 0);
                $('.conta_nome_edit').text($('#nomenovoconta').val());
                $('.conta_nome_edit').append('<i class="fas fa-edit" style="float: right;" id="nome"></i> ');
            }
            else if (data == -1)
            {
                swal({
                    title: "Erro!",
                    text: "Lamento... não foi possível alterar seu nome!",
                    icon: "error",
                    button: "Entendi",
                });
                location.reload();
            }
            else
            {
                swal({
                    title: "Erro!",
                    text: "Erro ao conectar-se com o servidor, chame o suporte!",
                    icon: "error",
                    button: "Entendi",
                });
                location.reload();
            }
        });
    });
});

$('i#email').click((e)=>
{
    e.preventDefault();
    $('.conta_email_edit').text('');
    $('.conta_texto_email').css('padding-top', 10);
    $('.conta_email_edit').append('<input type="email" placeholder="Digite seu novo e-mail..." style="padding-left: 5px"; id="emailnovoconta" required>');
    $('.conta_email_edit').append('<i class="fas fa-times" style="float: right; padding: 10px 5px;" id="email"></i>');
    $('i.fa-times').click((e)=>{ e.preventDefault(); location.reload();});
    $('.conta_email_edit').append('<i class="fas fa-check" style="float: right; padding: 10px 5px;" id="email"></i>');

    $('.fa-check').click((e)=>
    {
        e.preventDefault();

        $.post('../Functions/JS_FUNC/alteraSomenteEmail', 
        {
            email: $('#emailnovoconta').val()
        }, 
        function(data)
        {
            if (data == 1)
            {
                swal({
                    title: "Success!",
                    text: "Seu email foi alterado com sucesso, logue novamente para atualizar sua conta!",
                    icon: "success",
                    button: "Prosseguir",
                });
                $('.conta_texto_email').css('padding-top', 0);
                $('.conta_email_edit').text($('#emailnovoconta').val());
                $('.conta_email_edit').append('<i class="fas fa-edit" style="float: right;" id="email"></i> ');
            }
            else if (data == 2)
            {
                swal({
                    title: "Erro!",
                    text: "Lamento... não foi possível alterar seu email!",
                    icon: "error",
                    button: "Entendi",
                });
                location.reload();
            }
            else if (data == 3)
            {
                swal({
                    title: "Aviso!",
                    text: "Este e-mail já está em uso!",
                    icon: "warning",
                    button: "Entendi",
                });
                location.reload();
            }
            else
            {
                swal({
                    title: "Erro!",
                    text: "Erro ao conectar-se com o servidor, chame o suporte!",
                    icon: "error",
                    button: "Entendi",
                });
                location.reload();
            }
        });
    });
});

$('i#senha').click((e)=>
{
    e.preventDefault();
    
    var confirmacao = confirm('Sua senha está sendo mostrada de forma criptografada, deseja mesmo altera-la? Isso não mudará sua visualização!');
    if (confirmacao == true)
    {
        $('.conta_senha_edit').text('');
        $('.conta_texto_senha').css('padding-top', 10);
        $('.conta_senha_edit').append('<input type="text" placeholder="Digite sua nova senha..." style="padding-left: 5px"; id="senhanovaconta">');
        $('.conta_senha_edit').append('<i class="fas fa-times" style="float: right; padding: 10px 5px;" id="email"></i>');
        $('i.fa-times').click((e)=>{ e.preventDefault(); location.reload();});
        $('.conta_senha_edit').append('<i class="fas fa-check" style="float: right; padding: 10px 5px;" id="email"></i>');

        $('.fa-check').click((e)=>
        {
            e.preventDefault();

            $.post('../Functions/JS_FUNC/alteraSomenteSenha', 
            {
                senha: $('#senhanovaconta').val()
            }, 
            function(data)
            {
                if (data == 1)
                {
                    swal({
                        title: "Sucesso!",
                        text: "Sua senha foi alterada com sucesso, logue novamente para atualizar sua conta!",
                        icon: "success",
                        button: "Prosseguir",
                    });
                    location.reload();
                }
                else if (data == -1)
                {
                    swal({
                        title: "Erro!",
                        text: "Lamento... não foi possível alterar sua senha!",
                        icon: "error",
                        button: "Entendi",
                    });
                    location.reload();
                }
                else
                {
                    swal({
                        title: "Erro!",
                        text: "Erro ao conectar-se com o servidor, chame o suporte!",
                        icon: "error",
                        button: "Entendi",
                    });
                    location.reload();
                }
            });
        });
    }
});

$('input[name="pesquisarNome"]').keyup((e)=>
{
    e.preventDefault();

    var value = $('input[name="pesquisarNome"]').val().toLowerCase();

    $('.filterTr').filter(function() 
    {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});