<template lang="">
    <div class="container">
       <div class="row">
           <div class="col-md-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        Edit Vehicule
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="vehi.put(route('vehicles.update',vehicle.id))">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Immatriculation</label>
                                <input v-model="vehi.Immatric" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Couleur</label>
                                <input v-model="vehi.color" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Edit</button>
                        </form>
                    </div>
                </div>
           </div>
       </div>
    </div>
</template>
<script>
export default {

    props:['vehicle'],
    data() {
        return {
            vehi:this.$inertia.form({
                Immatric: this.vehicle.Immatric,
                color:this.vehicle.color,
            }),
        }
    },

    mounted() {
        
    },
    
}
</script>
<style lang="">
    
</style>