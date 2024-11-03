<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PixPress">
    <title>PixPress</title>
    <link rel="shortcut icon" href="/assets/media/logo.png" type="image/png">
    <link rel="stylesheet" href="/assets/site.css">
    <style type="text/css">

        aside {
            background-color: #000000;
        }
        nav.vertical ul {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .asc-login {
            max-width: 640px;
            display: block;
            margin: 0 auto;
        }
        /* css grid on .panel-admin */
        .asc-admin {
            display: grid;
            grid-template-columns: 10fr 90fr;
            gap: 1rem;
            background-color: #cccccc;
            width: 100%;

            h1, h2 {
                text-align: left;
            }
        }
    </style>
</head>

<body>
    <div id="app">
    </div>
    <template id="template-app">
        <main class="admin">
            <div v-if="!token">
                <h1>LOGIN</h1>
                <asc-login @login="event_login"></asc-login>
            </div>
            <div v-else>
                <asc-admin></asc-admin>
            </div>
        </main>
        <footer>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/@/admin">Admin</a></li>
                    <li v-if="token"><a href="#logout" @click.prevent="act_logout">Logout</a></li>
                </ul>
            </nav>
            <p>&copy; <?php echo date("Y"); ?> PixPress</p>
        </footer>
    </template>
    <script type="importmap">
        {
            "imports": {
                "vue": "/assets/vue.esm-browser.js",
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
            template: '#template-app',
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
            computed: {

            },
            methods: {
                toto(msg) {
                    console.log('toto / ' + msg);
                },
                event_toto(msg) {
                    console.log('event_toto / ' + msg);
                },
                event_login(token) {
                    console.log('event_login / ' + token);
                    this.token = token;
                },
                act_logout() {
                    console.log('act_logout');
                    this.token = null;
                },
            }
        });
        // use plugin
        app.use(pixpress);
        app.mount('#app');
    </script>
</body>

</html>
