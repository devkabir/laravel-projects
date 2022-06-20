<template>
    <div>
        <div  class="card-header">
            <div class="form-row justify-content-between">
                <div class="col-md-2">
                    <input type="text" name="title" placeholder="Search (min 4 letters)" v-model="search"
                           class="form-control">
                </div>
                <div class="col-md-2">
                    <select name="variant" v-model="params.variant" id="" class="form-control">
                        <option value="">-- choose variant --</option>
                        <option v-for="(v,i) in variants" :key="i" v-text="v" :value="v"></option>
                    </select>
                </div>

                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price Range</span>
                        </div>
                        <input type="text" name="price_from" v-model="params.price_from" aria-label="First name"
                               placeholder="From"
                               class="form-control">
                        <input type="text" name="price_to" v-model="params.price_to" aria-label="Last name" placeholder="To" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="date" name="date" v-model="params.created_at" placeholder="Date" class="form-control">
                </div>
                <div class="col-md-1">
                    <button @click="getProducts" class="btn btn-primary float-right"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-response">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Variant</th>
                        <th width="150px">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    <tr v-if="products.data.length > 0" v-for="product in products.data" :key="product.id">
                        <td>{{ product.id }}</td>
                        <td>{{ product.title }} <br> Created at : {{ product.time }}</td>
                        <td class="w-25">{{ product.description }}</td>
                        <td>
                            <dl class="row mb-0" style="height: 80px; overflow: hidden"
                                v-bind:class="[(i == 0 || i==1) ? 'd-flex' : `d-none remove-variant-class${product.id}`, 'show']"
                                v-for="(vp,i) in product.product_variant_prices" :key="i">

                                <dt class="col-sm-3 pb-0">
                                    {{ vp.variant_one ? vp.variant_one.variant + '/' : null }}
                                    {{ vp.variant_two ? vp.variant_two.variant + '/' : null }}
                                    {{ vp.variant_three ? vp.variant_three.variant + '/' : null }}
                                </dt>
                                <dd class="col-sm-9">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-4 pb-0">Price : {{ vp.price }}</dt>
                                        <dd class="col-sm-8 pb-0">InStock : {{ vp.stock }}</dd>
                                    </dl>
                                </dd>
                            </dl>
                            <button @click="showAll(product.id)" class="btn btn-sm btn-link">Show more</button>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a :href="`product/${product.id}/edit`" class="btn btn-success">Edit</a>
                            </div>
                        </td>
                    </tr>
                    <tr v-else>
                        <td colspan="4" class="text-center">No products found!</td>
                    </tr>
                    </tbody>

                </table>
            </div>

        </div>

        <div class="card-footer ">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <p>Showing {{ products.from }} to {{ products.to }} out of {{ products.total }}</p>
                </div>
                <div class="col-md-2">
                    <pagination :data="products" @pagination-change-page="getProducts"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AllProducts",
    props: {
        variants: {
            type: Array,
        }
    },
    data() {
        return {
            products: {},
            search: '',
            params: {
                variant: '',
                price_from: null,
                price_to: null,
                created_at: ''
            },
        }
    },
    methods: {
        getProducts(page = 1) {
            axios.get(`/api/products`, {
                params: {
                    page,
                    search: this.search.length >= 4 ? this.search : '',
                    ...this.params
                }
            })
                .then(response => {
                    this.products = response.data;

                });
        },
        showAll(id) {
            let vr = `.remove-variant-class${id}`;
            window.jQuery(vr).toggleClass('d-none');

        }

    },
    async created() {
        this.getProducts()
    },


}
</script>
