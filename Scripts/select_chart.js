$('document').ready(()=>{

    var totalGastos = [];
    function somarGastos(reais)
    {
        var soma = 0;
        
        for (var i = 0; i < reais.length; i++)
        {
            totalGastos[i] = parseFloat(reais[i]);
            soma += parseFloat(totalGastos[i]);    
        }

        $('.mostraGastos').html('<h3 style="font-weight:bold;"> Gastos totais: R$ '+ soma +'</h3>');
    }
    
    $('.btn-primary').click((e)=>
    {            
        e.preventDefault();
        e.stopImmediatePropagation();

        $('.carregamento').css('display', 'block');
        $('.content').css('display','none');

        setTimeout(() => 
        {
            $.post('../Controllers/php/select_dashboard', 
            {
                inicial: $('input[name="datai"]').val(), 
                final: $('input[name="dataf"]').val()
            }, 
            function(dados, status) 
            { 
                if (status == 'success' && dados.charAt(0) != '<')
                {
                    $('.second_section_content').css('display','block');
                    $('.mostraGastos').css('display','block');
                    
                    var valores = JSON.parse(dados);
    
                    var periodo = [];
                    var energia = [];
                    var valorDoConsumo = [];
                    
                    $.each(valores, function(key, value)
                    {
                        $.each(value, function(chavePeriodo, consumo)
                        {
                            $.each(consumo, function(idx, key)
                            {
                                periodo.push(idx);
                                energia.push(key.ENERGIA);
                                valorDoConsumo.push(key.ENERGIA * 0.52);
                            });
                        });
                    });
    
                    // var desinvertidoEnergia = energia.reverse();
                    // var desinvertidoPeriodo = periodo.reverse();
    
                    somarGastos(valorDoConsumo);
    
                    $('.carregamento').css('display', 'none');
                    $('.content').css('display','block');
    
                    grafico (periodo, energia);
                }
                else
                {
                    alert('Erro na base de dados, chame o suporte! \nOrigem do erro: gráfico de energia.');
                }
            });
        }, 5000);
        
    });

    $('.btn-danger').click((e)=>
    {
        e.preventDefault();
        e.stopImmediatePropagation();

        $('input').val('');
    });
});

function grafico(periodo, energia)
{
var ctx = document.getElementById('myChartSelected').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data:
    {
        labels: periodo,
        datasets: [
            {
                label: 'ENERGIA',
                borderWidth: 2,
                borderColor: 'rgb(0, 161, 153)',
                backgroundColor: 'rgb(0, 161, 153, .2)',
                data: energia,
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

        // elements: { line: { tension: 0, }, },
    }
});
}
