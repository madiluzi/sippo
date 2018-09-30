@extends('master')
@section('content')
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Dashboard</span>
            </h2>
        </div>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-4">
                <a href="barang-masuk" class="btn-primary btn-home col-md-12">
                    <i class="fa fa-lg fa-mail-reply col-md-3"></i> Tambah Barang Masuk</a>
                <a href="barang-keluar" class="btn-warning btn-home col-md-12">
                    <i class="fa fa-lg fa-mail-forward col-md-3"></i> Tambah Barang Keluar</a>
            </div>
            <div class="col-md-4">
                <div class="content-top-1">
                    <div class="col-md-6 top-content">
                        <h5>Terjual Bulan Ini</h5>
                        <label>8761</label>
                    </div>
                    <div class="col-md-6 top-content1">
                        <div id="demo-pie-2" class="pie-title-center" data-percent="50"><span
                                    class="pie-value"></span></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content-top-1">
                    <div class="col-md-6 top-content">
                        <h5>Tasks</h5>
                        <label>8761</label>
                    </div>
                    <div class="col-md-6 top-content1">
                        <div id="demo-pie-3" class="pie-title-center" data-percent="30"><span
                                    class="pie-value"></span></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!---->


        <div class="content-mid">
            <div class="col-md-12">
                <div class="content-graph">
                    <div class="content-color">
                        <div class="content-ch"><p><i></i>Chrome </p><span>100%</span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content-ch1"><p><i></i>Safari</p><span> 50%</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--graph-->
                    <link rel="stylesheet" href="css/graph.css">
                    <!--//graph-->
                    <script src="js/jquery.flot.js"></script>
                    <script>
                        $(document).ready(function () {

                            // Graph Data ##############################################
                            var graphData = [{
                                // Visits
                                data: [[6, 1300], [7, 1600], [8, 1900], [9, 2100], [10, 2500], [11, 2200], [12, 2000], [13, 1950], [14, 1900], [15, 2000]],
                                color: '#999999'
                            }, {
                                // Returning Visits
                                data: [[6, 500], [7, 600], [8, 550], [9, 600], [10, 800], [11, 900], [12, 800], [13, 850], [14, 830], [15, 1000]],
                                color: '#999999',
                                points: {radius: 4, fillColor: '#7f8c8d'}
                            }
                            ];

                            // Lines Graph #############################################
                            $.plot($('#graph-lines'), graphData, {
                                series: {
                                    points: {
                                        show: true,
                                        radius: 5
                                    },
                                    lines: {
                                        show: true
                                    },
                                    shadowSize: 0
                                },
                                grid: {
                                    color: '#7f8c8d',
                                    borderColor: 'transparent',
                                    borderWidth: 20,
                                    hoverable: true
                                },
                                xaxis: {
                                    tickColor: 'transparent',
                                    tickDecimals: 2
                                },
                                yaxis: {
                                    tickSize: 1000
                                }
                            });

                            // Bars Graph ##############################################
                            $.plot($('#graph-bars'), graphData, {
                                series: {
                                    bars: {
                                        show: true,
                                        barWidth: .9,
                                        align: 'center'
                                    },
                                    shadowSize: 0
                                },
                                grid: {
                                    color: '#7f8c8d',
                                    borderColor: 'transparent',
                                    borderWidth: 20,
                                    hoverable: true
                                },
                                xaxis: {
                                    tickColor: 'transparent',
                                    tickDecimals: 2
                                },
                                yaxis: {
                                    tickSize: 1000
                                }
                            });

                            // Graph Toggle ############################################
                            $('#graph-bars').hide();

                            $('#lines').on('click', function (e) {
                                $('#bars').removeClass('active');
                                $('#graph-bars').fadeOut();
                                $(this).addClass('active');
                                $('#graph-lines').fadeIn();
                                e.preventDefault();
                            });

                            $('#bars').on('click', function (e) {
                                $('#lines').removeClass('active');
                                $('#graph-lines').fadeOut();
                                $(this).addClass('active');
                                $('#graph-bars').fadeIn().removeClass('hidden');
                                e.preventDefault();
                            });

                            // Tooltip #################################################
                            function showTooltip(x, y, contents) {
                                $('<div id="tooltip">' + contents + '</div>').css({
                                    top: y - 16,
                                    left: x + 20
                                }).appendTo('body').fadeIn();
                            }

                            var previousPoint = null;

                            $('#graph-lines, #graph-bars').bind('plothover', function (event, pos, item) {
                                if (item) {
                                    if (previousPoint != item.dataIndex) {
                                        previousPoint = item.dataIndex;
                                        $('#tooltip').remove();
                                        var x = item.datapoint[0],
                                            y = item.datapoint[1];
                                        showTooltip(item.pageX, item.pageY, y + ' visitors at ' + x + '.00h');
                                    }
                                } else {
                                    $('#tooltip').remove();
                                    previousPoint = null;
                                }
                            });

                        });
                    </script>
                    <div class="graph-container">

                        <div id="graph-lines"></div>
                        <div id="graph-bars"></div>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!----->
        <div class="content-bottom">
            <div class="col-md-6 post-top">
                <div class="post">
                    <form class="text-area">
                        <textarea required=""> What are you doing...</textarea>
                    </form>
                    <div class="post-at">
                        <ul class="icon">


                            <div class="post-file">
                                <i class="fa fa-location-arrow"></i>
                                <input id="input-1" name="input1[]" type="file" multiple="" class="">
                            </div>
                            <div class="post-file">
                                <i class="fa fa-camera"></i>
                                <input id="input-2" name="input2[]" type="file" multiple="" class="">
                            </div>
                            <div class="post-file">
                                <i class="fa fa-video-camera"></i>
                                <input id="input-3" name="input3[]" type="file" multiple="" class="">
                            </div>
                            <div class="post-file">
                                <i class="fa fa-microphone"></i>
                                <input id="input-4" name="input4[]" type="file" multiple="" class="">
                            </div>

                            <script>
                                $(document).on('ready', function () {
                                    $("#input-1").fileinput({showCaption: false});
                                });
                            </script>
                            <script>
                                $(document).on('ready', function () {
                                    $("#input-2").fileinput({showCaption: false});
                                });
                            </script>
                            <script>
                                $(document).on('ready', function () {
                                    $("#input-3").fileinput({showCaption: false});
                                });
                            </script>
                            <script>
                                $(document).on('ready', function () {
                                    $("#input-4").fileinput({showCaption: false});
                                });
                            </script>
                        </ul>
                        <form class="text-sub">
                            <input type="submit" value="post">
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="post-bottom">
                    <div class="post-bottom-1">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <p>15k <label>Likes</label></p>
                    </div>
                    <div class="post-bottom-2">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <p>20M <label>Followers</label></p>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="weather">
                    <div class="weather-top">
                        <div class="weather-top-left">
                            <div class="degree">
                                <figure class="icons">
                                    <canvas id="partly-cloudy-day" width="64" height="64">
                                    </canvas>
                                </figure>
                                <span>37°</span>
                                <div class="clearfix"></div>
                            </div>
                            <script>
                                var icons = new Skycons({"color": "#1ABC9C"}),
                                    list = [
                                        "clear-night", "partly-cloudy-day",
                                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                        "fog"
                                    ],
                                    i;

                                for (i = list.length; i--;)
                                    icons.set(list[i], list[i]);

                                icons.play();
                            </script>
                            <p>FRIDAY
                                <label>13</label>
                                <sup>th</sup>
                                AUG
                            </p>
                        </div>
                        <div class="weather-top-right">
                            <p><i class="fa fa-map-marker"></i>lorem ipsum</p>
                            <label>lorem ipsum</label>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="weather-bottom">
                        <div class="weather-bottom1">
                            <div class="weather-head">
                                <h4>Cloudy</h4>
                                <figure class="icons">
                                    <canvas id="cloudy" width="58" height="58"></canvas>
                                </figure>
                                <script>
                                    var icons = new Skycons({"color": "#999"}),
                                        list = [
                                            "clear-night", "cloudy",
                                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                            "fog"
                                        ],
                                        i;

                                    for (i = list.length; i--;)
                                        icons.set(list[i], list[i]);

                                    icons.play();
                                </script>
                                <h6>20°</h6>
                                <div class="bottom-head">
                                    <p>August 16</p>
                                    <p>Monday</p>
                                </div>
                            </div>
                        </div>
                        <div class="weather-bottom1 ">
                            <div class="weather-head">
                                <h4>Sunny</h4>
                                <figure class="icons">
                                    <canvas id="clear-day" width="58" height="58">
                                    </canvas>
                                </figure>
                                <script>
                                    var icons = new Skycons({"color": "#999"}),
                                        list = [
                                            "clear-night", "clear-day",
                                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                            "fog"
                                        ],
                                        i;

                                    for (i = list.length; i--;)
                                        icons.set(list[i], list[i]);

                                    icons.play();
                                </script>
                                <h6>37°</h6>
                                <div class="bottom-head">
                                    <p>August 17</p>
                                    <p>Tuesday</p>
                                </div>
                            </div>
                        </div>
                        <div class="weather-bottom1">
                            <div class="weather-head">
                                <h4>Rainy</h4>
                                <figure class="icons">
                                    <canvas id="sleet" width="58" height="58">
                                    </canvas>
                                </figure>
                                <script>
                                    var icons = new Skycons({"color": "#999"}),
                                        list = [
                                            "clear-night", "clear-day",
                                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                            "fog"
                                        ],
                                        i;

                                    for (i = list.length; i--;)
                                        icons.set(list[i], list[i]);

                                    icons.play();
                                </script>

                                <h6>7°</h6>
                                <div class="bottom-head">
                                    <p>August 18</p>
                                    <p>Wednesday</p>
                                </div>
                            </div>
                        </div>
                        <div class="weather-bottom1 ">
                            <div class="weather-head">
                                <h4>Snowy</h4>
                                <figure class="icons">
                                    <canvas id="snow" width="58" height="58">
                                    </canvas>
                                </figure>
                                <script>
                                    var icons = new Skycons({"color": "#999"}),
                                        list = [
                                            "clear-night", "clear-day",
                                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                            "fog"
                                        ],
                                        i;

                                    for (i = list.length; i--;)
                                        icons.set(list[i], list[i]);

                                    icons.play();
                                </script>
                                <h6>-10°</h6>
                                <div class="bottom-head">
                                    <p>August 16</p>
                                    <p>Thursday</p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--//content-->


        <!---->
        <div class="copy">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/"
                                                                        target="_blank">W3layouts</a></p>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection