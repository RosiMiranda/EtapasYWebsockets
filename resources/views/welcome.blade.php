<!DOCTYPE HTML>
<html>
  <head>
          <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      #div1, #div2, #div3, #div4{

        float: left;
        width: 200px;
        height: 500px;
        margin: 25px;s
        padding: 10px;
        border: 1px solid black;
      }

      #divh1, #divh2{
        width: 200px;
        
        height: 200px;
        border: 1px solid black;
      }
      h4{
          padding: 0;
          margin : 3px;
          
      }

      .pedidoCard{
          background-color: darkcyan;
          width: 90%;
          height: 31px;
          margin : 5px;
          text-align: center;
          
      }
      .row-width{
        width: 70%;
      }

    </style>
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
  </head>
<body>
  <h2>Dashboard</h2>
  <div style="padding:30px" class="row justify-content-between row-width"> 
    <button class="btn-primary"> Crear un pedido </button>
    <div class="btn-success"> Alertita ahahahahahahahaha :) </div>
  </div>

  <div>
      <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
          <h4>1. Salida de planta</h4>
          <div draggable="true" ondragstart="drag(event)" id="drag2" class="pedidoCard"> test </div>
      </div>

      <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
          <h4>2. En Local Delivery Center</h4>
      </div>

      <div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)">
          <h4>3. En proceso de entrega</h4>
      </div>

      <div id="div4" ondrop="drop(event)" ondragover="allowDrop(event)">
        <h4>4. Entregado</h4>
        <div id="divh1"><p>a. Completa</p></div>
        <div id="divh2"><p>b.Fallida</p></div>

      </div>
  </div>
  </body>
</html>