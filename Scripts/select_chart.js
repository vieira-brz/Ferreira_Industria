$('document').ready(()=>{
    
    $('.btn').click(()=>
    {        
        $.post("../Controllers/php/select_dashboard.php", {datai: $('[name="datai"]').val(), dataf: $('[name="dataf"]').val()}, function(dados, status) { 
            alert(dados);
            if (status == 'success')
            {
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
