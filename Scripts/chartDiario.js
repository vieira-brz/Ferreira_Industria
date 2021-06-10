$('document').ready(()=>
{    
    var soma = 0;
    var total = 0;

    function somarGastos(soma)
    {
        total += soma;
        var res = total.toFixed(6).replace('.',',');
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
    }

    function getDataDashboardDAY() 
    {
        soma = 0;
        total = 0;
        
        var hora = [];
        var energia = [];
        var consumoDia = [];

        $.get("../Controllers/php/diario.php", function(dados, status) 
        { 
            if (status == 'success')
            {
                var data = JSON.parse(dados);
                data = data[0];

                var h = data.HORARIO;
                var e = data.ENERGIA;

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
                grafDayCust(hora, consumoDia);
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
    type: 'horizontalBar',
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
                borderColor: '#230aff',
                backgroundColor: '#230aff20',
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
        responsive: true,

        maintainAspectRatio: false,

        legend: { "display": true, position: 'bottom', },
        
        elements: { line: { tension: 0, }, },
    }
});
}