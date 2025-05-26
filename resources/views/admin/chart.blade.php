@extends('layout.admin') 

@section('title', 'Grafikon porudzbina')

@section('content')
    <h2>Ukupne porudzbine po danima</h2>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Datum', 'Ukupno'],
          @foreach($data as $row)
            ['{{ $row->datum }}', {{ $row->ukupno }}],
          @endforeach
        ]);

        var options = {
          title: 'Ukupne porudžbine po danima',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
@endsection
