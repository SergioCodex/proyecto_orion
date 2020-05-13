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

        //fetch('/api/recurso/oxigeno').then(resp => resp.json()).then(json => {

            //var total_oxigeno = json.data[0];

        //Oxígeno
            var data = {
                labels: ['Consumido', 'Sin usar'],
                datasets: [
                        {
                            data: [90, 10],
                            backgroundColor: [
                                "#98FFC588", 
                                "#D5FF6488"
                            ],
                            hoverBackgroundColor: ['#98FFC5FF', '#D5FF64FF'],
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
            labels: ['Consumido', 'Sin usar'],
            datasets: [
                    {
                        data: [60, 40],
                        backgroundColor: [
                            "#FFFF8188", 
                            "#FFC28188"
                        ],
                        hoverBackgroundColor: ['#FFFF81FF', '#FFC281FF'],
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
            labels: ['Consumido', 'Sin usar'],
            datasets: [
                    {
                        data: [84, 16],
                        backgroundColor: [
                            "#C7C7C788", 
                            "#A7A7A788"
                        ],
                        hoverBackgroundColor: ['#C7C7C7FF', '#A7A7A7FF'],
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
            labels: ['Consumido', 'Sin usar'],
            datasets: [
                    {
                        data: [84, 16],
                        backgroundColor: [
                            "#85FBFF88", 
                            "#85C8FF88"
                        ],
                        hoverBackgroundColor: ['#85FBFFFF', '#85C8FFFF'],
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
            labels: ['Consumido', 'Sin usar'],
            datasets: [
                    {
                        data: [40, 60],
                        backgroundColor: [
                            "#FF618288", 
                            "#FF275488"
                        ],
                        hoverBackgroundColor: ['#FF6182FF', '#FF2754FF'],
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
}
</script>
@endsection