<template>
  <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Add Contact</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>First Name</label>
                            <input v-model="contact.first_name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input v-model="contact.last_name" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input v-model="contact.email" type="email" class="form-control" required></input>
                        </div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <input v-model="contact.telephone" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Contact Type</label>
                            <input v-model="contact.contact_type" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add"  @click="create">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                contacts: [],
                contact: {
                    first_name: ''
                }
            }
        },
        methods: {
            create () {
                axios.post('/api/contacts', this.contact)
                    .then((res) => {
                        console.log(res);
                        this.tasks.unshift(res.data)
                        this.task.name = ''
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        }
    }
</script>
<style>
    body, task-list{
        padding-top: 20px;
    }
</style>