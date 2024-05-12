<x-admin.app-layout>
    <div class="row">
        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="mb-3 me-3 text-muted">Saldo</h5>
                        <h5 class="mb-0 me-3">Rp. 190.000.000</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="mb-3 me-3 text-muted">Event Saya</h5>
                        <h5 class="mb-0 me-3">3</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="mb-3 me-3 text-muted">Total Transaksi</h5>
                        <h5 class="mb-0 me-3">3,350</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card" style="min-height: 30rem">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Statistics</h5>
                        <small class="text-muted">Commercial networks and enterprises</small>
                    </div>
                    <div class="card-header-elements ms-auto py-0">
                        <h5 class="mb-0 me-3">$ 78,000</h5>
                        <span class="badge bg-label-secondary">
                            <i class='bx bx-up-arrow-alt bx-xs text-success'></i>
                            <span class="align-middle">37%</span>
                        </span>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <canvas id="lineChart" class="chartjs" data-height="500"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('page-script')
        <script>
            $(function() {
                // Color Variables
                const yellowColor = '#ffe800';
                let borderColor, gridColor, tickColor;
                if (isDarkStyle) {
                    borderColor = 'rgba(100, 100, 100, 1)';
                    gridColor = 'rgba(100, 100, 100, 1)';
                    tickColor = 'rgba(255, 255, 255, 0.75)'; // x & y axis tick color
                } else {
                    borderColor = '#f0f0f0';
                    gridColor = '#f0f0f0';
                    tickColor = 'rgba(0, 0, 0, 0.75)'; // x & y axis tick color
                }
                const lineChart = document.getElementById('lineChart');
                const cardColor = '#ffe800';
                const labelColor = '#a9b3be';
                const legendColor = '#000000';
                const headingColor = '#ffe800';
                if (lineChart) {
                    const lineChartVar = new Chart(lineChart, {
                        type: 'line',
                        data: {
                            labels: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140],
                            datasets: [{
                                    data: [80, 150, 180, 270, 210, 160, 160, 202, 265, 210, 270, 255,
                                        290, 360,
                                        375
                                    ],
                                    label: 'Europe',
                                    borderColor: config.colors.danger,
                                    tension: 0.5,
                                    pointStyle: 'circle',
                                    backgroundColor: config.colors.danger,
                                    fill: false,
                                    pointRadius: 1,
                                    pointHoverRadius: 5,
                                    pointHoverBorderWidth: 5,
                                    pointBorderColor: 'transparent',
                                    pointHoverBorderColor: cardColor,
                                    pointHoverBackgroundColor: config.colors.danger
                                },
                                {
                                    data: [80, 125, 105, 130, 215, 195, 140, 160, 230, 300, 220, 170,
                                        210, 200,
                                        280
                                    ],
                                    label: 'Asia',
                                    borderColor: config.colors.primary,
                                    tension: 0.5,
                                    pointStyle: 'circle',
                                    backgroundColor: config.colors.primary,
                                    fill: false,
                                    pointRadius: 1,
                                    pointHoverRadius: 5,
                                    pointHoverBorderWidth: 5,
                                    pointBorderColor: 'transparent',
                                    pointHoverBorderColor: cardColor,
                                    pointHoverBackgroundColor: config.colors.primary
                                },
                                {
                                    data: [80, 99, 82, 90, 115, 115, 74, 75, 130, 155, 125, 90, 140,
                                        130, 180
                                    ],
                                    label: 'Africa',
                                    borderColor: yellowColor,
                                    tension: 0.5,
                                    pointStyle: 'circle',
                                    backgroundColor: yellowColor,
                                    fill: false,
                                    pointRadius: 1,
                                    pointHoverRadius: 5,
                                    pointHoverBorderWidth: 5,
                                    pointBorderColor: 'transparent',
                                    pointHoverBorderColor: cardColor,
                                    pointHoverBackgroundColor: yellowColor
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                x: {
                                    grid: {
                                        color: borderColor,
                                        drawBorder: false,
                                        borderColor: borderColor
                                    },
                                    ticks: {
                                        color: labelColor
                                    }
                                },
                                y: {
                                    scaleLabel: {
                                        display: true
                                    },
                                    min: 0,
                                    max: 400,
                                    ticks: {
                                        color: labelColor,
                                        stepSize: 100
                                    },
                                    grid: {
                                        color: borderColor,
                                        drawBorder: false,
                                        borderColor: borderColor
                                    }
                                }
                            },
                            plugins: {
                                tooltip: {
                                    // Updated default tooltip UI
                                    rtl: isRtl,
                                    backgroundColor: cardColor,
                                    titleColor: headingColor,
                                    bodyColor: legendColor,
                                    borderWidth: 1,
                                    borderColor: borderColor
                                },
                                legend: {
                                    position: 'top',
                                    align: 'start',
                                    rtl: isRtl,
                                    labels: {
                                        usePointStyle: true,
                                        padding: 35,
                                        boxWidth: 6,
                                        boxHeight: 6,
                                        color: legendColor
                                    }
                                }
                            }
                        }
                    });
                }
            })
        </script>
    @endpush

</x-admin.app-layout>
