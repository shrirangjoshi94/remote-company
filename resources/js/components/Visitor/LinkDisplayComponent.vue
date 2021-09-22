<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Link Details</div>
                    <div class="card-body" v-if="linkDetails">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" v-model="linkDetails.title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Link URL</label>
                            <div class="col-md-6">
                                <a class="form-control" :href="linkDetails.link_url" :target="setTarget">
                                    {{ linkDetails.link_url }}
                                </a>
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
        'linkDetails': {
            'required': true,
            'type': Object,
        }
    },
    computed: {
        setTarget () {
            return this.linkDetails.open_in_new_page ? '_blank' : '_self';
        }
    }
}
</script>
