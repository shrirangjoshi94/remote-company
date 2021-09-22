<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Save PDF</div>
                    <div class="card-body">
                        <form @submit.prevent="savePdf">
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" v-model="title" class="form-control"
                                           name="title" required autofocus>
                                    <div v-if="errors && errors.title" class="text-danger">{{ errors.title[0] }}</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pdf_file" class="col-md-4 col-form-label text-md-right">PDF</label>
                                <div class="col-md-6">
                                    <input id="pdf_file" ref="pdf_file" type="file" class="form-control" @change="fileUpload"
                                           name="pdf_file" required>
                                    <div v-if="errors && errors.pdf_file" class="text-danger">{{ errors.pdf_file[0] }}
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
                                    File uploaded successfully!!
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
import {UPLOAD_PDF} from '../../constants/api';

export default {
    data() {
        return {
            errors: {},
            title: '',
            success: false,
            pdf_file: '',
        }
    },
    methods: {
        fileUpload(event) {
            this.pdf_file = event.target.files[0];
        },
        savePdf() {
            const formData = new FormData();
            formData.append('title', this.title);
            formData.append('pdf_file', this.pdf_file);
            axios.post(UPLOAD_PDF, formData)
                .then(() => {
                    this.success = true;
                    this.title = '';
                    this.$refs.pdf_file.value = null;
                    setTimeout(() => { this.success = false; }, 3000);
                })
                .catch(error => {
                    this.success = false;

                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                });
        }
    },
}
</script>
