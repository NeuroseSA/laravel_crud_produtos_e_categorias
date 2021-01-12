<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" >
    <title>Cadastro de Produtos</title>
    <style>
        body{
            padding: 20px;
        }

        .navbar{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        @component('component.navbar', ["currentRoute" => $currentRoute])
            
        @endcomponent
        <main role="main">

            @hasSection ('body')
                @yield('body')                          
            @endif

        </main>
    </div>


<script src="{{asset('js/app.js')}}" type="text/javascript"></script>

@hasSection ('javascript')
    @yield('javascript')  
@endif

</body>
</html>