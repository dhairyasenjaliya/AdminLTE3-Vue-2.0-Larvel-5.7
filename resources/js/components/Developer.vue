<template>

    <div class="container">
         
        <div class="row mt-5">        

            <div class="col-md-12"> 
                <div class="card">

                    <div class="card-header">Developer's</div>
 
                    <div class="card-body">

                        <passport-clients></passport-clients>
                        <passport-authorized-clients></passport-authorized-clients>
                        <passport-personal-access-tokens></passport-personal-access-tokens>

                    </div>

                </div>

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