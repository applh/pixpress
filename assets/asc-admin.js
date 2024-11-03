console.log('Admin loaded');
import pixstore from 'pixstore';


let data = {
    active: 'page1',
    local_token: ''
};


let computed = {
    token() {
        return pixstore.app.token;
    }
};

let template = `
<div class="asc-admin">
    <aside>
        <nav class="vertical">
            <ul>
                <li><a href="#page1" @click.prevent="active='page1'">Menu 1</a></li>
                <li><a href="#page2" @click.prevent="active='page2'">Menu 2</a></li>
                <li><a href="#page3" @click.prevent="active='page3'">Menu 3</a></li>
                <li><a href="#page3" @click.prevent="active='page4'">Menu 4</a></li>
                <li><a href="#page3" @click.prevent="active='page5'">Menu 5</a></li>
                <li><a href="#page3" @click.prevent="act_logout">Logout</a></li>
            </ul>
        </nav>
    </aside>
    <div>
        <h1>ADMIN</h1>
        <section id="page1" v-if="active=='page1'">
            <h2>Page 1</h2>
            <div>token: {{ local_token }}</div>
            <div><input type="text" v-model="local_token" /></div>
            <p>Contenu de la page 1</p>
        </section>
        <section id="page2" v-if="active=='page2'">
            <h2>Page 2</h2>
            <p>Contenu de la page 2</p>
        </section>
        <section id="page3" v-if="active=='page3'">
            <h2>Page 3</h2>
            <p>Contenu de la page 3</p>
        </section>
        <section id="page4" v-if="active=='page4'">
            <h2>Page 4</h2>
            <p>Contenu de la page 3</p>
        </section>
        <section id="page5" v-if="active=='page5'">
            <h2>Page 5</h2>
            <p>Contenu de la page 3</p>
        </section>
    </div>
</div>
`;


let methods = {
    act_logout() {
        console.log('logout');
        pixstore.store('token', '');
        pixstore.app.token = '';
    }
};

let mounted = function () {
    console.log('Admin mounted');
    console.log('token', pixstore.app.token);
    // setup local token
    this.local_token = pixstore.app.token;    
}

export default {
    template,
    data: () => data,
    computed,
    methods,
    mounted
}
