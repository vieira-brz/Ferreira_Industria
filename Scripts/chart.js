$('document').ready(()=>{
    
    var soma = 0;

    function somarGastos(energia)
    {
        var whats = energia;

        var kwh = whats / 1000;
        var pay = 0.52;
        var day = 30;
        var hour = 9;
        var tmp = kwh * hour;
            tmp = tmp * pay;
        var gasto = tmp * day;

        soma = soma + gasto;
        
        var reais = soma.toFixed(2).replace('.',',');
        var returnFunction = soma.toFixed(0).replace('.','');

        $('.mostraGastos').html('<h3 style="font-weight:bold;"> Gastos totais: R$ '+ reais +'</h3>');
        
        return returnFunction;
    }
    
    function getDataDashboard() 
    {
        $.get("../Controllers/php/dashboard.php", function(dados, status) 
        { 
            if (status == 'success')
            {
                var valores = JSON.parse(dados);
                
                var diasSemana = [];
                var consumoSemanaEnergia = [];
                var hora = [];
                var valorDoConsumo = [];
                
                $.each(valores, function(key, value)
                {
                    $.each(value, function(chavePeriodo, consumo)
                    {
                        $.each(consumo, function(chaveEnergia, valor)
                        {
                            if (chavePeriodo == 'semanal')
                            {
                                diasSemana.push(chaveEnergia);
                                consumoSemanaEnergia.push(valor.ENERGIA);

                                var retorno = somarGastos(valor.ENERGIA);

                                valorDoConsumo.push(retorno);
                                hora.push(valor.HORARIO);
                            }
                        });
                    });
                });

                grafico (diasSemana, consumoSemanaEnergia);
                grafico_hora_pico (diasSemana, valorDoConsumo);
                grafico_hora_pico2 (diasSemana, hora);
            }
            else
            {
                alert('Erro na base de dados, chame o suporte! \nOrigem do erro: gráfico de energia.');
            }
        });
    }
    
    getDataDashboard();
    setInterval(() => {getDataDashboard();}, 30000);
});

function grafico (diasSemana, consumoSemanaEnergia)
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
                borderColor: '#230aff',
                backgroundColor: '#230aff20',
                data: consumoSemanaEnergia,
                trendlineLinear: {
                    style: "rgba(3, 90, 252)",
                    lineStyle: "dotted|solid",
                    width: 2
                }
            },
        ]
    },

    options:
    {
        responsive: true,

        scales: {
            yAxes: [{ ticks: { beginAtZero: true } }]
        },

        // title:{
        //     display: true,
        //     text: 'USO DE ENERGIA',
        //     fontColor: 'rgb(46, 46, 46)',
        //     fontSize: 20,
        // },

        maintainAspectRatio: false,

        legend: { "display": true, position: 'bottom', },

        // elements: { line: { tension: 0, }, },
    }
});
}

function grafico_hora_pico2 (diasSemana, hora)
{
var ctx = document.getElementById('myChart2').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data:
    {
        labels: diasSemana,
        datasets: [
            {
                label: 'HORÁRIO',
                borderWidth: 2,
                borderColor: '#230aff',
                backgroundColor: '#230aff20',
                data: hora,
            },
        ]
    },

    options:
    {
        responsive: true,

        // scales: {
        //     yAxes: [{ ticks: { beginAtZero: true } }]
        // },

        // title:{
        //     display: true,
        //     text: 'HORÁRIOS DE PICO',
        //     fontColor: 'rgb(46, 46, 46)',
        //     fontSize: 20,
        // },

        maintainAspectRatio: false,

        legend: { "display": true, position: 'bottom', },

        // elements: { line: { tension: 0, }, },
    }
});
}

function grafico_hora_pico (diasSemana, hora)
{
var ctx = document.getElementById('myChart3').getContext('2d');
var chart = new Chart(ctx, {
    type: 'horizontalBar',
    data:
    {
        labels: diasSemana,
        datasets: [
            {
                label: 'GASTOS',
                borderWidth: 2,
                borderColor: '#230aff',
                backgroundColor: '#230aff20',
                data: hora,
            },
        ]
    },

    options:
    {
        responsive: true,

        // scales: {
        //     yAxes: [{ ticks: { beginAtZero: true } }]
        // },

        // title:{
        //     display: true,
        //     text: 'GASTOS',
        //     fontColor: 'rgb(46, 46, 46)',
        //     fontSize: 20,
        // },

        maintainAspectRatio: false,

        legend: { "display": true, position: 'bottom', },

        // elements: { line: { tension: 0, }, },
    }
});
}
