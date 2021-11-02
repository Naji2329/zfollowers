<style scoped>
.form-control{font-size: 13px;}
</style>

<template>
    <div class="card box card-default">
    <div class="card-body"> 
    <h1 class="text-center bold"> Get Started </h1>
    <form method="post" class="buy-form" @submit.prevent="next_step()">
        <div v-if="service.cat.example_link!=null" class="info">EX : {{service.cat.example_link}} </div>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"> <i class="fa fa-link"></i> </span>
        <input v-model="form.url" :class="{ 'is-invalid': form.errors.has('url') }" type="text" class="form-control" placeholder="Enter Your Link" aria-label="Username" aria-describedby="basic-addon1" required>
        <div class="text-danger" v-if="form.errors.has('url')" v-html="form.errors.get('url')" />
        
        </div>
        <div class="input-group mb-3" v-if="auth==''">
        <span class="input-group-text" id="basic-addon1"> @ </span>
        <input v-model="form.email" type="email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" required>
        <div class="text-danger" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
        </div>
        <div class="form-group selection-group">
        <i class="fa fa-heart-o left-icon" ></i>
        <div class="selector">
        <input type="hidden" name="plan" value="146">
        <button style="font-size:13px" @click="toggle()" type="button" class="form-control active"><strong>{{selected_service.quantity}}</strong> {{selected_service.title}} <span class="alt">${{selected_service.price}}</span> <i class="fa fa-caret-down right-icon"></i> </button>
        <div class="dropdown-menu" :class="{'visible':this.dropdown}">
        <a  @click.prevent="change_selected(related)" href="#" data-value="146" v-for="(related,index) in related_services" :key="index">
          
            <span class="desc"><strong>{{related.quantity}}</strong> {{related.title}}</span>
            <span class="alt">${{related.price}}</span>
          
        </a>
        </div>
        </div>
        </div>
        
        <div class="input-group mb-3">
            <button type="submit" class="btn btn-block theme_btn wow animated"> Continue </button>
        </div>
    </form>
    </div>
</div>
</template>

<script>

export default {
    mounted(){
        this.selected_service=this.service
        this.getData()
    },
   props:['service','related_services'],
    data(){
        return{
            service_id:'',
            selected_service:'',
            dropdown:false,
            form:new Form({
            email:'',
            instagram_username:'',
            url:'',
            service:''
            }),
            auth:''
        }
    },
    methods:{
        getData(){
            axios.get('/api/filter_services/'+this.cat_id)
                 .then((resp)=>{
                     this.services=resp.data
                 })

                 axios.post('/api/get_sessions')
                      .then((resp)=>{
                          this.form.instagram_username=resp.data.instagram
                          this.form.url=resp.data.url
                          this.form.email=resp.data.email
                      })
                 axios.get('/api/get_auth')
                      .then((resp)=>{
                          this.auth=resp.data
                      })
        },
        change_selected(related){
            console.log('ok')
            this.selected_service=related
            this.dropdown=!this.dropdown
          
        },
        toggle(){
            console.log('ok')
            this.dropdown=!this.dropdown
        },
        next_step(){
            this.form.service=this.selected_service
            this.form.post('/api/save_session1')
                     .then((resp)=>{
                        window.location.replace("/login/order");   
                     })
        }
    }
}


</script>