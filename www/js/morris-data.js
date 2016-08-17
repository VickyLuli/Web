$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            Entradas: 2666,
            Tragos: null,
            Publicidad: 2647
        }, {
            period: '2010 Q2',
            Entradas: 2778,
            Tragos: 2294,
            Publicidad: 2441
        }, {
            period: '2010 Q3',
            Entradas: 4912,
            Tragos: 1969,
            Publicidad: 2501
        }, {
            period: '2010 Q4',
            Entradas: 3767,
            Tragos: 3597,
            Publicidad: 5689
        }, {
            period: '2011 Q1',
            Entradas: 6810,
            Tragos: 1914,
            Publicidad: 2293
        }, {
            period: '2011 Q2',
            Entradas: 5670,
            Tragos: 4293,
            Publicidad: 1881
        }, {
            period: '2011 Q3',
            Entradas: 4820,
            Tragos: 3795,
            Publicidad: 1588
        }, {
            period: '2011 Q4',
            Entradas: 15073,
            Tragos: 5967,
            Publicidad: 5175
        }, {
            period: '2012 Q1',
            Entradas: 10687,
            Tragos: 4460,
            Publicidad: 2028
        }, {
            period: '2012 Q2',
            Entradas: 8432,
            Tragos: 5713,
            Publicidad: 1791
        }],
        xkey: 'period',
        ykeys: ['Entradas', 'Tragos', 'Publicidad'],
        labels: ['Entradas', 'Tragos', 'Publicidad'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });

});
