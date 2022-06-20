import {createApp} from "vue";
import router from "./router";
import EmployeesIndex from  './components/employees/EmployeesIndex'
require('./bootstrap');

require('alpinejs');


createApp({
    components:{
        EmployeesIndex
    }
}).use(router).mount("#app");
