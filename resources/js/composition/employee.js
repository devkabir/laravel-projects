import {ref} from "vue"
import {useRouter} from "vue-router";

export default function useEmployees() {
    const employee = ref([]);
    const employees = ref([]);
    const router = useRouter()
    const errors = ref('');

    const getEmployees = async () => {
        let response = await axios.get('/api/employees');
        employees.value = response.data.data;
    }

    const getEmployee = async (id) => {
        let response = await axios.get(`/api/employees/${id}`);
        employee.value = response.data.data;
    }
    const storeEmployee = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/employees', data)
            await router.push({name: 'employees.index'})
        } catch (e) {
            if (e.response.status === 422) for (const [key, value] of Object.entries(e.response.data.errors)) errors.value += `${value} `;
        }
    }
    const updateEmployee = async (id) => {
        errors.value = ''
        try {
            await axios.put(`/api/employees/${id}`, employee.value)
            await router.push({name: 'employees.index'})
        } catch (e) {
            if (e.response.status === 422) for (const [key, value] of Object.entries(e.response.data.errors)) errors.value += `${value} `;
        }
    }
    const deleteEmployee = async (id) => {
        await axios.delete(`/api/employees/${id}`)
    }

    return {
        employee,
        employees,
        errors,
        getEmployee,
        getEmployees,
        storeEmployee,
        updateEmployee,
        deleteEmployee
    }
}
