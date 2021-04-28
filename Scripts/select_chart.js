$('document').ready(()=>{
    
    $('.btn-primary').click((e)=>
    {            
        var datas = [];
        var consumo = [];

        e.preventDefault();

        alert($('input[name="datai"]').val())
        alert($('input[name="dataf"]').val())
        
        $.post('../Controllers/php/select_dashboard.php', 
        {
            inicial: $('input[name="datai"]').val(), 
            final: $('input[name="dataf"]').val()
        }, 
        function(dados, status) 
        { 
            if (status == 'success' && dados.charAt(0) != '<')
            {
                $('.second_section_content').css('display','block');

                var valores = JSON.parse(dados);
                
                var diasSemana = [];
                var consumoSemanaEnergia = [];
                var consumoSemanaEnergiaHorario = [];
                
                $.each(valores, function(key, value)
                {
                    $.each(value, function(chavePeriodo, consumo)
                    {
                        console.log(chavePeriodo + '   ' + consumo);
                    });
                });
                
                grafico (diasSemana, consumoSemanaEnergia, consumoSemanaEnergiaHorario);
            }
            else
            {
                alert('Erro na base de dados, chame o suporte! \nOrigem do erro: gráfico de energia.');
            }
        });
    });

    $('.btn-danger').click((e)=>
    {
        e.preventDefault();

        $('input').val('');
    });

    grafico(datas, consumo);
});

function grafico(datas, consumo)
{
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data:
    {
        labels: diasSemana,
        datasets: [
            {
                label: 'ENERGIA',
                borderWidth: 2,
                borderColor: 'rgb(0, 161, 153)',
                backgroundColor: 'rgb(0, 161, 153, .2)',
                data: consumoSemanaEnergia,
            },
            {
                label: 'HORÁRIO',
                borderWidth: 2,
                borderColor: 'rgb(60, 0, 255, 103)',
                backgroundColor: 'rgb(60, 0, 255, .2)',
                data: consumoSemanaEnergiaHorario,
            },
        ]
    },

    options:
    {
        responsive: true,

        scales: {
            yAxes: [{ ticks: { beginAtZero: true } }]
        },

        title:{
            display: true,
            text: 'GRÁFICO DE USO DE ENERGIA',
            fontColor: 'rgb(46, 46, 46)',
            fontSize: 20,
        },

        legend: { "display": true, position: 'bottom', },

        elements: { line: { tension: 0, }, },
    }
});
}
