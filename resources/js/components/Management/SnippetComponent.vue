<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Save Snippet</div>
                    <div class="card-body">
                        <form @submit.prevent="saveSnippet">
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" v-model="fields.title" class="form-control"
                                           name="title" required autofocus>
                                    <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea id="description" type="textarea" v-model="fields.description"
                                              class="form-control"
                                              name="description" required cols="30" rows="3">
                                    </textarea>
                                    <div v-if="errors && errors.description" class="text-danger">
                                        {{ errors.description[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="snippet" class="col-md-4 col-form-label text-md-right">Snippet</label>
                                <div class="col-md-6">
                                    <textarea id="snippet" type="textarea" v-model="fields.snippet" class="form-control"
                                              name="snippet" required cols="30" rows="5">
                                    </textarea>
                                    <div v-if="errors && errors.snippet" class="text-danger">{{
                                            errors.snippet[0]
                                        }}
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
                                    Snippet saved successfully!!
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
import {SAVE_SNIPPET} from '../../constants/api';

export default {
    data() {
        return {
            errors: {},
            fields: {},
            success: false,
        }
    },
    methods: {
        saveSnippet() {
            axios.post(SAVE_SNIPPET, this.fields)
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
