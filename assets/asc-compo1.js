console.log('Compo 1 loaded');

export default {
    template: `
        <div>
            <h1>Composant 1</h1>
            <p>{{ message }}</p>
        </div>
    `,
    data() {
        return {
            message: 'Hello from Compo 1'
        }
    }
}
