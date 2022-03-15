<template>
    <form>
        <h1>Poultry Kinds</h1>
        <label>Name</label>
        <label>Name Arabic</label>
        <label>Description</label>
    <div v-for="poultry_kind,index in Poultry_kinds" :key="poultry_kind.id">
        <!-- {{ poultry_kind.poultry_kind_name }} -->
        <a @click="createPoultry_kind()" class="add">+ Add new poultry kind</a>
        <input type="text" v-model="poultry_kind.poultry_kind_name">
        <input type="text" v-model="poultry_kind.poultry_kind_name_ar">
        <input type="text" v-model="poultry_kind.description">
        <a @click="removePoultry_kind(index)" class="remove">delete</a> 
        <hr>
    </div>
    </form>
</template>
<script>
export default {
    props : ['initialPoultry_kinds'],
    data(){
        return{
            Poultry_kinds : _.cloneDeep(this.initialPoultry_kinds) 
        };
    },
    methods: {
        removePoultry_kind(index){
            if (confirm("Are you sure you want to delete?")){
                this.Poultry_kinds.splice(index,1);
            }
        }
    }
}
</script>
<style scoped>
hr {
    margin-bottom: 30px;
}
</style>
