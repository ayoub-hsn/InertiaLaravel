<template lang="">
    <div class="container">
       <div class="row">
           <div class="col-md-10 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        Show Drivers
                        <Link :href="route('drivers.create')" class="btn btn-info btn-sm float-right">Create</Link>
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
</template>

<script>
import paginationVehicule from '@/Components/PaginationVehicule'
import {Link} from '@inertiajs/inertia-vue3'
import {Inertia} from '@inertiajs/inertia'
export default {
  props:['drivers'],
  components:{
    paginationVehicule,
    Link
  },

  data() {
    return {
      params:{
        search:null
      }
    }
  },

  methods: {
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