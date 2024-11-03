console.log('Compo 2 loaded');

export default {
    template: `
        <div class="asc-form-contact">
            <b>Contact Form</b>
            <form ref="form_contact" type="POST" @submit.prevent="submit($event)">
                <input type="text" v-model="name" required placeholder="name" />
                <input type="email" v-model="email" required placeholder="email" />
                <textarea v-model="message" required placeholder="message"></textarea>
                <button type="submit">Change message</button>
                <div>{{ feedback }}</div>
            </form>
        </div>
    `,
    data() {
        return {
            name: '',
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
            // add message to form data
            formData.append('message', this.message);
            // add name to form data
            formData.append('name', this.name);
            // add email to form data
            formData.append('email', this.email);

            // send to server /api/contact
            let response = await fetch('/@/api/contact', {
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

        }
    }
}
