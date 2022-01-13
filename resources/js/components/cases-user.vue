<template>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="client">العميل :</label>
                <select class="form-control" data-live-search="true" v-model="selectedUser" id="client" name="client_id" style="height: 50px;">
                    <option v-for="user in users" v-text="user.name" :value="user"></option>
                </select>
            </div>

            <div class="form-group">
                <label for="case">القضية :</label>
                <select class="form-control" data-live-search="true" id="case" name="case_id" v-model="selectedCase" style="height: 50px;">
                    <option v-for="_case in selectedUser.cases" v-text="_case.number" :value="_case.id"></option>
                </select>
            </div>


        </div>
    </div>

</template>

<script>
export default {
    name: "cases-user",
    props: ['collection', 'olduser', 'oldcase'],
    data: function () {
        return {
            users: [],
            selectedUser: '',
            selectedCase: ''
        }
    },
    created() {
        this.users = this.collection;
        if (this.olduser)
            this.selectedUser = this.olduser;
        if (this.oldcase)
            this.selectedCase = this.oldcase.id;
    }
}

</script>

<style scoped>

</style>
