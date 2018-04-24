<template>
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                         <a href="#" @click.prevent="remove(contact)"><input type="button" class="btn btn-danger" value="Delete"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
            mounted() {
                this.fetchData()
            },
            data () {
                return {
                    contacts: [],
                    contact: {
                        first_name: ''
                    }
                }
            },
            methods: {

                remove(contact) {
                    axios.put('/api/contacts/contact.id')
                        .then(( res ) => {

                        })
                        .catch((err) => {
                            console.log('failed')
                        })
                }
            }
        }
</script>
