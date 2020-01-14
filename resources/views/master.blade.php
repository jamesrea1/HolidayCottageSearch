<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
    <title>Holiday Cottages</title>
</head>
<body>
    <div class="container sykes">
        <div class="row">
            <div class="col">
                <header><h1>Holiday Cottages</h1></header>
            </div>
        </div>
        <div class="row">
            @yield('content')
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>  
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script>
        $('.sy-date').datepicker({
            format: 'dd-mm-yyyy'
            , autoHide: true
        });
    </script>
</body>
</html>