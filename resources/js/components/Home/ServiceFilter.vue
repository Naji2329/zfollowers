<template>
<section class="portfolio_grid pg_2"> 
       <div class="container" >  
            <ul class="protfoli_filter">
                <li v-for="(subcat, index) in subcats" :key="index" :class="{'active':index==0}"  @click="change_cat_id(subcat.id)"><a href="#">{{subcat.name}}</a></li>
            </ul> 
            <div class="row " > 
                <div class="owl-carousel testimonial_slide pricing_plan_area  " >
                <div class="item " v-for="(service,index) in services" :key="index">       
                        <div class="plan">
                            <h4 class="plan-price">
                        <a href="#" class="singlePkgBtn" data-id="MTI=" title="Buy Now">
                        $ {{ service.price }} </a>
                      </h4>
                        <h2> {{service.quantity}} </h2>
                        <h4>{{service.title}}</h4>
                        <ul>
                            <li>Instant Delivery</li>
                            <li>High Quality English Profiles</li>
                            <li> 100% Real And Active </li>
                            
                        </ul>
                        <a class="buy" href="buy.html">Buy Now</a>
                    </div>
                </div>
                
                </div>
                
                 
            </div>  
       </div> 
    </section>
</template>

<script>

export default {
    mounted(){
        if(this.subcats != ''){
            this.cat_id=this.subcats[0].id
            this.getData()
        }
    },
   props:['subcats'],
    data(){
        return{
            cat_id:'',
            services:[],
            form :new Form({
                title:'',
                tag:'',
                tags:[],     
                cat_id:'',
                desc:'',
                image:'' 
            })
        }
    },
    methods:{
        getData(){
            axios.get('/api/filter_services/'+this.cat_id)
                 .then((resp)=>{
                     this.services=resp.data
                 })
        },
        change_cat_id(id){
            this.cat_id=id
            this.getData()
        }
    }
}


</script>