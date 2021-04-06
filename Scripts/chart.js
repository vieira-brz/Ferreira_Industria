$('document').ready(()=>{
    $.get("../Controllers/php/dashboard.php", function(dados, status) {

        var valores = JSON.parse(dados);

        var diasSemana = [];
        var consumoSemanaEnergia = [];
        var consumoSemanaEnergiaHorario = [];

        $.each(valores, function(key, value)
        {
            $.each(value, function(chavePeriodo, consumo){
                $.each(consumo, function(chaveEnergia, valor)
                {
                    if (chavePeriodo = 'semanal')
                    {
                        diasSemana.push(chaveEnergia);
                        consumoSemanaEnergia.push(valor.ENERGIA);
                        consumoSemanaEnergiaHorario.push(valor.HORARIO);
                    }
                });
            });
        });

        grafico (diasSemana, consumoSemanaEnergia, consumoSemanaEnergiaHorario);
    });
});

function grafico (diasSemana, consumoSemanaEnergia, consumoSemanaEnergiaHorario)
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