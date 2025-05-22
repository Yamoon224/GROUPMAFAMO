<script>
    var account = document.getElementById('accountchart');
    var accountchart = echarts.init(account);
    accountchart.setOption({
        legend: {},
        tooltip: {},
        dataset: {
            source: [
                ['product', 'Total', 'Reglé(s)', 'Restant(s)'],
                ['Facture(s)', {{ $quotations->sum('cost') }}, {{ $billings->sum('amount') }}, {{ $quotations->sum('cost') - $billings->sum('amount') }}],
                ['Salaire(s)', {{ $employees->where('hastopay', true)->sum('net') }}, {{ $payments->sum('amount') }}, {{ $employees->where('hastopay', true)->sum('net') - $payments->sum('amount') }}],
            ]
        },
        xAxis: { type: 'category' },
        yAxis: {},
        series: [{ type: 'bar' }, { type: 'bar' }, { type: 'bar' }]
    });
</script>