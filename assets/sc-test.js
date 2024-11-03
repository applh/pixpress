import pixstore from 'pixstore';

export default {
    inject: ['approot'],
    data() {
      return {
        msg: 'Hello Vue 3!',
        count: 0
      }
    },
    mounted() {
        console.log('Mounted');
        // window.zozo.toto('test');
        // this.approot.toto(this.msg);
        //pixstore.app.toto('test');
    },
    methods: {
        increment() {
            this.count++;
            // window.zozo.toto('test');
            // pixstore.app.toto('test');
            this.$emit('toto', this.count);
        }
    },
    template: `
      <button @click="increment">
        You clicked me {{ count }} times.
      </button>`
  }
