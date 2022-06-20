<template>
  <div class="p-6 bg-white border-b border-gray-200">
    <div v-if="errors !== ''" class="mt-2 mb-6 text-sm text-red-600">
      {{ errors }}
    </div>

    <form
      class="space-y-6"
      @submit.prevent="saveEmployee"
      enctype="multipart/form-data"
    >
      <div>
        <label class="block text-sm font-medium text-gray-700" for="name"
          >Name</label
        >
        <div class="mt-1">
          <input
            id="name"
            v-model="employee.name"
            class="
              block
              mt-1
              w-full
              rounded-md
              border-gray-300
              shadow-sm
              focus:border-indigo-300
              focus:ring
              focus:ring-indigo-200
              focus:ring-opacity-50
            "
            name="name"
            type="text"
          />
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700" for="birthDate"
          >Date of birth</label
        >
        <div class="mt-1">
          <input
            id="birthDate"
            v-model="employee.birthDate"
            class="
              block
              mt-1
              w-full
              rounded-md
              border-gray-300
              shadow-sm
              focus:border-indigo-300
              focus:ring
              focus:ring-indigo-200
              focus:ring-opacity-50
            "
            type="date"
          />
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700" for="salary"
          >Salary</label
        >
        <div class="mt-1">
          <input
            id="salary"
            v-model="employee.salary"
            class="
              block
              mt-1
              w-full
              rounded-md
              border-gray-300
              shadow-sm
              focus:border-indigo-300
              focus:ring
              focus:ring-indigo-200
              focus:ring-opacity-50
            "
            name="salary"
            type="number"
          />
        </div>
      </div>
      <div>
        <label
          class="block text-sm font-medium text-gray-700"
          for="leaveDaysPerYear"
          >Leave Days Per Year</label
        >
        <div class="mt-1">
          <input
            id="leaveDaysPerYear"
            v-model="employee.leaveDaysPerYear"
            class="
              block
              mt-1
              w-full
              rounded-md
              border-gray-300
              shadow-sm
              focus:border-indigo-300
              focus:ring
              focus:ring-indigo-200
              focus:ring-opacity-50
            "
            name="salary"
            type="number"
          />
        </div>
      </div>
      <div>
        <label
          class="block text-sm font-medium text-gray-700"
          for="sickDaysPerYear"
          >Sick Days Per Year</label
        >
        <div class="mt-1">
          <input
            id="sickDaysPerYear"
            v-model="employee.sickDaysPerYear"
            class="
              block
              mt-1
              w-full
              rounded-md
              border-gray-300
              shadow-sm
              focus:border-indigo-300
              focus:ring
              focus:ring-indigo-200
              focus:ring-opacity-50
            "
            name="salary"
            type="number"
          />
        </div>
      </div>
      <div class="flex items-start">
        <div class="flex items-center h-5">
          <input
            id="active"
            class="
              focus:ring-indigo-500
              h-4
              w-4
              text-indigo-600
              border-gray-300
              rounded
            "
            name="active"
            type="checkbox"
            v-model="employee.active"
          />
        </div>
        <div class="ml-3 text-sm">
          <label class="font-medium text-gray-700" for="active">Active?</label>
          <p class="text-gray-500">Is this employee working here ?</p>
        </div>
      </div>
      <button
        class="
          inline-flex
          items-center
          px-4
          py-2
          text-xs
          font-semibold
          tracking-widest
          text-white
          uppercase
          bg-gray-800
          rounded-md
          border border-transparent
          ring-gray-300
          transition
          duration-150
          ease-in-out
          hover:bg-gray-700
          active:bg-gray-900
          focus:outline-none focus:border-gray-900 focus:ring
          disabled:opacity-25
        "
        type="submit"
      >
        Update
      </button>
    </form>
  </div>
</template>

<script>
import useEmployees from "../../composition/employee";
import { onMounted } from "vue";

export default {
  name: "EmployeesEdit",
  props: {
    id: {
      required: true,
      type: String,
    },
  },

  setup(props) {
    const { errors, employee, updateEmployee, getEmployee } = useEmployees();

    onMounted(getEmployee(props.id));
    
    const saveEmployee = async () => {
      await updateEmployee(props.id);
    };

    return {
      errors,
      employee,
      saveEmployee,
    };
  },
};
</script>


