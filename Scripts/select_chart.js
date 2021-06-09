$('document').ready(()=>{
       
    var soma = 0;
    var total = 0;

    function somarGastos(soma)
    {
        total += soma;
        // var res = total.toFixed(2).replace('.',',');
        $('.mostraGastos').html('<h3 style="font-weight:bold;"> Gastos totais: R$ '+ res +'</h3>');
    }

    function calcularValorConsumo(energia)
    {
        var valor = 0.00011;
        
        var x = 0;
        var y = 0;

        x = ((( energia ) / 1000) * valor);

        y = y + x;

        somarGastos(y);
        return y;

        // var whats = energia;

        // var kwh = whats / 1000;
        // var pay = 0.52;
        // var day = 30;
        // var hour = 9;
        // var tmp = kwh * hour;
        //     tmp = tmp * pay;
        // var gasto = tmp * day;

        // soma = soma + gasto;
        
        // var returnFunction = soma.toFixed(0).replace('.','');
        // somarGastos(soma);
        // return returnFunction;
    }
    
    $('.btn-primary').click((e)=>
    {            
        e.preventDefault();
        e.stopImmediatePropagation();

        $('.carregamento').css('display', 'block');
        $('.content').css('display','none');
        $('canvas').css('display','flex');

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

                                var retorno = calcularValorConsumo(key.ENERGIA);

                                valorDoConsumo.push(retorno);
                            });
                        });
                    });
    
                    // var desinvertidoEnergia = energia.reverse();
                    // var desinvertidoPeriodo = periodo.reverse();
    
                    // somarGastos(valorDoConsumo);
    
                    $('.carregamento').css('display', 'none');
                    $('.content').css('display','block');
    
                    grafico (periodo, energia);
                }
                else
                {
                    swal('Erro na base de dados, chame o suporte! \n\nOrigem do erro: gráfico de energia.');
                }
            });
        }, 5000);
        
    });

    $('.btn-danger').click((e)=>
    {
        e.preventDefault();
        e.stopImmediatePropagation();

        $('input').val('');
        
        periodo = [];
        valorDoConsumo = [];
        energia = [];

        $('canvas').css('display','none');
        $('.mostraGastos').css('display','none');
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
                borderColor: '#230aff',
                backgroundColor: '#230aff20',
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
