<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 11/10/2018
 * Time: 5:17 PM
 */
?>
<div class="clear"></div>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Today</p>
                            <h3 class="card-title"><?php echo $visits_today; ?>
                                <small>users</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">warning</i>
                                <a ><b>Last week</b> <?php echo $visits_last_week; ?> Visits</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Visits statistics</h4>
                        </div>
                        <div class="card-body">
                            <script type="text/javascript">
                                $(function () {
                                    var chart;
                                    $(document).ready(function () {
                                        Highcharts.setOptions({
                                            colors: ['#32353A']
                                        });
                                        chart = new Highcharts.Chart({
                                            chart: {
                                                renderTo: 'container',
                                                type: 'column',
                                                margin: [50, 30, 80, 60]
                                            },
                                            title: {
                                                text: 'Visits Today: <?php echo date('d-m-Y'); ?>'
                                            },
                                            xAxis: {
                                                categories: [
                                                    <?php
                                                    $i = 1;
                                                    $count = count($chart_data_today);
                                                    foreach ($chart_data_today as $data) {
                                                        if ($i == $count) {
                                                            echo "'" . $data->hour . "'";
                                                        } else {
                                                            echo "'" . $data->hour . "',";
                                                        }
                                                        $i++;
                                                    }
                                                    ?>
                                                ],
                                                labels: {
                                                    rotation: -45,
                                                    align: 'right',
                                                    style: {
                                                        fontSize: '9px',
                                                        fontFamily: 'Tahoma, Verdana, sans-serif'
                                                    }
                                                }
                                            },
                                            yAxis: {
                                                min: 0,
                                                title: {
                                                    text: 'Visits'
                                                }
                                            },
                                            legend: {
                                                enabled: false
                                            },
                                            tooltip: {
                                                formatter: function () {
                                                    return '<b>' + this.x + '</b><br/>' +
                                                        'Visits: ' + Highcharts.numberFormat(this.y, 0);
                                                }
                                            },
                                            series: [{
                                                name: 'Visits',
                                                data: [
                                                    <?php
                                                    $i = 1;
                                                    $count = count($chart_data_today);
                                                    foreach ($chart_data_today as $data) {
                                                        if ($i == $count) {
                                                            echo $data->visits;
                                                        } else {
                                                            echo $data->visits . ",";
                                                        }
                                                        $i++;
                                                    }
                                                    ?>
                                                ],
                                                dataLabels: {
                                                    enabled: false,
                                                    rotation: 0,
                                                    color: '#F07E01',
                                                    align: 'right',
                                                    x: -3,
                                                    y: 20,
                                                    formatter: function () {
                                                        return this.y;
                                                    },
                                                    style: {
                                                        fontSize: '11px',
                                                        fontFamily: 'Verdana, sans-serif'
                                                    }
                                                },
                                                pointWidth: 20
                                            }]
                                        });
                                    });
                                });
                            </script>
                            <div id="container" style="min-width: 300px; height: 180px; margin: 0 auto"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Check Visits statistics</h4>
                        </div>
                        <div class="card-body" style="height: 460px">
                            <div style="float: right;margin: -4px 20px 0 5px;">
                                <form id="select_month_year" style="margin: 0;padding: 0;" method="post">
                                    <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                                    <?php echo $this->site_config->generate_months() . '&nbsp;&nbsp;' . $this->site_config->generate_years(); ?>
                                    <input type="button" name="submit" id="chart_submit_btn" value="Get Data"/>
                                </form>
                            </div>
                            <div id="month_year_container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <script type="text/javascript">
        $(function () {
            var chart;
            $(document).ready(function () {
                Highcharts.setOptions({
                    colors: ['#32353A']
                });
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'month_year_container',
                        type: 'column',
                        margin: [50, 30, 80, 60]
                    },
                    title: {
                        text: 'Visits'
                    },
                    xAxis: {
                        categories: [
                            <?php
                            $i = 1;
                            $count = count($chart_data_curr_month);
                            foreach ($chart_data_curr_month as $data) {
                                if ($i == $count) {
                                    echo "'" . $data->day . "'";
                                } else {
                                    echo "'" . $data->day . "',";
                                }
                                $i++;
                            }
                            ?>
                        ],
                        labels: {
                            rotation: -45,
                            align: 'right',
                            style: {
                                fontSize: '9px',
                                fontFamily: 'Tahoma, Verdana, sans-serif'
                            }
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Visits'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.x + '</b><br/>' +
                                'Visits: ' + Highcharts.numberFormat(this.y, 0);
                        }
                    },
                    series: [{
                        name: 'Visits',
                        data: [
                            <?php
                            $i = 1;
                            $count = count($chart_data_curr_month);
                            foreach ($chart_data_curr_month as $data) {
                                if ($i == $count) {
                                    echo $data->visits;
                                } else {
                                    echo $data->visits . ",";
                                }
                                $i++;
                            }
                            ?>
                        ],
                        dataLabels: {
                            enabled: false,
                            rotation: 0,
                            color: '#F07E01',
                            align: 'right',
                            x: -3,
                            y: 20,
                            formatter: function () {
                                return this.y;
                            },
                            style: {
                                fontSize: '11px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        },
                        pointWidth: 20
                    }]
                });
            });
        });
    </script>
    <script type="text/javascript">
        $("#chart_submit_btn").click(function (e) {
            // get the token value
            var cct = $("input[name=csrf_token_name]").val();
            //reset #container
            $('#month_year_container').html('');
            $.ajax({
                //url: "http://localhost/kwena/kwena/visitors/get_chart_data", //The url where the server req would we made.
                url: <?php echo base_url("visitors/get_chart_data")?>, //The url where the server req would we made.
                //async: false,
                type: "POST", //The type which you want to use: GET/POST
                data: $('#select_month_year').serialize(), //The variables which are going.
                dataType: "html", //Return data type (what we expect).
                csrf_token_name: cct,
                success: function (response) {
                    if (response.toLowerCase().indexOf("no data found") >= 0) {
                        $('#month_year_container').html(response);
                    } else {
                        //build the chart
                        var tsv = response.split(/n/g);
                        var count = tsv.length - 1;
                        var cats_val = new Array();
                        var visits_val = new Array();
                        for (i = 0; i < count; i++) {
                            var line = tsv[i].split(/t/);
                            var line_data = line.toString().split(",");
                            var date = line_data[0];
                            var visits = line_data[1];
                            cats_val[i] = date;
                            visits_val[i] = parseInt(visits);
                        }
                        var _categories = cats_val;
                        var _data = visits_val;
                        var chart;
                        $(document).ready(function () {
                            Highcharts.setOptions({
                                colors: ['#32353A']
                            });
                            chart = new Highcharts.Chart({
                                chart: {
                                    renderTo: 'month_year_container',
                                    type: 'column',
                                    margin: [50, 30, 80, 60]
                                },
                                title: {
                                    text: 'Visits'
                                },
                                xAxis: {
                                    categories: _categories,
                                    labels: {
                                        rotation: -45,
                                        align: 'right',
                                        style: {
                                            fontSize: '9px',
                                            fontFamily: 'Tahoma, Verdana, sans-serif'
                                        }
                                    }
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'Visits'
                                    }
                                },
                                legend: {
                                    enabled: false
                                },
                                tooltip: {
                                    formatter: function () {
                                        return '<b>' + this.x + '</b><br/>' +
                                            'Visits: ' + Highcharts.numberFormat(this.y, 0);
                                    }
                                },
                                series: [{
                                    name: 'Visits',
                                    data: _data,
                                    dataLabels: {
                                        enabled: false,
                                        rotation: 0,
                                        color: '#F07E01',
                                        align: 'right',
                                        x: -3,
                                        y: 20,
                                        formatter: function () {
                                            return this.y;
                                        },
                                        style: {
                                            fontSize: '11px',
                                            fontFamily: 'Verdana, sans-serif'
                                        }
                                    },
                                    pointWidth: 20
                                }]
                            });
                        });
                    }
                }
            });
        });
    </script>
</div>
</body>
</html>
