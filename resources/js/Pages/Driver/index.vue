<template lang="">
  <BreezeAuthenticatedLayout>
    <div class="container">
      <div class="row" v-if="showForm">
        <div class="col-md-6 mx-auto">
          <div class="card mt-5">
            <div class="card-header">
                Add Driver
            </div>
            <div class="card-body">
                <form @submit.prevent="storeDriver()">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input v-model="" type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Ville</label>
                        <input v-model="" type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Adress</label>
                        <input v-model="" type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                      
                        <select style="width:63%; display: inline;" v-model="" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option v-for="v in vehicles" :value="v.id">{{v.Immatric}}</option>
                        </select>
                        <button 
                        type="button"
                        style="display: inline;" 
                        class="btn btn-sm ml-3"
                        :class="{'btn-info' : !showVehicleForm ,'btn-dark':showVehicleForm}"
                        @click="showVehicleFormm"
                        >
                          {{ showVehicleForm ? 'Close' : 'Add Vehicle'}}
                        </button>
                        <button style="display: inline;"  type="submit" class="btn btn-primary btn-sm ml-3">Add</button>

                    </div>
                </form>
                    <div class="">
                      <AddVehicle @addVeh="addVehicle($event)" v-if="showVehicleForm"/>
                    </div>
                    
            </div>
        </div>
        </div>
      </div>
       <div class="row">
           <div class="col-md-10 mx-auto">
            <button 
                @click="displayForm" 
                class="btn btn-sm float-right mt-3"
                :class="{'btn-success' : !showForm , 'btn-dark' : showForm}"
                >
                {{showForm ? 'Close' : 'New'}}
                </button>
                <div class="card mt-5">
                    <div class="card-header">
                        Show Drivers
                        <select @change="onChange($event)" class="float-right" >
                          <option value="" selected>Filter By</option>
                          <option value="name">Name</option>
                          <option value="ville">Ville</option>
                          <option value="adress">Adress</option>
                        </select>
                    </div>
                    <div class="card-body">
                      <div class="">
                        <input v-model="params.search" type="text" placeholder="Search..." class="form-control" style="width: 30%;">
                      </div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="driver in drivers.data" :key="driver.id">
                                <th scope="row">{{driver.id}}</th>
                                <td>{{driver.name}}</td>
                                <td>{{driver.ville}}</td>
                                <td>{{driver.adress}}</td>
                                <td>
                                    <button @click="deleteDriver(driver.id)" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <paginationVehicule class="mt-6" :links="drivers.links" />
                    </div>
                </div>
           </div>
       </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import paginationVehicule from '@/Components/PaginationVehicule'
import AddVehicle from '@/Components/AddVehicle'
import {Link} from '@inertiajs/inertia-vue3'
import {Inertia} from '@inertiajs/inertia'
export default {
  props:['drivers','vehicles'],
  components:{
    paginationVehicule,
    Link,
    BreezeAuthenticatedLayout,
    AddVehicle,
    
  },

  data() {
    return {
      showForm: false,
      showVehicleForm: false,
      driver: this.$inertia.form({
                name:'',
                ville :'',
                adress: '',
                vehicle:''
            }),
      params:{
        search:null,
        field:null
      }
    }
  },

  methods: {
    onChange(event){
      if(event.target.value === "") return;
       this.params.field = event.target.value
    },
    showVehicleFormm(){
      this.showVehicleForm = !this.showVehicleForm
    },
    addVehicle(vehicle){
      vehicle.post(this.route('vehicles.store'))
      this.showVehicleForm = !this.showVehicleForm
    },
    displayForm(){
        this.showForm = ! this.showForm
    },
    storeDriver(){
      this.driver.post(this.route('drivers.store'))
      this.showForm = !this.showForm
    },
    deleteDriver(id){
      if(confirm('Are you sure?')){
        Inertia.delete(route('drivers.destroy',id));
      }
    }
  },
  massDelete(){
            this.$inertia.delete(this.route('drivers.massDelete'));
  },

  
  watch:{
    params:{
      handler(){
        this.$inertia.get(this.route('drivers.index'),this.params,{replace: true,preserveState:true});
      },
      deep:true,
    }
  }
}
</script>
<style lang="">
  
</style>