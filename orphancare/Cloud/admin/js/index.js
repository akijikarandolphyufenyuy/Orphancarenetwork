// side bar toggle 

var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

    function openSidebar() {
        if(!sidebarOpen) {
            sidebar.classList.add("sidebar-responsive");
            sidebarOpen = true;
        }
    }

    function closeSidebar() {
        if(sidebarOpen) {
            sidebar.classList.remove("sidebar-responsive");  
            sidebarOpen = false;
        }
    }

    // ----Charts ----
    // bar chart for top 5 hospitals

        var barChartOption = {
            series: [{
                // just for user test, php code here for taking the information from the database.
                    data: [4.8, 4.5, 3.7, 3.5, 3.2, 3.0]
                }],
            chart: {
                    type: 'bar',
                    height: '350',
                    toolbar: {
                        show: false
                    } ,
                },
            colors: [
                    "#246dec",
                    "cc3c43",
                    "#367952",
                    "#f5b74f",
                    "#4f35al",
                    "teal"
                ],
            plotOptions: {
                    bar: {
                        distributed: true,
                        borderRatings: 4,
                        horizontal: false,
                        columnwidth: '48',

                    }
                },
            datalabels: {
                enabled: false
            },
            legend: {
                show: false
            }
            xaxis: {
                categories: ['GRA Buea', 'Regional Hospital Buea', 'Mount Mary Buea', 'Solidarity Healthcare Buea', 'Great Soppo', 'Mount Mary'],
            },
            yaxis: {
                title: {
                    text: 'Count'
                }
            }
        };

        var barChart = new ApexChart(document.querySelector('#bar-chart'), barChartOption);
        barChart.render();
