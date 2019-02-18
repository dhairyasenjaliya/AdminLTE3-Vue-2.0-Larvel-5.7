<style>
     
</style>

<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">               
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" v-bind:style="{ 'background-image': 'url(./image/user-back.jpg)' }   ">
                <h3 class="widget-user-username">Dhairya </h3>
                <h5 class="widget-user-desc">Web Designer </h5>
               
              </div>
              <div class="widget-user-image">
                <img class="img-circle" :src="getProfilePhoto()"  alt="User Avatar">  
                <!-- Image display in vue components -->
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">30</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">10</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
             <div class="row mt-4">
            <div class="col-md-12"> 
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                      Activity
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                      Time Line
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                      <div class="modal-header">
                      <h5 class="modal-title" id="addNew">Update Your Information </h5>
                </div>
                    <form  enctype="multipart/form-data" @submit.prevent="updateProfilePic() " @keydown="form.onKeydown($event)">
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
                        <select v-model="form.type" type="name" name="type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                            <option disabled value="">Select Type</option>
                            <option value="Admin">Admin</option>
                            <option value="user">User </option>      
                        </select>                                         
                        <has-error :form="form" field="type"></has-error>
                        </div>

                        <div class="form-group">                    
                        <textarea v-model="form.bio" type="textarea" name="bio" placeholder="Enter Bio (You can skip)" class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                        <has-error :form="form" field="bio"></has-error>
                        </div>

                        <div class="custom-file" >                             
                            <input type="file" @change="updateProfilePic" class="custom-file-input" id="validatedCustomFile" >                             
                            <label class="custom-file-label" for="validatedCustomFile">Upload Picture...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>

                    </div>
                    <div class="modal-footer">                  
                        <button type="submit" @click.prevent="updateInfo" class="btn btn-success">Update</button>
                    </div>
                    </form>
                </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>            
            </div> 
        </div>
</template>

  

<script>
    export default {
      
              data(){
            return {  
                form : new Form({
                                  id : '',
                                  name: '',
                                  email: '',
                                  password: '',
                                  type : '',
                                  bio : '',
                                  photo: ''
                              })
            }
        },
 
        created(){
              this.$Progress.start();               
              axios.get("api/profile")
              .then(({ data }) => (this.form.fill(data)));    
              
              Fire.$on('updateProfile',() => {
                this.getProfilePhoto();  //Trigger EVent when CreateUser is fired 
              } );
              this.$Progress.finish();           
        },

        methods:{
              updateProfilePic(e){
                    let file = e.target.files[0];
                    let reader = new FileReader();
                    reader.onloadend = (file) => {
                              this.form.photo = reader.result;
                        }
                    reader.readAsDataURL(file);   
                                        
              },

             
              getProfilePhoto(){
                      return "image/profile/"+this.form.photo;                     
              },

              updateInfo(){
                this.$Progress.start();                   
                    this.form.put('api/profile/')
                    .then(()=>{                      
                             toast.fire({
                                         type: 'success',
                                         title: 'Your Profile is Updated'                                              
                                       });   
                            this.getProfilePhoto();
                            this.$Progress.finish();  
                    })
                    .catch(()=>{
                        this.$Progress.fail();  
                    })  
                     Fire.$emit('updateProfile');
              }
        }, 
 
        mounted() {               
            console.log('Component mounted.')           
        }
 
  }

</script>