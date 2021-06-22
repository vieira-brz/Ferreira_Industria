$('document').ready(()=>
{    
    var soma = 0;
    var total = 0;

    function calcularValorConsumo(energia)
    {
        var valor = 0.00011;
        
        var x = 0;
        var y = 0;

        x = ((( energia ) / 1000) * valor);

        y = y + x;
        
        return y;
    }

    function getDataDashboardDAY() 
    {
        soma = 0;
        total = 0;
        
        var hora = [];
        var horaDonut = [];
        var energia = [];
        var consumoDia = [];
        var consumoDiaDonut = [];

        $.get("../Controllers/php/diario", function(dados, status) 
        { 
            if (status == 'success')
            {
                var data = JSON.parse(dados);
                data = data[0];

                var h = data.HORARIO;
                var e = data.ENERGIA;
                
                horaDonut.push(h[h.length - 1]);
                horaDonut.push('Potência Livre');
                
                var cnsDiaDonut = calcularValorConsumo(e[e.length - 1]);
                var potDiaDonut = e[e.length - 1] / 1000;
                
                let valorCns = 1.000 - cnsDiaDonut;
                
                consumoDiaDonut.push(potDiaDonut);
                consumoDiaDonut.push(valorCns);
                
                $('.inputGrafico').attr('value','Gasto atual de '+ cnsDiaDonut +' reais');
                $('.inputGrafico2').attr('value','Potência atual de '+ (e[e.length - 1] / 1000) +' kilowatts');

                $.each(h, function(i,k)
                {
                    hora.push(k);
                });

                $.each(e, function(i,k)
                {
                    energia.push(k);
                    
                    var cnsDia = calcularValorConsumo(k);
                    consumoDia.push(cnsDia);
                });
                
                grafDay(hora, energia);
                console.log(consumoDiaDonut, horaDonut);
                grafDayCust(horaDonut, consumoDiaDonut);
            }
            else
            {
                swal('Erro na base de dados, chame o suporte! \n\nOrigem do erro: gráfico de energia.');
            }
        });
    }
    
    getDataDashboardDAY();
    setInterval(() => {getDataDashboardDAY();}, 5000);
});

function grafDay (hora, energia)
{
var ctx = document.getElementById('dayChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data:
    {
        labels: hora,
        datasets: [
            {
                label: 'CONSUMO',
                borderWidth: 2,
                borderColor: '#230aff',
                backgroundColor: '#230aff20',
                data: energia,
                trendlineLinear: {
                    style: "rgba(3, 90, 252)",
                    lineStyle: "dotted|solid",
                    width: 2
                }
            },
        ]
    },

    scales: {
        xAxes: [{
          ticks: {
          },
          type: 'time',
          time: {
            round: 'minutes',
            parser: "YYYY, M, D, H, m, s",
            displayFormats: {
              'millisecond': '',
              'second': 'H:mm',
              'minute': 'H:mm',
              'hour': 'H:mm',
              'day': 'H:mm',
              'week': 'MMM DD',
              'month': 'MMM DD',
              'quarter': 'MMM DD',
              'year': 'MMM DD',
            },
            tooltipFormat: 'D MMM YYYY H:mm'
          }
        }],
      },

    options:
    {
        responsive: true,

        animation: false,

        maintainAspectRatio: false,

        legend: { "display": true, position: 'bottom', },
        
        elements: { line: { tension: 0, }, },
    }
});
}

function grafDayCust (hora, custo)
{
var ctx = document.getElementById('chartGasto').getContext('2d');
var chart = new Chart(ctx, {
    type: 'doughnut',
    data:
    {
        labels: hora,
        datasets: [
            {
                label: 'CONSUMO',
                borderWidth: 2,
                borderColor: ['#230aff','#555'],
                backgroundColor: ['#230aff20','#55555550'],
                data: custo,
                trendlineLinear: {
                    style: "rgba(3, 90, 252)",
                    lineStyle: "dotted|solid",
                    width: 2
                }
            },
        ]
    },

    scales: {
        xAxes: [{
          ticks: {
          },
          type: 'time',
          time: {
            round: 'minutes',
            parser: "YYYY, M, D, H, m, s",
            displayFormats: {
              'millisecond': '',
              'second': 'H:mm',
              'minute': 'H:mm',
              'hour': 'H:mm',
              'day': 'H:mm',
              'week': 'MMM DD',
              'month': 'MMM DD',
              'quarter': 'MMM DD',
              'year': 'MMM DD',
            },
            tooltipFormat: 'D MMM YYYY H:mm'
          }
        }],
      },

    options:
    {
        maintainAspectRatio: false,
        circumference: Math.PI + 1,
        rotation: -Math.PI - 0.5,
        cutoutPercentage: 64,
    
        onClick(...args) {
          console.log(args);
        },
        
        // animation: false,
    
        responsive: true,

        maintainAspectRatio: false,

        legend: { "display": true, position: 'bottom', },
        
        elements: { line: { tension: 0, }, },
    }
});
}