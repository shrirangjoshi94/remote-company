<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">PDF Download</div>
                    <div class="card-body" v-if="pdfDetails">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Download File</label>
                            <div class="col-md-6">
                                <a class="form-control" :href="pdfDetails.download_link" target="_blank">
                                    {{ pdfDetails.title }}
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
        'pdfDetails': {
            'required': true,
            'type': Object,
        }
    }
}
</script>
