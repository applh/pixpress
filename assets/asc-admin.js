console.log('Admin loaded');
import pixstore from 'pixstore';


let data = {
    active: 'dashboard',
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
                <li><a href="#dashboard" @click.prevent="active='dashboard'">Dashboard</a></li>
                <li><a href="#pages" @click.prevent="active='pages'">Pages</a></li>
                <li><a href="#posts" @click.prevent="active='posts'">Posts</a></li>
                <li><a href="#media" @click.prevent="active='media'">Media</a></li>
                <li><a href="#options" @click.prevent="active='options'">Options</a></li>
                <li><a href="#page3" @click.prevent="act_logout">Logout</a></li>
            </ul>
        </nav>
    </aside>
    <div>
        <h1>ADMIN</h1>
        <section id="dashboard" v-if="active=='dashboard'">
            <h2>dashboard</h2>
            <div>token: {{ local_token }}</div>
            <div><input type="text" v-model="local_token" /></div>
            <p>Contenu de la page 1</p>
        </section>
        <section id="pages" v-if="active=='pages'">
            <asc-admin-pages></asc-admin-pages>
        </section>
        <section id="posts" v-if="active=='posts'">
            <h2>posts</h2>
            <p>Contenu de la page 3</p>
        </section>
        <section id="media" v-if="active=='media'">
            <h2>media</h2>
            <p>Contenu de la page 3</p>
        </section>
        <section id="options" v-if="active=='options'">
            <h2>options</h2>
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
