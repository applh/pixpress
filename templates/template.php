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
    </style>
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
            <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
            <section class="s2">
                <h2>{{ message }}</h2>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                </div>
            </section>
            <section class="s3">
                <h3>{{ percent }}%</h3>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                </div>
            </section>
            <section class="s4">
                <h4>title4</h4>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-4.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-4.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-4.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-4.png" alt="" title=""></p>
                </div>
            </section>
            <section class="s4">
                <h4>title4</h4>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                </div>
            </section>
            <section class="s4">
                <h4>title4</h4>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                </div>
            </section>
            <section class="s4">
                <h4>title4</h4>
                <div>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                    <p><?php html::lorem(); ?><img src="/assets/media/image-2.png" alt="" title=""></p>
                </div>
            </section>
            <div>
                <asc-compo2></asc-compo2>
            </div>
        </main>
        <footer>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/admin">Admin</a></li>
                </ul>
            </nav>
            <p>&copy; <?php echo date("Y"); ?> PixPress</p>
        </footer>
    </div>
    <script type="importmap">
        {
            "imports": {
                "vue": "/assets/vue.esm-browser.js",
                "pixpress": "/assets/plugin-pixpress.js"
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
        let app = createApp({
            setup() {
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
        app.mount('#app');
    </script>
</body>

</html>
