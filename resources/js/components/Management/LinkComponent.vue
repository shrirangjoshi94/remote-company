<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Save Link</div>
                    <div class="card-body">
                        <form @submit.prevent="saveLink">
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" v-model="fields.title" class="form-control" required
                                           autofocus>
                                    <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link_url"
                                       class="col-md-4 col-form-label text-md-right">Link URL</label>
                                <div class="col-md-6">
                                    <input id="link_url" type="text" v-model="fields.link_url" required
                                           class="form-control">
                                    <div v-if="errors && errors.link_url" class="text-danger">
                                        {{ errors.link_url[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="open_in_new_page"
                                       class="col-md-4 col-form-label text-md-right">Open In New Tab</label>
                                <div class="col-md-6">
                                    <input id="open_in_new_page" type="checkbox" v-model="fields.open_in_new_page">
                                    <div v-if="errors && errors.open_in_new_page" class="text-danger">
                                        {{ errors.open_in_new_page[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            <transition name="fade">
                                <div v-if="success" class="alert alert-success mt-3">
                                    Link saved successfully!!
                                </div>
                            </transition>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {SAVE_LINK} from '../../constants/api';

export default {
    data() {
        return {
            errors: {},
            fields: {},
            success: false,
        }
    },
    methods: {
        saveLink() {
            this.fields.open_in_new_page = this.fields.open_in_new_page ? 1 : 0;
            axios.post(SAVE_LINK, this.fields)
                .then(() => {
                    this.success = true;
                    this.fields = {};
                    setTimeout(() => {
                        this.success = false;
                    }, 3000);
                })
                .catch(error => {
                    this.success = false;

                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                });
        },
    },
}
</script>
