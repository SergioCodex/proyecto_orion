/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const ClassicEditor = require('@ckeditor/ckeditor5-build-classic');


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('show-incidencia', require('./components/ShowIncidenciaComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        name: null,
        apellidos: null,
        id_rol: 1,
        id_sector: 1,
        email: null,
        password: null,
        errors: [],
        msgs: [],
        status: false
    },
    methods: {

        createTripulante: function () {

            var url = 'tripulante';
            axios.post(url, {
                name: this.name,
                apellidos: this.apellidos,
                id_rol: this.id_rol,
                id_sector: this.id_sector,
                email: this.email,
                password: this.password
            }).then(response => {
                this.status = true;
                this.msgs.push("Usuario creado con éxito")

                this.name = null;
                this.apellidos = null;
                this.id_rol = 1;
                this.id_sector = 1;
                this.email = null;
                this.password = null,
                    this.errors = [],

                    $('#creacion').modal('hide');

            }).catch(error => {

                this.errors = [];

                if (!this.name) {
                    this.errors.push("El nombre es obligatorio");
                }

                if (!this.apellidos) {
                    this.errors.push("El apellido es obligatorio");
                }

                if (!this.email) {
                    this.errors.push('El correo electrónico es obligatorio.');
                } else if (!this.validEmail(this.email)) {
                    this.errors.push('El correo electrónico debe ser válido.');
                }

                if (!this.password) {
                    this.errors.push("La contraseña es obligatoria");
                }

                this.errors.push(error);
            });
        },
        validEmail: function (email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },

    }
});

(function ($) {

    "use strict";

    var fullHeight = function () {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function () {
            $('.js-fullheight').css('height', $(window).height());
        });

    };
    fullHeight();

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $(document).on('click', '.showTrip', function () {
        var nombre = $(this).attr('data-name');
        var apellido = $(this).attr('data-apellido');
        var email = $(this).attr('data-email');
        var rol = $(this).attr('data-rol');
        var sector = $(this).attr('data-sector');

        $('#show input[name=name]').val(nombre);
        $('#show input[name=apellido]').val(apellido);
        $('#show input[name=email]').val(email);
        $('#show input[name=rol]').val(rol);
        $('#show input[name=sector]').val(sector);

        $('#show').modal('show');
    });


    ClassicEditor
        .create(document.querySelector('#descripcion'))
        .then(editor => {

        })
        .catch(error => {

        });

})(jQuery);