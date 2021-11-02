<template>
    
<div>




<!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label"> Settings  </h3>
            </div>
           
        </div>
        <div class="card-body">
           
           <form @submit.prevent="update()">
      <div class="modal-body">
        <div class="form-group">
        <label> Site name </label>
        <input v-model="form.site_name" type="text" name="site_name"
            class="form-control" :class="{ 'is-invalid': form.errors.has('site_name') } " required>
         <div v-if="form.errors.has('site_name')" v-html="form.errors.get('site_name')" />
        </div>
        <div class="form-group">
        <label> Welcome Message </label>
        <input v-model="form.welcome_message" type="text" name="welcome_message"
            class="form-control" :class="{ 'is-invalid': form.errors.has('welcome_message') } " required>
         <div v-if="form.errors.has('welcome_message')" v-html="form.errors.get('welcome_message')" />
        </div>
        <div class="form-group">
        <label> Email  </label>
        <input v-model="form.email" type="email" name="email"
            class="form-control" :class="{ 'is-invalid': form.errors.has('email') } " required>
         <div v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>
       
      
        
        
        <div class="form-group">
        <label> Logo  </label>
        <input @change="upload" type="file" name="logo"
            class="form-control" :class="{ 'is-invalid': form.errors.has('logo') } " >
         <div v-if="form.errors.has('logo')" v-html="form.errors.get('logo')" />
        </div>
        <div class="form-group">
            <img v-if="form.logo!=''" :src="form.logo" class="img-small">
        </div>

        
        <div class="form-group">
        <label> Instagram URL </label>
        <input v-model="form.instagram_url" type="url" name="instagram_url"
            class="form-control" :class="{ 'is-invalid': form.errors.has('instagram_url') } " required>
         <div v-if="form.errors.has('instagram_url')" v-html="form.errors.get('instagram_url')" />
        </div>
        <div class="form-group">
        <label> Paypal Base Uri  </label>
        <input v-model="form.paypal_base_uri" type="url" name="paypal_base_uri"
            class="form-control" :class="{ 'is-invalid': form.errors.has('paypal_base_uri') } " required>
         <div v-if="form.errors.has('paypal_base_uri')" v-html="form.errors.get('paypal_base_uri')" />
        </div>
        <div class="form-group">
        <label> Paypal Client Id  </label>
        <input v-model="form.paypal_client_id" type="text" name="paypal_client_id"
            class="form-control" :class="{ 'is-invalid': form.errors.has('paypal_client_id') } " required>
         <div v-if="form.errors.has('paypal_client_id')" v-html="form.errors.get('paypal_client_id')" />
        </div>
        <div class="form-group">
        <label> Paypal Client Secret  </label>
        <input v-model="form.paypal_client_secret" type="text" name="paypal_client_secret"
            class="form-control" :class="{ 'is-invalid': form.errors.has('paypal_client_secret') } " required>
         <div v-if="form.errors.has('paypal_client_secret')" v-html="form.errors.get('paypal_client_secret')" />
        </div>
       
       
       
           
       
        
       
    
        



  
      </div>
      <div class="modal-footer">
        <button  type="submit" class="btn btn-primary">Update </button>
      </div>
      </form>
          
    </div>
        
    </div>
    <!--end::Card-->



    </div>
</template>

<script>


    export default {
       mounted(){
           this.getData();
       },
        props:['settings'],
       data(){
           return {
               form:new Form({
                   id:'',
                   site_name:'',
                   email:'',
                   address:'',
                   phone:'',
                   welcome_message:'',
                   app_store:'',
                   play_store:'',
                   instagram_url:'',
                   paypal_base_uri:'',
                   paypal_client_id:'',
                   paypal_client_secret:'',
            
                   logo:'',
                 
               }),
               
           
                
           }
       },
       methods:{  
           getData(){
             this.form.fill(this.settings)
             this.form.logo=''
           },
          
            
            upload(e){
            let file = e.target.files[0];
            let reader = new FileReader();
           
                reader.onloadend = file => {
                    // console.log('result',reader.result)
                    this.form.logo = reader.result;
                };
                reader.readAsDataURL(file);
           
                },
        
            update(){
                this.$Progress.start()      //Start Progress Bar
               
                this.form.post('/admin/api/settings') //Send Post Request
                .then(()=>{ 
                     
                     toast.fire({
                      icon: 'success',
                      title: 'Success.',   ///Toast Notifiuserion
                     })
                    this.$Progress.finish()   //End Progress Bar
                }).catch(()=>{
                   this.$Progress.fail() 
                }); 
            },
            
         
       }
    }
</script>
