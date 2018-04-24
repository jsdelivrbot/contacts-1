<template>
   <div class="container">
       <div class="table-wrapper">
           <div class="table-title">
               <div class="row">
                   <div class="col-sm-6">
                       <h2>Manage <b>Contacts</b></h2>
                   </div>
                   <div class="col-sm-6">
                       <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Contact</span></a>
                   </div>
               </div>
           </div>
           <table class="table table-striped table-hover">
               <thead>
               <tr>

                   <th>Name</th>
                   <th>Email</th>
                   <th>Telephone</th>
                   <th>Contact Type</th>
                   <th>Actions</th>
               </tr>
               </thead>
               <tbody>
                   <tr  v-for="contact in contacts" :key="contact.id">


                       <td>{{ contact.first_name }} {{ contact.last_name }}</td>
                       <td>{{ contact.email }}</td>
                       <td>{{ contact.telephone }}</td>
                       <td>{{ contact.contact_type }}</td>
                       <td>
                           <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                           <a href="#" @click="del"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                       </td>
                   </tr>
               </tbody>
           </table>

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
                fetchData () {
                    axios.get('/api/contacts')
                        .then((res) => {
                            this.contacts = res.data
                        })
                        .catch((err) => {
                            console.log(err)
                        })
                },
                create () {
                    axios.post('/api/contacts', this.task)
                        .then((res) => {

                        })
                        .catch((err) => {
                            console.log(err)
                        })
                },
                 del() {
                        this.$emit('delete', this.id);
                 },
                delete(id) {
                    axios.delete('/api/contacts/${id}')
                        .then(( res ) => {

                        })
                        .catch((err) => {
                            console.log('failed')
                        })
                }
            }
        }
</script>
