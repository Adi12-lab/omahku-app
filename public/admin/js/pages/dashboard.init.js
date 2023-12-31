!(function (e) {
    "use strict";
    function a() {}
    (a.prototype.createAreaChart = function (e, a, r, o, t, i, b, l) {
        Morris.Area({
            element: e,
            pointSize: 3,
            lineWidth: 1,
            data: o,
            xkey: t,
            ykeys: i,
            labels: b,
            resize: !0,
            gridLineColor: "rgba(108, 120, 151, 0.1)",
            hideHover: "auto",
            lineColors: l,
        });
    }),
        (a.prototype.createBarChart = function (e, a, r, o, t, i) {
            Morris.Bar({
                element: e,
                data: a,
                xkey: r,
                ykeys: o,
                labels: t,
                gridLineColor: "rgba(108, 120, 151, 0.1)",
                barSizeRatio: 0.4,
                resize: !0,
                hideHover: "auto",
                barColors: i,
            });
        }),
        (a.prototype.createDonutChart = function (e, a, r) {
            Morris.Donut({
                element: e,
                data: a,
                resize: !0,
                colors: r,
                gridLineColor: "rgba(108, 120, 151, 0.1)",
                labelColor: "#fff",
            });
        }),
        (a.prototype.init = function () {
            this.createAreaChart(
                "morris-area-example",
                0,
                0,
                [
                    { y: "2009", a: 10, b: 20 },
                    { y: "2010", a: 75, b: 65 },
                    { y: "2011", a: 50, b: 40 },
                    { y: "2012", a: 75, b: 65 },
                    { y: "2013", a: 50, b: 40 },
                    { y: "2014", a: 75, b: 65 },
                    { y: "2015", a: 90, b: 60 },
                    { y: "2016", a: 90, b: 75 },
                ],
                "y",
                ["a", "b"],
                ["Series A", "Series B"],
                ["#00a3ff", "#04a2b3"]
            );
            this.createBarChart(
                "morris-bar-example",
                [
                    { y: "2009", a: 100, b: 90 },
                    { y: "2010", a: 75, b: 65 },
                    { y: "2011", a: 50, b: 40 },
                    { y: "2012", a: 75, b: 65 },
                    { y: "2013", a: 50, b: 40 },
                    { y: "2014", a: 75, b: 65 },
                    { y: "2015", a: 100, b: 90 },
                    { y: "2016", a: 90, b: 75 },
                ],
                "y",
                ["a", "b"],
                ["Series A", "Series B"],
                ["#04a2b3", "#00a3ff"]
            );
            this.createDonutChart(
                "morris-donut-example",
                [
                    { label: "Download Sales", value: 12 },
                    { label: "In-Store Sales", value: 30 },
                    { label: "Mail-Order Sales", value: 20 },
                ],
                ["#dcdcdc", "#e66060", "#04a2b3"]
            );
        }),
        (e.Dashboard = new a()),
        (e.Dashboard.Constructor = a);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.Dashboard.init();
    })();
