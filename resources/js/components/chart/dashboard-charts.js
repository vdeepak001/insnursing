import ApexCharts from 'apexcharts';

export function initDashboardCharts() {
    const configEl = document.getElementById('dashboard-chart-data');

    if (!configEl) {
        return;
    }

    const data = JSON.parse(configEl.textContent || '{}');
    const charts = [];

    const attemptsEl = document.querySelector('#dashboardAttemptsChart');

    if (attemptsEl && data.attempts_overview) {
        const overview = data.attempts_overview;
        const seriesData = overview.series ?? [];
        const allValues = seriesData.flatMap((series) => series.data ?? []);
        const peakValue = allValues.length > 0 ? Math.max(...allValues) : 0;
        const yAxisMax = peakValue === 0 ? 200 : Math.ceil(peakValue / 200) * 200;

        const attemptsChart = new ApexCharts(attemptsEl, {
            series: seriesData,
            colors: overview.colors ?? ['#107C85', '#1A7F64', '#E68A2E'],
            chart: {
                fontFamily: 'Outfit, sans-serif',
                type: 'line',
                height: 320,
                toolbar: { show: false },
                zoom: { enabled: false },
            },
            dataLabels: { enabled: false },
            stroke: {
                curve: 'smooth',
                width: 3,
            },
            markers: {
                size: 4,
                strokeWidth: 2,
                hover: { size: 6 },
            },
            xaxis: {
                categories: overview.categories ?? [],
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: {
                    style: {
                        colors: '#64748B',
                        fontSize: '12px',
                    },
                },
            },
            yaxis: {
                min: 0,
                max: yAxisMax,
                tickAmount: 4,
                labels: {
                    formatter: (value) => Math.round(value).toString(),
                    style: {
                        colors: '#64748B',
                        fontSize: '12px',
                    },
                },
            },
            grid: {
                borderColor: '#E2E8F0',
                strokeDashArray: 0,
                yaxis: { lines: { show: true } },
                xaxis: { lines: { show: false } },
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'left',
                fontSize: '13px',
                markers: {
                    width: 10,
                    height: 10,
                    radius: 12,
                },
            },
            tooltip: {
                y: {
                    formatter: (value) => `${Math.round(value)} attempts`,
                },
            },
        });

        attemptsChart.render();
        charts.push(attemptsChart);
    }

    const statusEl = document.querySelector('#dashboardStatusChart');

    if (statusEl && data.status_distribution) {
        const distribution = data.status_distribution;
        const statusChart = new ApexCharts(statusEl, {
            series: distribution.map((item) => item.count),
            labels: distribution.map((item) => item.label),
            colors: distribution.map((item) => item.color),
            chart: {
                fontFamily: 'Outfit, sans-serif',
                type: 'donut',
                height: 320,
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '68%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                showAlways: true,
                                label: 'Total',
                                fontSize: '14px',
                                fontWeight: 600,
                                color: '#64748B',
                                formatter: (w) => {
                                    const total = w.globals.seriesTotals.reduce((sum, value) => sum + value, 0);

                                    return total.toLocaleString();
                                },
                            },
                        },
                    },
                },
            },
            dataLabels: { enabled: false },
            legend: {
                show: true,
                position: 'right',
                fontSize: '13px',
                formatter: (seriesName, opts) => {
                    const value = opts.w.globals.series[opts.seriesIndex];
                    const total = opts.w.globals.seriesTotals.reduce((sum, item) => sum + item, 0);
                    const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : '0.0';

                    return `${seriesName} ${value.toLocaleString()} (${percentage}%)`;
                },
            },
            stroke: { width: 2, colors: ['#ffffff'] },
            tooltip: {
                y: {
                    formatter: (value) => `${Math.round(value).toLocaleString()} attempts`,
                },
            },
            responsive: [
                {
                    breakpoint: 640,
                    options: {
                        chart: {
                            height: 360,
                        },
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center',
                            itemMargin: {
                                horizontal: 8,
                                vertical: 4,
                            },
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                    },
                                },
                            },
                        },
                    },
                },
            ],
        });

        statusChart.render();
        charts.push(statusChart);
    }

    return charts;
}

export default initDashboardCharts;
