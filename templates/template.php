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
    <script type="module">
    </script>
</head>

<body>
    <div id="app">
        <header>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <h1><?php echo date("H:i:s"); ?></h1>
            <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
            <section>
                <h2>{{ message }}</h2>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                </div>
            </section>
            <section>
                <h3>{{ percent }}%</h3>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                </div>
            </section>
            <section>
                <h4>title4</h4>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                </div>
            </section>
            <section>
                <h4>title4</h4>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                </div>
            </section>
            <section>
                <h4>title4</h4>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                </div>
            </section>
            <section>
                <h4>title4</h4>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/image-2.png" alt="" title=""></p>
                </div>
            </section>
            <div>
                <button @click="percent++">Increment</button>
                <button @click="percent--">Decrement</button>
            </div>
            <div v-if="percent > 0">
                <asc-compo1></asc-compo1>
            </div>
        </main>
        <footer></footer>
    </div>

    <script type="module">
        import {
            createApp,
            defineAsyncComponent,
            ref
        } from '/assets/vue.esm-browser.js';

        // add plugin
        import pixpress from '/assets/plugin-pixpress.js';
        let app = createApp({
            setup() {
                console.log('SETUP / Hello Vue!');
                const message = ref('SETUP / Hello Vue!')
                return {
                    // message
                }
            },
            data() {
                console.log('DATA / Hello Vue!');
                return {
                    message: 'COMPO / Hello Vue!',
                    percent: 0,
                }
            }
        });
        // use plugin
        app.use(pixpress);
        app.component('asc-compo1', defineAsyncComponent({
            loader: () => import('/assets/asc-compo1.js')
        }));
        app.mount('#app');
    </script>
</body>

</html>
