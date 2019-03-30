@if (count($errors) > 0)
    <div class="alert alert-danger" id="alert">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>

    <script type="text/javascript">
        $(document).ready(function ()
        {
            $('#spinner').hide();
            $('#fetch_details').show();
            $('#cheque_details').show();
        });
    </script> 
@endif