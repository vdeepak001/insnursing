import ApexCharts from 'apexcharts';

const chartTargets = [
    { key: 'pretest', elementId: 'resultsChartPretest' },
    { key: 'mock', elementId: 'resultsChartMock' },
    { key: 'final_1', elementId: 'resultsChartFinal1' },
    { key: 'final_2', elementId: 'resultsChartFinal2' },
];

const formatPercent = (value) => {
    const rounded = Math.round(value * 10) / 10;

    return Number.isInteger(rounded) ? String(rounded) : rounded.toFixed(1);
};

export function initResultsCharts() {
    const configEl = document.getElementById('results-chart-data');

    if (!configEl) {
        return;
    }

    const data = JSON.parse(configEl.textContent || '{}');
    const charts = [];

    chartTargets.forEach(({ key, elementId }) => {
        const chartEl = document.querySelector(`#${elementId}`);
        const bucket = data[key];

        if (!chartEl || !bucket) {
            return;
        }

        const completed = bucket.completed ?? 0;
        const notCompleted = bucket.not_completed ?? 0;
        const total = completed + notCompleted;

        if (total === 0) {
            chartEl.innerHTML = '<p class="py-16 text-center text-sm text-gray-500">No data</p>';

            return;
        }

        const chart = new ApexCharts(chartEl, {
            series: [completed, notCompleted],
            labels: ['Completed', 'Not Completed'],
            colors: ['#0F766E', '#FF7A00'],
            chart: {
                fontFamily: 'Outfit, sans-serif',
                type: 'donut',
                height: 260,
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '68%',
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontSize: '13px',
                                fontWeight: 600,
                                color: '#64748B',
                                offsetY: -10
                            },
                            value: {
                                show: true,
                                fontSize: '20px',
                                fontWeight: 'bold',
                                color: '#1E293B',
                                offsetY: 4,
                                formatter: (val) => `${parseFloat(val).toFixed(1)}%`,
                            },
                            total: {
                                show: true,
                                showAlways: true,
                                label: 'Completed',
                                fontSize: '13px',
                                fontWeight: 600,
                                color: '#64748B',
                                formatter: () => `${bucket.completed_percentage ?? 0}%`,
                            },
                        },
                    },
                },
            },
            dataLabels: { enabled: false },
            legend: {
                show: true,
                position: 'bottom',
                fontSize: '12px',
                formatter: (seriesName, opts) => {
                    const value = opts.w.globals.series[opts.seriesIndex];
                    const percentage = total > 0 ? formatPercent((value / total) * 100) : '0';

                    return `${seriesName} ${percentage}%`;
                },
            },
            stroke: { width: 2, colors: ['#ffffff'] },
            tooltip: {
                enabled: true,
                fillSeriesColor: false,
                custom: ({ series, seriesIndex, w }) => {
                    const label = w.globals.labels[seriesIndex];
                    const value = series[seriesIndex];

                    return (
                        '<div style="padding:10px 14px;background:#0F172A;color:#FFFFFF;border-radius:8px;font-family:Outfit,sans-serif;font-size:13px;font-weight:500;line-height:1.4;box-shadow:0 4px 12px rgba(15,23,42,0.25);">' +
                        `<span style="color:#FFFFFF;">${label}: </span>` +
                        `<strong style="color:#FFFFFF;">${Math.round(value).toLocaleString()} learners</strong>` +
                        '</div>'
                    );
                },
            },
        });

        chart.render();
        charts.push(chart);
    });

    return charts;
}

export default initResultsCharts;
