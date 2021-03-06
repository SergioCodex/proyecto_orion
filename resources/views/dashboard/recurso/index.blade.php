@extends('dashboard.master')

@section('title')
Dashboard [Recursos]
@endsection

@section('content')

<div class="row mt-5 justify-content-center">
    <div class="col-auto">
        <h2 class="display-4">PANEL DE CONTROL</h2>
    </div>
</div>
<hr>
<div class="row mt-4 justify-content-center">
    <div class="col-3 tarjeta-donut shadow-sm p-3">
        <p class="lead text-center">ÓXIGENO</p>
        <div><canvas id="oxigeno" width="350" height="350"></canvas></div>
    </div>
    <div class="col-3 tarjeta-donut shadow-sm p-3 ml-4">
        <p class="lead text-center">ENERGÍA</p>
        <div><canvas id="energia" width="350" height="350"></canvas></div>
    </div>
    <div class="col-3 tarjeta-donut shadow-sm p-3 ml-4">
        <p class="lead text-center">COMBUSTIBLE</p>
        <div><canvas id="combustible" width="350" height="350"></canvas></div>
    </div>
</div>
<div class="row mt-3 justify-content-center">
    <div class="col-3 tarjeta-donut shadow-sm p-3 ml-4">
        <p class="lead text-center">AGUA</p>
        <div><canvas id="agua" width="350" height="350"></canvas></div>
    </div>
    <div class="col-3 tarjeta-donut shadow-sm p-3 ml-4">
        <p class="lead text-center">ALIMENTO</p>
        <div><canvas id="alimento" width="350" height="350"></canvas></div>
    </div>
</div>

<script type="application/javascript">
    // fetch('/api/tripulante/mes')
        //     .then(resp => resp.json())
        //     .then(json => {
        //         var mayo = json.data[0];
        //         var junio = json.data[1];
    

    window.onload = function(){

        fetch('/api/recurso/consumos').then(resp => resp.json()).then(json => {

            var consumos = json.data[0];
            var recursos = json.data[1];

            var columnas = [];

            consumos.forEach(objetivo => {
                columnas.push('Obj. #' + objetivo.id_objetivo);
            });

            var consumos_oxigenos = [];
            var consumos_energia = [];
            var consumos_combustible = [];
            var consumos_agua = [];
            var consumos_alimento = [];

            consumos.forEach(objetivo => {
                consumos_oxigenos.push(objetivo.oxigeno);
                consumos_energia.push(objetivo.energia);
                consumos_combustible.push(objetivo.combustible);
                consumos_agua.push(objetivo.agua);
                consumos_alimento.push(objetivo.alimento);
            });

            columnas.push('Recurso sin usar');

            //oxigeno

            consumos_oxigenos.forEach(valor => {
                recursos[0].oxigeno -= valor;
            });

            consumos_oxigenos.push(recursos[0].oxigeno);

            //energia

            consumos_energia.forEach(valor => {
                recursos[0].energia -= valor;
            });

            consumos_energia.push(recursos[0].energia);

            //combustible

            consumos_combustible.forEach(valor => {
                recursos[0].combustible -= valor;
            });

            consumos_combustible.push(recursos[0].combustible);

            //agua

            consumos_agua.forEach(valor => {
                recursos[0].agua -= valor;
            });

            consumos_agua.push(recursos[0].agua);

            //alimento

            consumos_alimento.forEach(valor => {
                recursos[0].alimento -= valor;
            });

            consumos_alimento.push(recursos[0].alimento);
            

        //Oxígeno
            var data = {
                labels: columnas,
                datasets: [
                        {
                            data: consumos_oxigenos,
                            backgroundColor: [
                                "#98FFC588", 
                                "#D5FF6488",
                                "#D5FF1088"
                            ],
                            hoverBackgroundColor: ['#98FFC5FF', '#D5FF64FF', "#D5FF10FF"],
                            borderWidth: 3,
                            weight: 1
                        }]
            }

            var ctx_oxigeno = document.getElementById("oxigeno").getContext("2d");

            var oxigeno = new Chart(ctx_oxigeno, {
                type: 'doughnut',
                data: data,
                options : {
                    maintainAspectRatio : false
                }
            });

        //});

        

        //Energía
        var data = {
            labels: columnas,
            datasets: [
                    {
                        data: consumos_energia,
                        backgroundColor: [
                            "#FFFF8188", 
                            "#FFC28188",
                            "#FFC00188"
                        ],
                        hoverBackgroundColor: ['#FFFF81FF', '#FFC281FF', "#FFC061FF"],
                        borderWidth: 3,
                        weight: 1
                    }]
        }

        var ctx_energia = document.getElementById("energia").getContext("2d");

        var energia = new Chart(ctx_energia, {
            type: 'doughnut',
            data: data,
            options : {
                maintainAspectRatio : false
            }
        });

        //Combustible
        var data = {
            labels: columnas,
            datasets: [
                    {
                        data: consumos_combustible,
                        backgroundColor: [
                            "#C7C90788", 
                            "#A7A80788",
                            "#A7A50788"
                        ],
                        hoverBackgroundColor: ['#C7C7C7FF', '#A7A7A7FF', "#A7A507FF"],
                        borderWidth: 3,
                        weight: 1
                    }]
        }

        var ctx_combustible = document.getElementById("combustible").getContext("2d");

        var combustible = new Chart(ctx_combustible, {
            type: 'doughnut',
            data: data,
            options : {
                maintainAspectRatio : false
            }
        });

        //Agua
        var data = {
            labels: columnas,
            datasets: [
                    {
                        data: consumos_agua,
                        backgroundColor: [
                            "#85FBFF88", 
                            "#85C8FF88",
                            "#8599FF88"
                        ],
                        hoverBackgroundColor: ['#85FBFFFF', '#85C8FFFF',"#8599FFFF"],
                        borderWidth: 3,
                        weight: 1
                    }]
        }

        var ctx_agua = document.getElementById("agua").getContext("2d");

        var agua = new Chart(ctx_agua, {
            type: 'doughnut',
            data: data,
            options : {
                maintainAspectRatio : false
            }
        });

        //Comida
        var data = {
            labels: columnas,
            datasets: [
                    {
                        data: consumos_alimento,
                        backgroundColor: [
                            "#FF618288", 
                            "#FF275488",
                            "#F0005488"
                        ],
                        hoverBackgroundColor: ['#FF6182FF', '#FF2754FF', "#FF2454FF"],
                        borderWidth: 3,
                        weight: 1
                    }]
        }

        var ctx_alimento = document.getElementById("alimento").getContext("2d");

        var alimento = new Chart(ctx_alimento, {
            type: 'doughnut',
            data: data,
            options : {
                maintainAspectRatio : false
            }
        });
    });
        
}
</script>
@endsection