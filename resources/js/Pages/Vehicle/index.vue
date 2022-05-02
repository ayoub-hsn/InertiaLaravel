<template>
    <BreezeAuthenticatedLayout>
        <div class="container">
            <div class="row" v-if="showForm">
                <div class="col-md-6 mx-auto">
                    <div class="card mt-5">
                        <div class="card-header">
                            Add Vehicules
                        </div>
                        <div class="card-body">
                            <AddVehicle @addVeh="addVehicle($event)"/>
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
                                    Show Vehicules
                                    <select @change="onChange($event)" class="float-right" name="" id="">
                                        <option selected>Sort By</option>
                                        <option value="Immatric">Imattriculation</option>
                                        <option value="color">Couleur</option>
                                    </select>
                                </div>
                                <div class="card-body">
                                    <input v-model="params.search" style="width: 30%;" type="text" placeholder="Search..." class="form-control">
                                    <form @submit.prevent="massDelete">
                                        <button class="btn btn-danger btn-sm" type="submit">DeleteAll</button>
                                    </form>
                                    <table class="table">
                                        <thead>
                                          <tr>
                                              <th></th>
                                            <th scope="col">#</th>
                                            <th scope="col">Imattriculation</th>
                                            <th scope="col">Couleur</th>
                                            <th scope="col">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr v-for="v in vehicules.data" :key="v.id">
                                            <td><input type="checkbox" :value="v.id" v-model="vehiclesId" class="form-control" id=""></td>
                                            <th scope="row">{{v.id}}</th>
                                            <td>{{v.Immatric}}</td>
                                            <td>{{v.color}}</td>
                                            <td>
                                                <Link :href="route('vehicles.edit',v.id)" class="btn btn-warning btn-sm mr-3">Edit</Link>
                                                    <button @click="deleteVihecle(v.id)" class="btn btn-danger btn-sm">Delete</button>
                                                
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <paginationVehicule class="mt-6" :links="vehicules.links" />
                                </div>
                            
                       
                   </div>
                
            </div>
        </div>
        </div>
</BreezeAuthenticatedLayout>

</template>
<script>

import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import AddVehicle from '@/Components/AddVehicle.vue'
import { Link } from "@inertiajs/inertia-vue3" 
import {Inertia} from "@inertiajs/inertia"
import paginationVehicule from '@/Components/PaginationVehicule'
import SideBar from '@/Components/SideBar'
export default {
    props:{
        vehicules: Object
    },
    components:{
        Link,
        paginationVehicule,SideBar,BreezeAuthenticatedLayout,
        AddVehicle,
    },
    data() {
        return {
            showForm:false,
            
            params:{
                search:null,
                field: null,
            },
            vehiclesId:[]
        }
    },
    methods: {
       addVehicle(vehicle){
           vehicle.post(this.route('vehicles.store'))
           this.showForm = !this.showForm
       },
        onChange(event){
            if(event.target.value === "") return;
            this.params.field = event.target.value
        },
        changeFile(event){
            console.log(event)

        },
        deleteVihecle(id){
            if(confirm('are you sure?')){
                Inertia.delete(route('vehicles.destroy',id))
            }
            //this.$inertia.delete("route('vehicles.destroy',"+id+")");
        },
        massDelete(){
            console.log(this.vehiclesId)
            Inertia.delete(this.route('vehicle.massDelete',this.vehiclesId))
            //this.Ids.delete(this.route('vehicle.massDelete'))
        },
        displayForm(){
            this.showForm = ! this.showForm
        }
    },
    watch:{
        params:{
            handler(){
                this.$inertia.get(this.route('vehicles.index'),this.params,{replace:true,preserveState:true});
            },
            deep:true,
        }
    }
   
   
    
}
</script>
<style>
   .mai{
       flex: 1 1 0;
       padding: 4rem;
       @media (max-width: 768px) {
            padding-left: 6rem;
      }
   }
</style>