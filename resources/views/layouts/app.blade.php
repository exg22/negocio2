<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="../../../public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '< Ant',
                nextText: 'Sig >',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $( "#datepicker" ).datepicker({
                appendText: "(dd-mm-yyyy)",
            });
            $( "#datepicker2" ).datepicker({
                appendText: "(dd-mm-yyyy)",
            });
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function(){

            var counter = 2;

            $("#addProduct").click(function () {

                if(counter>10){
                    alert("Only 10 textboxes allow");
                    return false;
                }

                var contenedorCentral = document.createElement("div");
                contenedorCentral.className='form-group';

                var etiqueta = document.createElement('label');
                etiqueta.className='col-md-4 control-label';
                var tituloEtiqueta = document.createTextNode('Productos');
                etiqueta.appendChild(tituloEtiqueta);
                contenedorCentral.appendChild(etiqueta);




                var contenedorSecundario = document.createElement("div");

                contenedorSecundario.setAttribute('class','col-md-6');

                var cajaTexto1 = document.createElement('input')
                cajaTexto1.setAttribute('class','form-control');
                cajaTexto1.setAttribute('placeholder','Ingrese el Codigo del Producto');
                cajaTexto1.setAttribute('name','products[]');

                var cajaTexto2 = document.createElement('input');
                cajaTexto2.setAttribute('class','form-control');
                cajaTexto2.setAttribute('placeholder','Ingrese la cantidad comprada del Producto');
                cajaTexto2.setAttribute('name','cantidad[]');

                contenedorSecundario.appendChild(cajaTexto1);
                contenedorSecundario.appendChild(cajaTexto2);

                contenedorCentral.appendChild(contenedorSecundario);


                document.getElementById('listadop').appendChild(contenedorCentral);
                //contenedorSecundario.appendTo(".form-horizontal");


                counter++;
            });

            $("#removeButton").click(function () {
                if(counter==1){
                    alert("No more textbox to remove");
                    return false;
                }

                counter--;

                $("#TextBoxDiv" + counter).remove();

            });

            $("#getButtonValue").click(function () {

                var msg = '';
                for(i=1; i<counter; i++){
                    msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
                }
                alert(msg);
            });
        });
    </script>

</body>
</html>
