<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Snippet Details</div>
                    <div class="card-body" v-if="snippetDetails">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" v-model="snippetDetails.title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                    <textarea id="description" type="textarea" v-model="snippetDetails.description"
                                              class="form-control" cols="30" rows="5">
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="snippet" class="col-md-4 col-form-label text-md-right">Snippet</label>
                            <div class="col-md-6">
                                    <textarea id="snippet" type="textarea" v-model="snippetDetails.snippet"
                                              class="form-control" cols="30" rows="5" ref="snippet">
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" @click="copySnippet">
                                    Copy Snippet
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        'snippetDetails': {
            'required': true,
            'type': Object,
        }
    },
    methods: {
        copySnippet() {
            let copyText = this.$refs.snippet;
            copyText.select();
            document.execCommand('copy')
            alert('text copied');
        }
    }
}
</script>
