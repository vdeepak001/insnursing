import ApexCharts from 'apexcharts';

export function initTestAttemptsCharts() {
    const configEl = document.getElementById('test-attempts-chart-data');

    if (!configEl) {
        return;
    }

    const data = JSON.parse(configEl.textContent || '{}');
    const chartEl = document.querySelector('#testAttemptsModuleChart');

    if (!chartEl || !data.categories?.length) {
        return;
    }

    const isGrouped = data.chart_mode === 'grouped';

    const options = isGrouped
        ? {
              series: data.series ?? [],
              colors: ['#3B82F6', '#6366F1', '#10B981'],
              chart: {
                  fontFamily: 'Outfit, sans-serif',
                  type: 'bar',
                  height: 360,
                  toolbar: { show: false },
              },
              plotOptions: {
                  bar: {
                      horizontal: false,
                      columnWidth: '55%',
                      borderRadius: 6,
                      borderRadiusApplication: 'end',
                  },
              },
              dataLabels: {
                  enabled: true,
                  formatter: (value) => `${Math.round(value)}%`,
                  style: { fontSize: '10px', fontWeight: 600 },
              },
              stroke: { show: true, width: 2, colors: ['transparent'] },
              xaxis: {
                  categories: data.categories ?? [],
                  labels: {
                      rotate: -35,
                      style: { fontSize: '11px' },
                  },
              },
              yaxis: {
                  max: 100,
                  labels: {
                      formatter: (value) => `${Math.round(value)}%`,
                  },
              },
              legend: {
                  show: true,
                  position: 'top',
                  horizontalAlign: 'left',
              },
              grid: {
                  yaxis: { lines: { show: true } },
                  xaxis: { lines: { show: false } },
              },
              tooltip: {
                  y: {
                      formatter: (value) => `${Math.round(value)}% completion`,
                  },
              },
          }
        : {
              series: data.series ?? [],
              colors: ['#F97316'],
              chart: {
                  fontFamily: 'Outfit, sans-serif',
                  type: 'bar',
                  height: Math.max(280, (data.categories?.length ?? 0) * 36),
                  toolbar: { show: false },
              },
              plotOptions: {
                  bar: {
                      horizontal: true,
                      borderRadius: 6,
                      barHeight: '68%',
                      dataLabels: { position: 'top' },
                  },
              },
              dataLabels: {
                  enabled: true,
                  formatter: (value) => `${Math.round(value)}%`,
                  offsetX: 28,
                  style: {
                      fontSize: '11px',
                      fontWeight: 600,
                      colors: ['#334155'],
                  },
              },
              xaxis: {
                  categories: data.categories ?? [],
                  max: 100,
                  labels: {
                      formatter: (value) => `${Math.round(value)}%`,
                  },
              },
              yaxis: {
                  labels: {
                      maxWidth: 220,
                      style: { fontSize: '12px' },
                  },
              },
              grid: {
                  xaxis: { lines: { show: true } },
                  yaxis: { lines: { show: false } },
              },
              tooltip: {
                  y: {
                      formatter: (value, { dataPointIndex }) => {
                          const attempts = data.totals?.[dataPointIndex] ?? 0;

                          return `${Math.round(value)}% completion (${attempts} attempts)`;
                      },
                  },
              },
          };

    const chart = new ApexCharts(chartEl, options);
    chart.render();

    return chart;
}

export default initTestAttemptsCharts;
