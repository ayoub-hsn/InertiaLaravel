<template lang="">
    <div class="container">
       <div class="row">
           <div class="col-md-10 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        Show Vehicules
                        <Link :href="route('vehicles.create')" class="btn btn-info btn-sm float-right">Create</Link>
                    </div>
                    <div class="card-body">
                        <input v-model="params.search" style="width: 30%;" type="text" placeholder="Search..." class="form-control">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Imattriculation</th>
                                <th scope="col">Couleur</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="v in vehicules.data" :key="v.id">
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
</template>
<script>
 
import { Link } from "@inertiajs/inertia-vue3" 
import {Inertia} from "@inertiajs/inertia"
import paginationVehicule from '@/Components/PaginationVehicule'
export default {
    props:{
        vehicules: Object
    },
    components:{
        Link,
        paginationVehicule
    },
    data() {
        return {
            params:{
                search:null
            }
        }
    },
    methods: {
        deleteVihecle(id){
            if(confirm('are you sure?')){
                Inertia.delete(route('vehicles.destroy',id))
            }
            //this.$inertia.delete("route('vehicles.destroy',"+id+")");
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
<style lang="">
    
</style>