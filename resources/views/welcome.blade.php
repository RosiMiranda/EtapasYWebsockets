<!DOCTYPE HTML>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Our CSS -->
        <link rel="stylesheet" href="../css/styles.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
        </script>
        <script>
            function createPedido() {
                $.ajax({
                    url: '{{ route('pedidos.store') }}',
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{}
                })
                .done(function(response) {
                    //console.log(response);
                    $('.div1-pedidos').append
                    (' <div draggable="true" ondragstart="drag(event)" id="drag2" class="pedidoCard"> Pedido '  + ' ' + response.id + '</div>');
                })
                .fail(function(jqXHR, response) {
                    console.log('Fallido', response);

                });
            }
        </script>
    </head>
    <body>
    <h2>Dashboard</h2>
    <div style="padding:30px" class="row justify-content-between row-width">
        <button class="btn-primary" onclick="createPedido();"> Crear un pedido </button>
        <div class="btn-success"> Alertita ahahahahahahahaha :) </div>
    </div>

    <div>
        <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
            <h4>1. Salida de planta</h4>
            <div class="div1-pedidos">
                @forelse($one as $pedido)
                    <div draggable="true" ondragstart="drag(event)" id="drag2" class="pedidoCard"> {{$pedido->titulo}} {{$pedido->id}} </div>
                @empty
                @endforelse
            </div>
        </div>

        <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
            <h4>2. En Local Delivery Center</h4>
            <div class="div1-pedidos">
                @forelse($two as $pedido)
                    <div draggable="true" ondragstart="drag(event)" id="drag2" class="pedidoCard"> {{$pedido->titulo}} {{$pedido->id}} </div>
                @empty
                @endforelse
            </div>
        </div>

        <div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)">
            <h4>3. En proceso de entrega</h4>
            <div class="div1-pedidos">
                @forelse($three as $pedido)
                    <div draggable="true" ondragstart="drag(event)" id="drag2" class="pedidoCard"> {{$pedido->titulo}} {{$pedido->id}} </div>
                @empty
                @endforelse
            </div>
        </div>

        <div id="div4" ondrop="drop(event)" ondragover="allowDrop(event)">
            <h4>4. Entregado</h4>
            <div id="divh1">
                <p>a. Completa</p>
                <div class="div1-pedidos">
                    @forelse($four as $pedido)
                        <div draggable="true" ondragstart="drag(event)" id="drag2" class="pedidoCard"> {{$pedido->titulo}} {{$pedido->id}} </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div id="divh2">
                <p>b.Fallida</p>
                <div class="div1-pedidos">
                    @forelse($five as $pedido)
                        <div draggable="true" ondragstart="drag(event)" id="drag2" class="pedidoCard"> {{$pedido->titulo}} {{$pedido->id}} </div>
                    @empty
                    @endforelse
                </div>
            </div>

        </div>
    </div>
    </body>
</html>

