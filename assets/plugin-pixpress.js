// /assets/plugin-pixpress.js

import {
    defineAsyncComponent
} from 'vue';

export default {
    install: (app, options) => {
        console.log('Plugin pixpress installé');

        // injecte un composant asynchrone
        app.component('asc-compo2', defineAsyncComponent({
            loader: () => import('/assets/asc-compo2.js')
        }));

        // injecte une méthode globalement disponible $translate()
        app.config.globalProperties.$pixpress = (key) => {
            return 'pixpress_' + key;
        }
    }
}
