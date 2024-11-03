<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PixPress">
    <title>PixPress</title>
    <link rel="shortcut icon" href="/assets/logo.png" type="image/png">
    <link rel="stylesheet" href="/assets/site.css">
    <style type="text/css">
    </style>
</head>

<body>
    <div id="app">
        <main>
            <h1>ADMIN</h1>
            <sc-test @toto="event_toto"></sc-test>
            <div v-if="!token">
                <asc-login @login="event_login"></asc-login>
            </div>
            <div>token: {{ token }}</div>
            <ul v-if="pixstore">
                <li v-for="k in pixstore.items">{{ k + ': ' + items[k] }}</li>
            </ul>
            </main>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> PixPress</p>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/admin">Admin</a></li>
                </ul>
            </nav>
        </footer>
    </div>
    <script type="importmap">
        {
            "imports": {
                "vue": "https://unpkg.com/vue@3.5.12/dist/vue.esm-browser.prod.js",
                "pixstore": "/assets/mod-store.js",
                "pixpress": "/assets/plugin-pixpress-admin.js",
                "sc-test" : "/assets/sc-test.js"
            }
        }
    </script>
    <script type="module">
        import {
            createApp,
            defineAsyncComponent,
            ref
        } from 'vue';

        // add plugin
        import pixpress from 'pixpress';
        import pixstore from 'pixstore';

        let app = createApp({
            setup() {
                console.log('SETUP / Hello Vue!');
            },
            mounted() {
                console.log('MOUNTED / Hello Vue!');
                this.toto('toto is called in mounted');
                // WARNING: USE this IN mounted TO STORE THE APP 
                pixstore.app = this;
                pixstore.app.toto('toto is called AGAIN in mounted');
            },
            data() {
                console.log('DATA / Hello Vue!');
                return {
                    message: 'COMPO / Hello Vue!',
                    percent: 0,
                    token: '',
                }
            },
            // provide() {
            //     return {
            //         approot: this,
            //     }
            // },
            compute: {
            },
            methods: {
                toto (msg) {
                    console.log('toto / ' + msg);
                },
                event_toto (msg) {
                    console.log('event_toto / ' + msg);
                },
                event_login (token) {
                    console.log('event_login / ' + token);
                    this.token = token;
                },
            }
        });
        // use plugin
        app.use(pixpress);
        app.mount('#app');

    </script>
</body>

</html>
