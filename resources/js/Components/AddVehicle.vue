<template lang="">
    <form @submit.prevent="addVehicle">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Immatriculation</label>
            <input v-model="vehicle.Immatric" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Couleur</label>
            <input v-model="vehicle.color" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Vehicle</button>
    </form>
</template>
<script>
export default {

    data() {
        return {
            vehicle: this.$inertia.form({
                Immatric: null,
                color: null
            })
        }
    },
    methods: {
        addVehicle(){
            this.$emit('addVeh',this.vehicle)
        }
    },
    
}
</script>
<style lang="">
    
</style>