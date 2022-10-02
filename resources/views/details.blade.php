@extends('base')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('content')

    @if ($grade == null)
        <button type="button" class="btn btn-light mb-4">
            <a href="/{{ $user['id'] }}/grade/view-add">Add Grade</a>
        </button>
    @endif

    <h4>{{ $user['name'] }}</h4>
    <p>{{ $user['email'] }}</p>


    @if($grade != null)
    
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Score</th>
                    <th scope="col">Grade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">Quiz</th>
                    <td>{{ $grade['quiz'] }}</td>
                    <td>{{ $quiz }}</td>
                </tr>
                <tr>
                    <th scope="col">Tugas</th>
                    <td>{{ $grade['tugas'] }}</td>
                    <td>{{ $tugas }}</td>
                </tr>
                <tr>
                    <th scope="col">Absensi</th>
                    <td>{{ $grade['absensi'] }}</td>
                    <td>{{ $absensi }}</td>
                </tr>
                <tr>
                    <th scope="col">Praktek</th>
                    <td>{{ $grade['praktek'] }}</td>
                    <td>{{ $praktek }}</td>
                </tr>
                <tr>
                    <th scope="col">UAS</th>
                    <td>{{ $grade['uas'] }}</td>
                    <td>{{ $uas }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-4 mb-4">
            <canvas id="myChart" height="100px"></canvas>
        </div>

        <script type="text/javascript">
  
            var labels =  {{ Js::from($labels) }};
            var users =  {{ Js::from($data) }};
        
            const data = {
              labels: labels,
              datasets: [{
                label: 'Grade Count',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: users,
              }]
            };
        
            const config = {
              type: 'bar',
              data: data,
              options: {}
            };
        
            const myChart = new Chart(
              document.getElementById('myChart'),
              config
            );
        
        </script>

    @endif
@endsection