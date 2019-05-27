import jQuery from 'jquery';
import Vue from 'vue';
import Questionnaire from './components/questionnaire.vue';
import Json3 from 'json3';
import Bootstrap from 'bootstrap-sass/assets/javascripts/bootstrap';
import BootstrapMaterial from 'bootstrap-material-design/scripts/material';
import BootstraRipple from 'bootstrap-material-design/scripts/ripples';


jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//-- Initialize Vue Agreement App
let app = new Vue(
    {
        el: '#questionnaire',
        render: h => h(
            Questionnaire,
            {
                props: {
                    errors: {},
                    formData: data
                },
            }
        )
    }
);

//-- WebkitHtmlToPDF needs this to know if the Vue component has loaded
window.status = "done";

//-- Used for testing
window._APP = app;
