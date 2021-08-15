<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>
    <div class="row">
        <div class="card mx-auto" style="width: 90%">
            
                <div class="alert alert-success">
                </div>
            
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form @submit.prevent="getEmployees">
                            <div class="form-row align-items-center">
                                <div class="span6 input-large search-query">
                                    <input type="text" name="search" class="form-control w-100 mb-2" id="inlineFormInput" placeholder="Enter Employee Name: "
                                    v-model="search">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                                <div class="col">
                                    <select
                                    v-model="selectedDepartment"
                                    class="form-control"
                                    >
                                        <option selected value="">
                                            Select a department
                                        </option>
                                        <option
                                        v-for="department in departments" :key="department.id"
                                        :value="department.id">
                                        {{ department.departments }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <router-link 
                            :to="{name: 'EmployeesCreate'}" 
                            class="btn btn-primary mb-2 float-right">
                        Create
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">City</th>
                        <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr 
                        v-for="employee in employees"
                        :key="employee.id">
                            <th scope="row">{{ employee.id }}</th>
                            <td>{{ employee.first_name }}</td>
                            <td>{{ employee.last_name }}</td>
                            <td>{{ employee.department.departments }}</td>
                            <td>{{ employee.city.name }}</td>
                            <td>
                                <router-link
                                :to="{
                                    name: 'EmployeesEdit',
                                    params: {id : employee.id}
                                    }"
                                class="btn btn-success">
                                Edit
                                </router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            employees: [],
            search: null,
            selectedDepartment: "",
            departments: []
        }
    },
    watch: {
        selectedDepartment(){
            this.getEmployees()
        },
    },
    created(){
        this.getEmployees()
        this.getDepartments()
    },
    methods: {
        getEmployees(){
            axios.get('/api/employees', {params: {
                search: this.search,
                department_id: this.selectedDepartment
            }})
            .then(result => {
                this.employees = result.data.data
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
    },
}
</script>

<style>

</style>