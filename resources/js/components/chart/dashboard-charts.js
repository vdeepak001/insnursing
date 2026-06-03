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
        const attemptsChart = new ApexCharts(attemptsEl, {
            series: overview.series ?? [],
            colors: ['#F97316', '#465FFF', '#10B981'],
            chart: {
                fontFamily: 'Outfit, sans-serif',
                type: 'bar',
                height: 320,
                toolbar: { show: false },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '45%',
                    borderRadius: 8,
                    borderRadiusApplication: 'end',
                },
            },
            dataLabels: { enabled: false },
            stroke: { show: true, width: 2, colors: ['transparent'] },
            xaxis: {
                categories: overview.categories ?? [],
                axisBorder: { show: false },
                axisTicks: { show: false },
            },
            yaxis: {
                labels: {
                    formatter: (value) => Math.round(value).toString(),
                },
            },
            grid: {
                yaxis: { lines: { show: true } },
                xaxis: { lines: { show: false } },
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'left',
            },
            fill: { opacity: 1 },
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
            colors: ['#6366F1', '#10B981', '#EF4444'],
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
                                label: 'Attempts',
                                fontSize: '14px',
                                fontWeight: 600,
                                color: '#64748B',
                            },
                        },
                    },
                },
            },
            dataLabels: { enabled: false },
            legend: {
                show: true,
                position: 'bottom',
            },
            stroke: { width: 0 },
            tooltip: {
                y: {
                    formatter: (value) => `${Math.round(value)} attempts`,
                },
            },
        });

        statusChart.render();
        charts.push(statusChart);
    }

    return charts;
}

export default initDashboardCharts;
