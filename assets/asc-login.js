console.log('Login loaded');
import pixstore from 'pixstore';

export default {
    setup() {
        console.log('Login setup');
    },
    template: `
        <div>
            <b>Login</b>
            <form ref="form_contact" type="POST" @submit.prevent="submit($event)">
                <input type="email" v-model="email" required placeholder="email" />
                <input type="password" v-model="password" required placeholder="password" />
                <button type="submit">Login</button>
                <div>{{ feedback }}</div>
            </form>
        </div>
    `,
    data() {
        return {
            password: '',
            email: '',
            message: 'please fill mandatory fields',
            feedback: ''
        }
    },
    methods: {
        async submit($event) {
            console.log('submit', this.name, this.email, this.message);
            this.feedback = 'Hello from Compo 2';
            // get form data
            // const form = this.$refs.form_contact;
            // group in form data
            const formData = new FormData();
            // add password to form data
            formData.append('password', this.password);
            // add email to form data
            formData.append('email', this.email);

            // send to server /api/contact
            let response = await fetch('/api/login', {
                method: 'POST',
                body: formData
            });
            // get response
            let data = await response.json();
            console.log('response', data);
            // check if feedback if available
            if (data.feedback) {
                this.feedback = data.feedback;
            }
            if (data.token) {
                // store token
                pixstore.store('token', data.token);
                this.$emit('login', data.token);
                // get instance of app
                console.log('app', pixstore.app);
                pixstore.app.token = data.token;
                pixstore.app.toto('login test youpi');

            }
        }
    }
}
