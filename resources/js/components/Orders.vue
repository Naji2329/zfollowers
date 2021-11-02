<template>
    
<div>      
   <!-- Modal -->
<div class="modal fade " id="addNew" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 v-show="editMode" class="modal-title" id="addNewLabel">  Edit Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="editMode?update_cat():create_cat()">
      <div class="modal-body">
       
        
        <div class="form-group">
        <label>  Status </label>
        <select v-model="form.status" name="status" class="form-control" :class="{ 'is-invalid': form.errors.has('status') } ">
      
            <option value="progress"> progress </option>
            <option value="completed"> completed </option>
            <option value="canceled"> canceled </option>
            
        </select>
             
        <div v-if="form.errors.has('status')" v-html="form.errors.get('status')" />
        </div>
       

  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button v-show="editMode" type="submit" class="btn btn-primary">Update </button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label"> {{title}}
                <span class="d-block text-muted pt-2 font-size-sm"> </span></h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    
                   
               
                <button id="cmd"  class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                    <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000"/>
                </g>
            </svg><!--end::Svg Icon--></span>  Print </button>
                <!--end::Button-->
            </div>
        </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input v-model="search" @keyup="searching" type="text" class="form-control" placeholder="Serach..." id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding-top:20px">
                                <div class="form-group row">
                                <label class="col-form-label text-right col-lg-4  col-sm-12">Filter By</label>
                                <div class="col-lg-8   col-sm-12">
                                    <select @change="filterData" v-model="filter" class="form-control selectpicker">
                                        <option value="">All</option>
                                        <option value="progress">Progress</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                        
                                    </select>
                                </div>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
            <div id="pdf" >
<!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
            <thead>
                <tr>
                    <th> #</th>
                    <th>  Service </th>                  
                    <th> URL </th>                                 
                    <th> Payment Username </th>                  
                    <th> Payment Method </th>                  
                    <th> Paid </th>                  
                    <th>email</th>                  
                    <th>Status</th>                  
                    <th width="100" class="no-print2">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="$root.load" class="odd">
                    <td valign="top" colspan="8" class="dataTables_empty text-center">
                    <div class="spinner spinner-success mr-15"></div>
                    </td>
                </tr>
                <tr  v-for="order in orders.data" :key="order.index" v-else>
                    <td>{{order.id}}</td>
                    <td> {{order.service.quantity}} {{order.service.title}}  </td>
                    <td>{{order.url}}</td>
                    <td>{{order.username}}</td>
                    <td>{{order.payment_method}}</td>
                    <td>{{order.price}}</td>
                    <td>
                        <span v-if="order.user_id==null">{{order.email}} </span>
                        <span v-else>{{order.user.email}} </span>
                    </td>

                    <td>
                      <span class="label label-info label-inline mr-2" v-if="order.status=='progress'"> {{order.status}} </span>
                      <span class="label label-success label-inline mr-2" v-if="order.status=='completed'"> {{order.status}} </span>
                      <span class="label label-danger label-inline mr-2" v-if="order.status=='canceled'"> {{order.status}} </span>

                    </td>
                    
                    <td class="no-print2">
                        <span class="dtr-data">         
                            <a  @click="editModal(order)" href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-primary" title="Edit">
                                <i class="la la-edit"></i>
                            </a>
                            
                            <a   @click="delete_cat(order.id)" href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-danger" title="Delete">
                                <i class="la la-trash"></i>
                            </a>
                         
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
<!--end: Datatable-->

            </div>
            <!--end: Datatable-->
        </div>
        <div class="card-footer">
            <pagination :data="orders" @pagination-change-page="getResults"></pagination>
        </div> 
    </div>
    <!--end::Card-->



    </div>
</template>

<script>


    export default {
       mounted(){
         
           this.getData();
           Fire.$on('Load',() =>{
            this.getData();
           })
       },
      props:['title'],
       data(){
           return {
               form:new Form({
                   id:'',
                   status:'progress',
               }),
                orders:{},
                editMode:false,
                search:'',
                filter:''
                
           }
       },
       methods:{
           
           getData(){
               axios.get('/admin/api/orders')
                    .then((resp)=>{
                        this.orders=resp.data
                        this.$root.load=false
                    })
           },
           filterData(){
               if(this.filter==''){
                   this.getData()
                   console.log('ok')
                   
               }else{
                   axios.post('/admin/api/filter_orders',{'filter':this.filter})
                    .then((resp)=>{
                        this.orders=resp.data
                        this.$root.load=false
                    })
                    }
           },
          
            
           editModal(user){
                this.editMode=true
                $('#addNew').modal('show'); //Show Model
                this.form.fill(user)
              

            },
            
          
            update_cat(){
                this.$Progress.start()      //Start Progress Bar
               
                this.form.put('/admin/api/orders/'+this.form.id) //Send Post Request
                .then(()=>{ 
                     $('#addNew').modal('hide'); //Hide Model 
                     toast.fire({
                      icon: 'success',
                      title: 'Success.' ,   ///Toast Notification
                     })
                    this.$Progress.finish()   //End Progress Bar
                    //  Fire.$emit('Load');
                    this.getData()
                    this.form.reset();
                }).catch(()=>{
                   this.$Progress.fail() 
                }); 
            },
            delete_cat(id){

                swal.fire({
                  title:'Are You Sure',
                  text: "You will not be able to recover the deleted data!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes , Delete '
                }).then((result) => {
                    if (result.value) {
                    //send request to server
                    this.form.delete('/admin/api/orders/'+id)
                        .then(()=>{
                     swal.fire(
                      'Deleted Successfully' ,
                      'Success.',
                      'success'
                    )
                     Fire.$emit('Load');
                        }).catch(()=>{
                    swal.fire(' Error ! '
                    ,'There is an error'
                    ,'warning');
                })

                    }
                  
                })

            },
           searching(){
               let query=this.search;

              if(query.length != 0){                
              axios.get('/admin/api/orders/search/'+query)
                        .then((response)=>{  
                        this.orders=response.data 
                         
                })
              }else{
                this.getData();
              }
           }, 
           getResults(page = 1) {

            if(this.filter==''){
                    axios.get('/admin/api/orders?page=' + page)
                    .then(({data}) => (
                        this.orders = data
                    ))
                    }else{
                        axios.post('/admin/api/filter_orders?page=' + page,{'filter':this.filter})
                        .then(({data}) => (
                            this.orders = data
                        ))

                    }
        },
       }
    }
</script>
