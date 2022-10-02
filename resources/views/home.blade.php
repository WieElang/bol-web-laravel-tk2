@extends('base')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('content')
    <h4>Mahasiswa</h4>

    <ul class="list-group list-group-flush">
        @foreach ($users as $user)
            <li class="list-group-item"><a href="/{{ $user["id"] }}">{{ $user["name"] }}</a></li>
        @endforeach
    </ul>

    @if ($grades->isNotEmpty())

        <div class="mt-5">

            <h4>Grade Chart</h4>

            <div class="mt-2 mb-4">
                <canvas id="allGradeChart" height="100px"></canvas>
            </div>

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
            document.getElementById('allGradeChart'),
            config
            );
        
        </script>

    @endif

@endsection