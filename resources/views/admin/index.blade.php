<x-admin-master>
    @section('content')

        @if(auth()->user()->userHasRole('Admin'))

        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
            <canvas id="myChart"></canvas>
        @endif
        @if(!auth()->user()->userHasRole('Admin'))

            <h1 class="h3 mb-4 text-gray-800">Personal Data</h1>
            <canvas id="myChart"></canvas>
        @endif


            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Posts', 'Categories', 'Comments'],
                        datasets: [{
                            label: 'Data of Web-Project',
                            data: [{{$postsCount}}, {{$categoriesCount}}, {{$commentsCount}}],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

    @endsection
</x-admin-master>
