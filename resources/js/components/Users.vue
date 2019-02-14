<template>

    <div class="container">

      <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users List</h3>   
                <div class="card-tools">
                        <button class="btn btn-success" data-toggle="modal" data-target="#addNew">Add User <i class="fas fa-user-plus"></i></button>
                </div>               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Type</th>
                    <th>Bio</th>
                    <th>Photo</th>
                    <th>Registered At</th>
                    <th>Modify</th>
                  </tr>                  
                   <tr v-for="user in users.data" :key="user.id">
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.type | upText}}</td>
                    <td>{{user.bio}}</td>
                    <td>{{user.photo}}</td>
                    <td>{{user.created_at | myDate}}</td>
                    <td>                        
                        <a href="#edit">
                            <i class="fa fa-edit"></i>
                        </a>   /   
                        <a href="#delete">
                            <i class="fa fa-trash red"></i>
                        </a> 

                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
    <!-- MOdel -->
                <div class="modal" id="addNew" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNew">Add New Users </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="createUser" @keydown="form.onKeydown($event)">
                <div class="modal-body">
                    <div class="form-group">                    
                    <input v-model="form.name" type="text" name="name" placeholder="Enter Name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                    </div>

                    <div class="form-group">                    
                    <input v-model="form.email" type="email" name="email" placeholder="Enter Email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                    <has-error :form="form" field="email"></has-error>
                    </div>

                    <div class="form-group">                    
                    <input v-model="form.password" type="password" name="password" placeholder="Enter Password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                    <has-error :form="form" field="password"></has-error>
                    </div>

                    <div class="form-group">                    
                    <select v-model="form.type" type="name" name="type" placeholder="Enter Type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                        <option value="Admin">Admin </option>
                        <option value="Standard User">Standard User </option>      
                    </select>                                         
                    <has-error :form="form" field="type"></has-error>
                    </div>

                    <div class="form-group">                    
                    <textarea v-model="form.bio" type="textarea" name="bio" placeholder="Enter Bio (You can skip)" class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                    <has-error :form="form" field="bio"></has-error>
                    </div>

                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" >
                        <label class="custom-file-label" for="validatedCustomFile">Upload Picture...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                </form>
                </div>
            </div>
            </div>
    </div>
</template>

<script>

    export default {

        data(){
            return {
                users:{},
                form : new Form({
                name: '',
                email: '',
                password: '',
                type : 'User',
                bio : '',
                photo: ''
                })
            }
        },

        methods:{
                loadUser(){
                  axios.get("api/user").then(({ data }) => (this.users = data));
                },
                createUser(){
                                this.$Progress.start()
                                this.form.post('api/user');
                 } 
        },

        created(){
            this.$Progress.start();
            this.loadUser();
        },

        mounted() {
            console.log('Component mounted.')
        }
    }

</script>