<template>
    
<div>      
   <!-- Modal -->
<div class="modal fade " id="addNew" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 v-show="!editMode" class="modal-title" id="addNewLabel"> New Record </h5>
        <h5 v-show="editMode" class="modal-title" id="addNewLabel">  Edit Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="editMode?update_cat():create_cat()">
      <div class="modal-body">
        <div class="form-group">
        <label> Name </label>
        <input v-model="form.name" type="text" name="name"
            class="form-control" :class="{ 'is-invalid': form.errors.has('name') } " required>
        <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
        </div>
        <div class="form-group">
        <label> Main Category </label>
        <select v-model="form.cat_id" class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id') } "  >
            <option value=""> This is a main category </option>
            <option v-for="cat in parents" :key="cat.index" :value="cat.id" > {{cat.name}}   </option>
            
        </select>
        <div v-if="form.errors.has('cat_id')" v-html="form.errors.get('cat_id')" />
        </div>
        <div class="form-group">
        <label> Text </label>
        <input v-model="form.text" type="text" name="text"
            class="form-control" :class="{ 'is-invalid': form.errors.has('text') } " >
        <div v-if="form.errors.has('text')" v-html="form.errors.get('text')" />
        </div>
        <div class="form-group">
        <label> Page Content </label>
        <input v-model="form.content" type="text" name="content"
            class="form-control" :class="{ 'is-invalid': form.errors.has('content') } " >
        <div v-if="form.errors.has('content')" v-html="form.errors.get('content')" />
        </div>
        <div class="form-group" v-if="form.cat_id!='' && form.cat_id!=null">
        <label> Example Link </label>
        <input v-model="form.example_link" type="text" name="example_link"
            class="form-control" :class="{ 'is-invalid': form.errors.has('example_link') } " required >
        <div v-if="form.errors.has('example_link')" v-html="form.errors.get('example_link')" />
        </div>
        <div v-show="editMode" class="form-group">
        <label>  Status </label>
        <select v-model="form.status" name="status" class="form-control" :class="{ 'is-invalid': form.errors.has('status') } ">
      
            <option value="active"> active </option>
            <option value="stopped"> stopped </option>
            
        </select>
             
        <div v-if="form.errors.has('status')" v-html="form.errors.get('status')" />
        </div>

  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button v-show="!editMode" type="submit" class="btn btn-success"> Create </button>
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
                <h3 class="card-label"> Categories
                <span class="d-block text-muted pt-2 font-size-sm"> </span></h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                
             
                <div class="dropdown dropdown-inline mr-2">
                <!--begin::Button-->
                <a @click="newModal" href="#" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span> New Record </a>
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
                                    <input v-model="search" @keyup="searching" type="text" class="form-control" placeholder="ابحث" id="kt_datatable_search_query" />
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
                                        <option value="main">Main Categories</option>
                                        <option value="sub">SubCategories</option>
                                        
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
                    <th>  Name </th>                  
                    <th>  Main Category </th>                  
                    <th width="200">  Text </th>                  
                    <th width="200">  Content </th>                  
                    <th>  Example Link </th>                  
                    <th>Status</th>                  
                    <th class="no-print2">Options</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="$root.load" class="odd">
                    <td valign="top" colspan="8" class="dataTables_empty text-center">
                    <div class="spinner spinner-success mr-15"></div>
                    </td>
                </tr>
                <tr  v-for="cat in cats.data" :key="cat.index" v-else>
                    <td>{{cat.id}}</td>
                    <td>{{cat.name}}</td>
                    
                    <td> 
                    <span v-if="cat.cat_id == null"> This is a main category</span> 
                    <span v-else> {{cat.cat.name}} </span> 
                    </td>
                    <td>{{cat.text || shortcut}}</td>
                    <td>{{cat.content || shortcut}}</td>
                    <td>{{cat.example_link}}</td>
                    <td>{{cat.status}}</td>
                    
                    <td class="no-print2">
                        <span class="dtr-data">         
                            <a  @click="editModal(cat)" href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-primary" title="Edit">
                                <i class="la la-edit"></i>
                            </a>
                            <a   @click="delete_cat(cat.id)" href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-danger" title="Delete">
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
            <pagination :data="cats" @pagination-change-page="getResults"></pagination>
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
      props:['parents'],
       data(){
           return {
               form:new Form({
                   id:'',
                   name:'',
                   text:'',
                   example_link:'',
                   cat_id:'',
                   content:'',
                   status:'active'
               }),
                cats:{},
                editMode:false,
                search:'',
                filter:'',
               
                
           }
       },
       methods:{
           
           getData(){
               axios.get('/admin/api/cats')
                    .then((resp)=>{
                        this.cats=resp.data
                        this.$root.load=false
                       
                  
                    })
           },
           filterData(){
               if(this.filter==''){
                   this.getData()
                   
               }else{
                   axios.post('/admin/api/filter_cats',{'filter':this.filter})
                    .then((resp)=>{
                        this.cats=resp.data
                        this.$root.load=false
                        
                    })
                    }
           },
           newModal(){
               this.form.reset()
                this.editMode=false
                $('#addNew').modal('show'); //Show Model
            },
            
           editModal(user){
                this.editMode=true
                $('#addNew').modal('show'); //Show Model
                this.form.fill(user)

            },
            
            create_cat(){
                
                 
                
                this.$Progress.start() 
                this.form.post('/admin/api/cats') //Send Post Request
                .then(()=>{ 
                     $('#addNew').modal('hide'); //Hide Model 
                     toast.fire({
                      icon: 'success',
                      title:'Success.',  ///Toast Notification
                     })
                    this.$Progress.finish()   //End Progress Bar
                    this.form.reset();
                     this.getData()
                }).catch(()=>{
                   this.$Progress.fail() 
                }); 

               
            },
            update_cat(){
                this.$Progress.start()      //Start Progress Bar
               
                this.form.put('/admin/api/cats/'+this.form.id) //Send Post Request
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
                    this.form.delete('/admin/api/cats/'+id)
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
              axios.get('/admin/api/cats/search/'+query)
                        .then((response)=>{  
                        this.cats=response.data 
                         
                })
              }else{
                this.getData();
              }
           }, 
           getResults(page = 1) {
               if(this.filter==''){
                    axios.get('/admin/api/cats?page=' + page)
                    .then(({data}) => (
                        this.cats = data
                    ))
                    }else{
                        axios.post('/admin/api/filter_cats?page=' + page,{'filter':this.filter})
                        .then(({data}) => (
                            this.cats = data
                        ))

                    }
        },
       }
    }
</script>
