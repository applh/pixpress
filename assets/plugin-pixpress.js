// /assets/plugin-pixpress.js
export default {
    install: (app, options) => {
        console.log('Plugin pixpress installé');
        // injecte une méthode globalement disponible $translate()
        app.config.globalProperties.$pixpress = (key) => {
            return 'pixpress_' + key;
        }
    }
}
