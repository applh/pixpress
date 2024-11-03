console.log('Mod store loaded');

import { reactive } from 'vue'

let items = reactive({});
let app = null;

export default {
    app,
    items,
    store(key, value) {
        console.log('store', key, value);
        items[key] = value;
        return value;
    },
    get(key, defaultValue = null) {
        console.log('get', key);
        return items[key] ?? defaultValue;
    }
}

