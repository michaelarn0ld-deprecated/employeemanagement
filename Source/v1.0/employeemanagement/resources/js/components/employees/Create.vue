<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create New Employee
                        <router-link
                        :to="{name: 'EmployeesIndex'}"
                        class="float-right">
                            Back &rarr;
                        </router-link>
                    </div>
    
                    <div class="card-body">
                        <form @submit.prevent="storeEmployee">

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" required autocomplete="first_name" autofocus v-model="form.first_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" required autocomplete="last_name" autofocus
                                    v-model="form.last_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="middle_name" class="col-md-4 col-form-label text-md-right">Middle Name</label>
                                <div class="col-md-6">
                                    <input id="middle_name" type="text" class="form-control" name="middle_name" required autocomplete="middle_name" autofocus v-model="form.middle_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Street Address</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required autocomplete="address" autofocus
                                    v-model="form.address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="zip_code" class="col-md-4 col-form-label text-md-right">Zip Code</label>
                                <div class="col-md-6">
                                    <input id="zip_code" type="text" class="form-control" name="zip_code" required autocomplete="zip_code" autofocus
                                    v-model="form.zip_code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_id" class="col-md-4 col-form-label text-md-right">Country</label>

                                <div class="col-md-6">
                                    <select
                                    v-model="form.country_id" 
                                    @change="getStates()"
                                        name="country_id" 
                                        class="form-control">
                                        <option 
                                        v-for="country in countries"
                                        :key="country.id"
                                        :value="country.id">
                                            {{ country.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state_id" class="col-md-4 col-form-label text-md-right">State</label>

                                <div class="col-md-6">
                                    <select
                                    v-model="form.state_id"
                                    @change="getCities()" 
                                        name="state_id" 
                                        class="form-control">
                                        <option
                                        v-for="state in states"
                                        :key="state.id"
                                        :value="state.id">
                                        {{ state.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city_id" class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <select 
                                    v-model="form.city_id"
                                        name="city_id" 
                                        class="form-control">
                                        <option
                                        v-for="city in cities"
                                        :key="city.id"
                                        :value="city.id">
                                        {{ city.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="department_id" class="col-md-4 col-form-label text-md-right">Department</label>

                                <div class="col-md-6">
                                    <select 
                                    v-model="form.department_id"  
                                        name="department_id" 
                                        class="form-control">
                                        <option
                                        v-for="department in departments"
                                        :key="department.id"
                                        :value="department.id">
                                        {{ department.departments }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="department_id" class="col-md-4 col-form-label text-md-right">Birth Date</label>
                                <div class="col-md-6">
                                <datepicker input-class="form-control"
                                v-model="form.birth_date">
                                </datepicker>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="department_id" class="col-md-4 col-form-label text-md-right">Hire Date</label>
                                <div class="col-md-6">
                                <datepicker input-class="form-control"
                                v-model="form.date_hired">
                                </datepicker>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>

import Datepicker from 'vuejs-datepicker';
import moment from 'moment';

export default {
    components: {
        Datepicker
    },
    data(){
        return {
            countries: [],
            states: [],
            cities: [],
            departments: [],
            form: {
                first_name: '',
                last_name: '',
                middle_name: '',
                address: '',
                zip_code: '',
                country_id: '',
                state_id: '',
                city_id: '',
                department_id: '',
                birth_date: '',
                date_hired: ''
            }
        }
    },
    created(){
        this.getCountries();
        this.getDepartments();
    },
    methods: {
        getCountries(){
            axios.get('/api/employees/countries')
                .then(result => {
                    this.countries = result.data
                }).catch(err => {
                    console.log(err)
                })
        },
        getStates(){
            axios.get('/api/employees/' + this.form.country_id + '/states')
            .then(result => {
                    this.states = result.data
            }).catch(err => {
                    console.log(err)
            })
        },
        getCities(){
            axios.get('/api/employees/' + this.form.state_id + '/cities')
            .then(result => {
                    this.cities = result.data
            }).catch(err => {
                    console.log(err)
            })
        },
        getDepartments(){
            axios.get('/api/employees/departments')
            .then(result => {
                this.departments = result.data
            }).catch(err => {
                console.log(err)
            })
        },
        storeEmployee(){
            axios.post('/api/employees', {
                first_name: this.form.first_name,
                last_name: this.form.last_name,
                middle_name: this.form.middle_name,
                address: this.form.address,
                zip_code: this.form.zip_code,
                country_id: this.form.country_id,
                state_id: this.form.state_id,
                city_id: this.form.city_id,
                department_id: this.form.department_id,
                birth_date: this.formatDate(this.form.birth_date),
                date_hired: this.formatDate(this.form.date_hired),
            })
            .then(result => {
                this.$router.push({name : 'EmployeesIndex'})
            })
        },
        formatDate(date){
            if (date){
                return moment(String(date)).format('YYYYMMDD')
            }
        }
    },
}

</script>

<style>

</style>