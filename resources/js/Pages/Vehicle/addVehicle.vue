<template lang="">
    <div class="container">
       <div class="row">
           <div class="col-md-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        Add Vehicule
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="vehicle.post(route('vehicles.store'))">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Immatriculation</label>
                                <input v-model="vehicle.Immatric" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div v-if="errors.Immatric" class="alert alert-danger">{{errors.Immatric}}</div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Couleur</label>
                                <input v-model="vehicle.color" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div v-if="errors.color" class="alert alert-danger">{{errors.color}}</div>
                            <button type="submit" class="btn btn-primary mt-3">Add</button>
                        </form>
                    </div>
                </div>
           </div>
       </div>
    </div>
</template>
<script>
export default {
    props:['errors'],
data() {
    return {
        errors:this.errors,
        vehicle: this.$inertia.form({
            Immatric: '',
            color:''
        }),  
    }
},
mounted() {
        console.log("err:"+this.errors);
    },



// methods: {
//     // addVehicle(){
//     //     this.vehicle.post('/vehicles')
//     //     //this.$inertia.post('/vehicles', this.vehicle)
//     // }
// },
    
}
</script>
<style>
    
</style>