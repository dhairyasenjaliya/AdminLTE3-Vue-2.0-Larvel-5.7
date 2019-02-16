<template>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">               
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" v-bind:style="{ 'background-image': 'url(./image/user-back.jpg)' }   ">
                <h3 class="widget-user-username">Dhairya </h3>
                <h5 class="widget-user-desc">Web Designer</h5>
               
              </div>
              <div class="widget-user-image">
                <img class="img-circle" v-bind:src="'./image/boy.png'"  alt="User Avatar">  
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
          
            </div>
          

        </div>

    </div>

</template>

  

<script>

    export default {
         mounted() {
            console.log('Component mounted.')
        }        
    }

</script>