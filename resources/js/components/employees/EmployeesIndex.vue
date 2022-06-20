<template>

    <div class="p-6 bg-white border-b border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">
                    Name
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">
                    Birth Date
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">
                    Salary
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">
                    Status
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">
                    Leave Days Per Year
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" scope="col">
                    Sick Days Per Year
                </th>
                <th class="relative px-6 py-3" scope="col">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="employee in employees">
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ employee.name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ employee.birthDate }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ employee.salary }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  bg-green-100 text-green-800">
                      {{ employee.active ? 'Yes' : 'No' }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ employee.leaveDaysPerYear }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ employee.sickDaysPerYear }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="inline-flex">
                        <router-link
                            :to="{ name : 'employees.edit', params: { id: employee.id}}"
                            class="bg-white hover:bg-blue-400 text-black hover:text-white font-bold py-2 px-4 rounded-l">
                            Edit
                        </router-link>
                        <button
                            class="bg-white text-black hover:bg-red-500 hover:text-white font-bold py-2 px-4 rounded-r"
                            @click="removeEmployee(employee.id)">
                            Delete
                        </button>
                    </div>

                </td>
            </tr>

            </tbody>
        </table>
        <router-link
            :to="{ name: 'employees.create'}"
            class="absolute active:shadow-lg bg-red-600 bottom-10 duration-200 ease-in focus:outline-none h-16 hover:bg-red-700 inline-flex items-center justify-center mouse p-0 right-10 rounded-full shadow transition w-16">
            <svg class="w-6 h-6 inline-block" enable-background="new 0 0 20 20" viewBox="0 0 20 20">
                <path d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                    C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                    C15.952,9,16,9.447,16,10z" fill="#FFFFFF"/>
            </svg>
        </router-link>

    </div>

</template>

<script>
import useEmployees from "../../composition/employee";
import {onMounted} from "vue";

export default {
    setup: function () {
        const {employees, getEmployees, deleteEmployee} = useEmployees()
        onMounted(getEmployees)
        const removeEmployee = async (id) => {
            if (!window.confirm("Are you sure?")) return;
            await deleteEmployee(id)
            await getEmployees()
        }
        return {
            employees,
            removeEmployee
        }
    }
}
</script>
