<x-admin.app-layout>
    <div class="row">
        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="mb-3 me-3 text-muted">Available Balance</h5>
                        <h5 class="mb-0 me-3">@format_currency($balance)</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="mb-3 me-3 text-muted">My Events</h5>
                        <h5 class="mb-0 me-3">@format_number($totalEvent)</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="mb-3 me-3 text-muted">Total Transaction</h5>
                        <h5 class="mb-0 me-3">@format_number($totalTransaction)</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card" style="min-height: 30rem">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Statistics</h5>
                        <small class="text-muted">Transaction per month summary</small>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="lineChart" class="chartjs" data-height="500"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('page-script')
        <script>
            const labels = [
                'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ];

            const chartData = JSON.parse('{!! $chartData !!}')

            $(function() {
                const borderColor = isDarkStyle ? 'rgba(100, 100, 100, 1)' : '#f0f0f0';
                const lineChart = document.getElementById('lineChart');
                const cardColor = '#ffe800';
                const labelColor = '#a9b3be';
                const legendColor = '#000000';
                const headingColor = '#ffe800';

                const lineChartVar = new Chart(lineChart, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '{{ now()->year }} Summary',
                            data: chartData,
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.5
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: false,
                        }
                    }
                });
            })
        </script>
    @endpush

</x-admin.app-layout>
