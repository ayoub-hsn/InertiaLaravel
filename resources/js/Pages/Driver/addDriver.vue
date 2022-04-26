<template lang="">
    <div class="container">
       <div class="row">
           <div class="col-md-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        Add Driver
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="driver.post(route('drivers.store'))">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input v-model="driver.name" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Ville</label>
                                <input v-model="driver.ville" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Adress</label>
                                <input v-model="driver.adress" type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <select v-model="driver.vehicle" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option v-for="v in vehicles" :value="v.id">{{v.Immatric}}</option>
                                  </select>
                            </div>
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
    props:['vehicles'],
    data() {
        return {
            driver: this.$inertia.form({
                name:'',
                ville :'',
                adress: '',
                vehicle:''
            }),
        }
    },
    
}
</script>
<style lang="">
    
</style>