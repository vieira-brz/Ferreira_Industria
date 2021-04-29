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
    
    function getDataDashboard() 
    {
        $.get("../Controllers/php/dashboard.php", function(dados, status) 
        { 
            if (status == 'success')
            {
                var valores = JSON.parse(dados);
                
                var diasSemana = [];
                var consumoSemanaEnergia = [];
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
                                valorDoConsumo.push(valor.ENERGIA * 0.52);
                            }
                        });
                    });
                });

                somarGastos(valorDoConsumo);
                grafico (diasSemana, consumoSemanaEnergia);
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
                borderColor: 'rgb(0, 161, 153)',
                backgroundColor: 'rgb(0, 161, 153, .2)',
                data: consumoSemanaEnergia,
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
