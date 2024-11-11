// /assets/plugin-pixpress-admin.js

import {
    defineAsyncComponent
} from 'vue';

import pixstore from 'pixstore';

export default {
    install: (app, options) => {
        console.log('Plugin pixpress admin installé');

        // injecte async components
        app.component('asc-login', defineAsyncComponent({
            loader: () => import('/assets/asc-login.js')
        }));
        app.component('asc-admin', defineAsyncComponent({
            loader: () => import('/assets/asc-admin.js')
        }));
        app.component('asc-admin-pages', defineAsyncComponent({
            loader: () => import('/assets/asc-admin-pages.js')
        }));

        // injecte une méthode globalement disponible $translate()
        app.config.globalProperties.$pixpress = (key) => {
            return 'pixpress_' + key;
        }

        // add a store to the app
        app.config.globalProperties.$pixstore = (key, value) => {
            return pixstore.store(key, value);
        }
        // get a store from the app
        app.config.globalProperties.$pixget = (key) => {
            return pixstore.get(key);
        }
        // add a store to the app
        app.config.globalProperties.$locstore = (key, value) => {
            // check if store is available
            if (!localStorage.getItem('pixpress')) {
                // create store
                localStorage.setItem('pixpress', JSON.stringify({}));
            }
            // get store
            let store = JSON.parse(localStorage.getItem('pixpress'));
            // set value in store
            store[key] = value;
            // save store
            localStorage.setItem('pixpress', JSON.stringify(store));
        }
        // get a store from the app
        app.config.globalProperties.$locget = (key) => {
            // check if store is available
            if (!localStorage.getItem('pixpress')) {
                // create store
                localStorage.setItem('pixpress', JSON.stringify({}));
            }
            // get store
            let store = JSON.parse(localStorage.getItem('pixpress'));
            // get value from store
            return store[key];
        }

    }
}
