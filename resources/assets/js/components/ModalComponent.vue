<template>
    <div>
        <b-modal ref="myModalRef" size="lg" centered hide-footer :title = "title">
            <div class="d-block text-center" >
                <h3 v-html="text"></h3>
            </div>
            <b-btn class="mt-3" variant="outline-success" block @click="hideModal">Готово</b-btn>
        </b-modal>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            title: '',
            text: ''
        }
    },
    methods: {
        showModal () {
            this.$refs.myModalRef.show()
        },
        hideModal () {
            this.$refs.myModalRef.hide()
        }
    }
}
</script>