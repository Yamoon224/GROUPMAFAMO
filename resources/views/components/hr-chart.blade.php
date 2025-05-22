<script>
    var hr = document.getElementById('hrchart');
    var hrchart = echarts.init(hr);
    hrchart.setOption({
        tooltip: { trigger: 'item', formatter: '{a} <br/>{b}: {c} ({d}%)' },
        legend: {
            data: [
                'CDI',
                'CDD',
                'Vacataire(s)',
                'Congé',
                'Licencement',
                'Suspension',
            ]
        },
        series: [
            {
                name: 'Employé(es)',
                type: 'pie',
                selectedMode: 'single',
                radius: [0, '30%'],
                label: { position: 'inner', fontSize: 12 },
                labelLine: { show: false },
                data: [
                    { value: 1548, name: 'Congé' },
                    { value: 775, name: 'Suspension' },
                    { value: 679, name: 'Licencement', selected: true }
                ]
            },
            {
                name: 'Employé(es)',
                type: 'pie',
                radius: ['45%', '60%'],
                labelLine: { length: 40 },
                label: {
                    formatter: '{a|{a}}{abg|}\n{hr|}\n  {b|{b}：}{c}  {per|{d}%}  ',
                    backgroundColor: '#F6F8FC',
                    borderColor: '#8C8D8E',
                    borderWidth: 1,
                    borderRadius: 4,
                    fontSize: 10,
                    rich: {
                        a: {
                            color: '#6E7079',
                            lineHeight: 18,
                            align: 'center'
                        },
                        hr: {
                            borderColor: '#8C8D8E',
                            width: '100%',
                            borderWidth: 1,
                            height: 0
                        },
                        b: {
                            color: '#4C5058',
                            fontSize: 14,
                            fontWeight: 'bold',
                            lineHeight: 28
                        },
                        per: {
                            color: '#fff',
                            backgroundColor: '#4C5058',
                            padding: [3, 4],
                            borderRadius: 4
                        }
                    }
                },
                data: [
                    { value: {{ $employees->where('contracttype', 'CDI')->count() }}, name: 'CDI' },
                    { value: {{ $employees->where('contracttype', 'CDD')->count() }}, name: 'CDD' },
                    { value: {{ $employees->where('contracttype', 'STAGE')->count() }}, name: 'Vacataire(s)' },
                ]
            }
        ]
    });
</script>