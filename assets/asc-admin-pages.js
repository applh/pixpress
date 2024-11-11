import pixstore from 'pixstore';

let ps = pixstore.items;
ps.page_title = 'page title';

let template = `
<div>
    <h2>admin pages</h2>
    <form>
        <input type="text" v-model="ps.page_title" />
    </form>
</div>
`;

let computed = {
    ps() {
        return ps;
    }
};
export default {
    template,
    computed
}
