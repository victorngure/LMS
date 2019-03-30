        <script src="{{ asset('public/js/jquery.min.js') }}"></script>

        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('//cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js') }}"></script>

        <script src="{{ asset('public/js/sb-admin-2.js') }}"></script>

        <script src="{{ asset('public/js/metisMenu.min.js') }}"></script>

        <script src="{{ asset('//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}"></script>

        <script src="{{ asset('//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('https://app.dineandgift.com/plugins/daterangepicker/daterangepicker.js') }}"></script>

        <script type="{{ asset('text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.27/daterangepicker.js') }}"></script>

        <script src="{{ asset('//rawgit.com/schmich/instascan-builds/master/instascan.min.js') }}"></script>

        <script src="{{ asset('//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js') }}"></script>

        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{ asset('//cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/js/mdb.min.js') }}"></script>

        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{ asset('//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js') }}"></script>

        {{-- datatables --}}
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

        {{-- add selectize to permissions and roles form input --}}
        <script>
            $(function() {
                $('#permissions').selectize();
                $('.roles').selectize();
          });
        </script>
        
        {{-- set timeout to alert  --}}
        <script>
            window.setTimeout(function() {
                $("#alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 3500);
        </script>

        {{--select all radio buttons --}}
        <script>
            $(".checkAll").click(function(e) 
            {
                var checkId = $(this).attr('id');
                if($(this).is(':checked'))
                {
                    checkRadios(checkId);
                }
                else 
                {
                    unCheckRadio(checkId);
                }
            });            
            function checkRadios(checkId) {
                $(".radio").each(function(e){
                    var radId = $(this).attr('id');
                    if(radId == checkId)
                    {
                        $(this).prop("checked", true);
                    }            
                });
            }
            function unCheckRadio(checkId) {
                $(".radio").each(function(e){
                    var radId = $(this).attr('id');
                    if(radId == checkId)
                    {
                        $(this).prop("checked", false);
                    }            
                });
            }
        </script>
        
        {{-- Approve toggle --}}
        <script>
            $(function() {
                $('.approve_button').attr('disabled', true);
                $('.approve_toggle').change(function() {
                    if(this.checked) {
                        $('.approve_button').attr('disabled', false);
                    }
                    else 
                    {
                        $('.approve_button').attr('disabled', true);
                    }
                });
            })
        </script>

        {{-- Date picker no past dates --}}
        <script type="text/javascript">
            $(function(){
                var dtToday = new Date();                
                var month = dtToday.getMonth() + 1;
                var day = dtToday.getDate();
                var year = dtToday.getFullYear();
                if(month < 10)
                    month = '0' + month.toString();
                if(day < 10)
                    day = '0' + day.toString();
                
                var minDate = year + '-' + month + '-' + day;
                $('.datepickerMin').attr('min', minDate);
            });
        </script>