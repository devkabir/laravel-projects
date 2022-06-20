<template>
    <div>
        <div class="row">

        <div class="col-md-5">
            <h3 class="text-center">Book room</h3>
            <hr class="sub-hr">
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="bookOrupadate">
                    <input type="hidden" name="id" :value="room.id">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="room.name">
                    </div>
                    <div class="form-group">
                        <label>Booking Date</label>
                        <input type="date" class="form-control" v-model="room.booking_date">
                    </div>
                    <div class="form-group">
                        <label>CheckOut Date</label>
                        <input type="date" class="form-control" v-model="room.checkout_date">
                    </div>
                    <div class="form-group">
                        <label>National ID Number</label>
                        <input type="integer" class="form-control" v-model="room.nid">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="integer" class="form-control" v-model="room.mobile">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        </div>
        <div class="col-md-7">
            <h3 class="text-center">All rooms</h3><hr class="sub-hr">

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                
                <th>Name</th>
                <th>Booking Date</th>
                <th>CheckOut Date</th>
                <th>NID</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="room in rooms" :key="room.id">                
                <td>{{ room.name }}</td>
                <td>{{ room.booking_date }}</td>
                <td>{{ room.checkout_date }}</td>
                <td>{{ room.nid }}</td>
                <td>{{ room.mobile }}</td>
                <td>
                    <div class="btn-group" role="group">
                        
                        <button class="btn btn-success" @click="editBooking(room.id)">Edit</button>
                        <button class="btn btn-danger" @click="deleteroom(room.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
        </div>
        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                rooms: [],
                room:{}
            }
        },
        created() {
            this.axios
                .get('/LVSPA/api/rooms')
                .then(response => {
                    this.rooms = response.data;
                });
        },
        methods: {
            bookOrupadate() {
                this.axios
                    .post('/LVSPA/api/rooms/add', this.room)
                    .then(response => {this.rooms = response.data;})
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            },
            editBooking(id){
                this.axios
                .get(`/LVSPA/api/rooms/edit/${id}`)
                .then(response => {this.room = response.data;});
            },
            
            deleteroom(id) {
                this.axios
                    .post(`/LVSPA/api/rooms/delete/${id}`)
                    .then(response => {
                        let i = this.rooms.map(item => item.id).indexOf(id); // find index of your object
                        this.rooms.splice(i, 1)
                    });
            }
        }
    }
</script>