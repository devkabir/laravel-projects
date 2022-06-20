import { createRouter, createWebHistory } from "vue-router"
import EmployeesIndex from "./components/employees/EmployeesIndex";
import EmployeeCreate from "./components/employees/EmployeesCreate";
import EmployeesEdit from "./components/employees/EmployeesEdit";

const routes =[
    {
        path: "/dashboard",
        name: "employees.index",
        component: EmployeesIndex

    },
    {
        path: "/dashboard/employees/create",
        name: "employees.create",
        component: EmployeeCreate
    },
    {
        path: "/dashboard/employees/:id/edit",
        name: "employees.edit",
        component: EmployeesEdit,
        props: true
    }
]


export default createRouter({
    history: createWebHistory(),
    routes
})
