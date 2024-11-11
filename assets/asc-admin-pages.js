import pixstore from 'pixstore';

let ps = pixstore.items;
ps.page_title = 'page title';

let template = `
<div>
    <h2>admin pages</h2>
    <form>
        <input type="text" v-model="ps.page_title" />
    </form>
    <table>
        <tbody>
            <tr v-for="item in ps.pages">
                <td>{{ item.id }}</td>
                <td>{{ item.uri }}</td>
                <td>{{ item.template }}</td>
            </tr>
        </tbody>
    </table>
</div>
`;

let data = {
    items: [],
}
let computed = {
    ps() {
        return ps;
    }
};

let mounted = async () => {
    console.log('mounted');
    let response = await fetch('/@/api/list');
    let json  = await response.json();
    console.log('json', json);
    ps.pages = json.items ?? [];
}

export default {
    template,
    data: () => data,
    computed,
    mounted
}
