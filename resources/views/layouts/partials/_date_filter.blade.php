{{-- Cheque Creation Date Filter --}}
<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            var start = moment().subtract(29, 'days');
            var end = moment();
            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
            cb(start, end);
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
            var start = picker.startDate;
            var end = picker.endDate;
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = start;
                    var max = end;
                    var startDate = new Date(data[10]);                
                    if (min == null && max == null) {
                    return true;
                    }
                    if (min == null && startDate <= max) {
                    return true;
                    }
                    if (max == null && startDate >= min) {
                    return true;
                    }
                    if (startDate <= max && startDate >= min) {
                    return true;
                    }
                    return false;
                }
            );
        table.draw();
        $.fn.dataTable.ext.search.pop();
        });
        var table = $('#datatable').DataTable({
            responsive: true
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            var start = moment().subtract(29, 'days');
            var end = moment();
            function cb(start, end) {
                $('#bounced_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            $('#bounced_range').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
            cb(start, end);
        });
        $('#bounced_range').on('apply.daterangepicker', function(ev, picker) {
            var start = picker.startDate;
            var end = picker.endDate;
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = start;
                    var max = end;
                    var startDate = new Date(data[10]);                
                    if (min == null && max == null) {
                    return true;
                    }
                    if (min == null && startDate <= max) {
                    return true;
                    }
                    if (max == null && startDate >= min) {
                    return true;
                    }
                    if (startDate <= max && startDate >= min) {
                    return true;
                    }
                    return false;
                }
            );
        table.draw();
        $.fn.dataTable.ext.search.pop();
        });
        var table = $('#bounced_table').DataTable({
            responsive: true
        });
    });
</script>

{{-- Cheque Hold Date Filter --}}
<script type="text/javascript">
    window.onload = function () {
        $(document).ready(function () {
            $(function () {
                var start = moment().subtract(29, 'days');
                var end = moment();
                function cb(start, end) {
                    $('#cheques_held span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                $('#cheques_held').daterangepicker({
                    startDate: start,
                    endDate: end,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                }, cb);
                cb(start, end);
            });
            $('#cheques_held').on('apply.daterangepicker', function (ev, picker) {
                var start = picker.startDate;
                var end = picker.endDate;
                $.fn.dataTable.ext.search.push(
                    function (settings, data, dataIndex) {
                        var min = start;
                        var max = end;
                        var startDate = new Date(data[9]);
                        if (min == null && max == null) {
                            return true;
                        }
                        if (min == null && startDate <= max) {
                            return true;
                        }
                        if (max == null && startDate >= min) {
                            return true;
                        }
                        if (startDate <= max && startDate >= min) {
                            return true;
                        }
                        return false;
                    }
                );
                table.draw();
                $.fn.dataTable.ext.search.pop();
            });
            var table =$('.cheques_held').DataTable({
                "order": [
                    [1, "desc"]
                ],
                responsive: true
            });
        });
    }
</script>

{{-- Cheque Cleared Date Filter --}}
<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            var start = moment().subtract(29, 'days');
            var end = moment();
            function cb(start, end) {
                $('#cleared_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            $('#cleared_range').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
            cb(start, end);
        });
        $('#cleared_range').on('apply.daterangepicker', function(ev, picker) {
            var start = picker.startDate;
            var end = picker.endDate;
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = start;
                    var max = end;
                    var startDate = new Date(data[9]);                
                    if (min == null && max == null) {
                    return true;
                    }
                    if (min == null && startDate <= max) {
                    return true;
                    }
                    if (max == null && startDate >= min) {
                    return true;
                    }
                    if (startDate <= max && startDate >= min) {
                    return true;
                    }
                    return false;
                }
            );
        table.draw();
        $.fn.dataTable.ext.search.pop();
        });
        var table = $('#cleared_table').DataTable({
            responsive: true
        });
    });
</script>