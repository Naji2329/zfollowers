<template>
    
<div>




<!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label"> Profile  </h3>
            </div>
           
        </div>
        <div class="card-body">
           
           <form @submit.prevent="update()">
      <div class="modal-body">
        <div class="form-group">
        <label> Name</label>
        <input v-model="form.name" type="text" name="name"
            class="form-control" :class="{ 'is-invalid': form.errors.has('name') } " required>
         <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
        </div>
        <div class="form-group">
        <label> Email  </label>
        <input v-model="form.email" type="email" name="email"
            class="form-control" :class="{ 'is-invalid': form.errors.has('email') } " required>
         <div v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>
       
        <div class="form-group">
        <label> Password  </label>
        <input v-model="form.password" type="password" name="password" autocomplete="new-password"
            class="form-control" :class="{ 'is-invalid': form.errors.has('password') } " >
         <div v-if="form.errors.has('password')" v-html="form.errors.get('password')" />
        </div>
        <div class="form-group">
        <label> Password Confirmation  </label>
        <input v-model="form.password_confirmation" type="password" name="password_confirmation"
            class="form-control" :class="{ 'is-invalid': form.errors.has('password_confirmation') } " >
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
        props:['admin'],
       data(){
           return {
               form:new Form({
                   id:'',
                   name:'',
                   email:'',
                   password:'',
                   password_confirmation:'',
                  
                 
               }),
               
           
                
           }
       },
       methods:{  
           getData(){
             this.form.fill(this.admin)
             this.form.password=null
            
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
               
                this.form.post('/admin/api/profile') //Send Post Request
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
